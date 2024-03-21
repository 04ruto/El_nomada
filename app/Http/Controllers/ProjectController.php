<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Booking;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\Invoice;
use App\Models\Pack;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transportation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Invoice as DownInvoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;


// REFERENCES
//
// Invoice downloader
// https://github.com/LaravelDaily/laravel-invoices?ref=madewithlaravel.com
//
// Notify
// https://github.com/mckenziearts/laravel-notify?tab=readme-ov-file

class ProjectController extends Controller
{


    public function logup(Request $r)
    {
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8',
            ]
        );

        User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
                'status' => true,
            ]
        );

        return redirect()->route('login')->with('email', $r->email);
    }

    public function login(Request $r)
    {
        $validated = request()->validate(
            [
                'email' => "required|email",
                'password' => 'required|min:8'
            ]
        );

        if (auth()->attempt($validated)) {
            $userEx = User::where("email", $r->email)->first();

            if ($userEx->status == true) {
                request()->session()->regenerate();
                return redirect()->route('home');
            } else {

                return redirect("/login")->withSuccess("Esta cuenta ha sido desactivada");
            }
        }

        return redirect("/login")->withSuccess("Esta cuenta no está registrada");
    }

    public function logout(Request $r)
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();


        return redirect("/");

    }

    public function profile($user_id)
    {

        $user = User::find($user_id);
        $bookings = DB::table('bookings')
            ->join('invoices', 'invoices.booking_id', '=', 'bookings.id')
            ->join('products', 'products.id', '=', 'bookings.product_id')
            ->select(
                'invoices.id as fact_id',
                'products.name as prod_name',
                'products.description as prod_description',
                'bookings.total_price as price',
                'invoices.payment_status as payment_status',
            )
            ->where('bookings.user_id', "=", $user_id)
            ->get();

        if ($user_id == Auth::user()->id) {
            return view("user.profile", [
                'user' => $user,
                'bookings' => $bookings
            ]);
        }

        return view('404');
    }

    function profilePay($user, $invoice, $action)
    {

        $invoice = Invoice::find($invoice);
        // dd($invoice->payment_status);

        // pendiente, pagado, cancelado, reembolsado

        // si pendiente -> pagado
        if ($action == 'accept' && $invoice->payment_status == 'pendiente') {
            $invoice->update([
                'payment_status' => 'pagado',
                'payment_date' => now()
            ]);

            return redirect()->back()->with('successPay', 'Reserva pagada con exito');
            // si pendiente -> cancelado
            // si pagado -> reembolsado
        } else if ($action == 'decline') {
            if ($invoice->payment_status == 'pendiente') {

                $invoice->update([
                    'payment_status' => 'cancelado',
                ]);

                return redirect()->back()->with('successPay', 'Reserva calcelada con exito');
            } else if ($invoice->payment_status == 'pagado') {

                $invoice->update([
                    'payment_status' => 'reembolsado',
                ]);

                return redirect()->back()->with('successPay', 'Reserva reembolsada con exito');
            }
        }
        return redirect()->back()->with('failedPay', 'Operación no aceptada');
    }


    function dashboard($page = "main")
    {

        $products = Product::orderBy("type")->paginate(10);

        if ($page != "main") {
            $products = Product::orderBy("type")->get();
        }

        return view('dashboard.' . $page, [
            'users' => User::orderBy("role")->get(),
            'products' => $products,
            'bookings' => Booking::orderBy("user_id")->get(),
            'invoices' => Invoice::orderBy("user_id")->get(),
            'cities' => City::all(),
            'countries' => Country::all(),
            'categories' => Category::all(),
            'transportations' => Transportation::all(),
        ]);
    }

    function showCreate($type)
    {

        $valid_types = ['product', 'user', 'booking', 'invoice'];

        if (!in_array($type, $valid_types)) {
            return view('404');
        }

        return view('dashboard.create', [
            'type' => $type,
            'users' => User::where("role", "!=", "admin")->get(),
            'products' => Product::orderBy("type")->get(),
            'bookings' => Booking::orderBy("user_id")->get(),
            'cities' => City::all(),
            'categories' => Category::all(),
        ]);
    }

    function create(Request $r)
    {
        // dd($r->table);

        switch ($r->table) {
            case 'product':

                $validated = request()->validate(
                    [
                        'name' => 'required|min:3|max:40',
                        'desc' => 'required|min:5|max:500',
                        'price' => 'required|min:0',
                    ]
                );

                $product = Product::create(
                    [
                        'name' => $validated['name'],
                        'description' => $validated['desc'],
                        'price' => $validated['price'],
                        'type' => $r->type,
                        'status' => filter_var($r->status, FILTER_VALIDATE_BOOLEAN),
                    ]
                );

                switch ($r->type) {
                    case 'hotels':
                        $validated = request()->validate(
                            [
                                'city' => 'required',
                                'entrance_date' => 'required|date',
                                'leave_date' => 'required|date|after_or_equal:entrance_date',
                                'amenities' => 'required|min:5|max:500',
                            ],
                            [
                                'leave_date.after_or_equal' => 'La fecha de salida debe ser posterior o igual a la fecha de entrada.',
                            ]
                        );

                        if (!$validated) {
                            $product->delete();
                        }

                        Hotel::create([
                            'product_id' => $product->id,
                            'city_id' => $validated['city'],
                            'entrance_date' => $validated['entrance_date'],
                            'leave_date' => $validated['leave_date'],
                            'amenities' => $validated['amenities'],
                        ]);
                        break;

                    case 'packs':
                        Pack::create([
                            'product_id' => $product->id,
                            'category_id' => $r->category,
                        ]);
                        break;

                    case 'flights':
                        $validated = request()->validate(
                            [
                                'departure_date' => 'required|date',
                                'arrival_date' => 'required|date|after_or_equal:departure_date',
                            ],
                            [
                                'arrival_date.after_or_equal' => 'La fecha de salida debe ser posterior o igual a la fecha de entrada.',
                            ]
                        );

                        if (!$validated) {
                            $product->delete();
                        }

                        Flight::create([
                            'product_id' => $product->id,
                            'departure_city_id' => $r->departure_city,
                            'arrival_city_id' => $r->arrival_city,
                            'departure_date' => $validated['departure_date'],
                            'arrival_date' => $validated['arrival_date'],
                        ]);
                        break;

                    case 'activities':
                        $validated = request()->validate(
                            [
                                'activity_date' => 'required|date',
                            ]
                        );

                        if (!$validated) {
                            $product->delete();
                        }

                        Activity::create([
                            'product_id' => $product->id,
                            'city_id' => $r->activity_city,
                            'act_date' => $validated['activity_date'],
                        ]);
                        break;

                    case 'transportations':

                        $transport = new Transportation();
                        $transport->product_id = $product->id;
                        $transport->type = $r->transport_type;
                        $transport->departure_city_id = $r->transport_departure_city;
                        $transport->arrival_city_id = $r->transport_arrival_city;

                        $transport->save();
                        break;

                    default:
                        break;
                }
                break;

            case 'user':
                $validated = request()->validate(
                    [
                        'name' => 'required|min:3|max:40',
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|min:8',
                    ]
                );

                User::create(
                    [
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'password' => Hash::make($validated['password']),
                        'role' => $r->role,
                        'status' => filter_var($r->status, FILTER_VALIDATE_BOOLEAN),
                    ]
                );
                break;

            case 'booking':

                $product = Product::find($r->product);
                Booking::create(
                    [
                        'user_id' => $r->user,
                        'product_id' => $r->product,
                        'total_price' => $product->price,
                    ]
                );
                break;

            case 'invoice':


                $ids = explode('-', $r->booking);
                $booking = Booking::find($ids[0]);
                Invoice::create(
                    [
                        'user_id' => $ids[1],
                        'booking_id' => $ids[0],
                        'total_amount' => $booking->total_price,
                        'payment_status' => 'pendiente',
                        'payment_date' => null,
                    ]
                );
                break;

            case 'country':

                $validated = request()->validate(
                    [
                        'code_country' => 'required|min:2|max:3',
                        'country_name' => 'required',
                    ]
                );

                Country::create(
                    [
                        'name' => $validated['country_name'],
                        'code' => $validated['code_country'],
                    ]
                );

                notify()->preset('create', ['message' => 'País añadido correctamente (' . $validated['country_name'] . ')']);

                // return redirect()->back()->with('Success', 'País añadido correctamente (' . $validated['country_name'] . ')');
                return redirect()->back();

            case 'city':

                $validated = request()->validate([
                    'city_name' => 'required',
                    'country_selection' => 'required|not_in:value'
                ]);


                City::create(
                    [
                        'name' => $validated['city_name'],
                        'country_id' => $r->country_selection
                    ]
                );

                notify()->preset('create', ['message' => 'Ciudad añadida correctamente (' . $validated['city_name'] . ')']);

                // return redirect()->back()->with('Success', 'Ciudad añadida correctamente (' . $validated['city_name'] . ')');
                return redirect()->back();

            case 'category':

                $validated = request()->validate([
                    'category_name' => 'required',
                ]);


                Category::create(
                    [
                        'name' => $validated['category_name'],
                        'status' => true
                    ]
                );

                notify()->preset('create', ['message' => 'Categoría añadida correctamente (' . $validated['category_name'] . ')']);

                // return redirect()->back()->with('Success', 'Categoría añadida correctamente (' . $validated['category_name'] . ')');
                return redirect()->back();

            default:
                # code...
                break;
        }

        // return redirect()->back();
        notify()->preset('create');

        // return redirect()->route('dashboard')->with('Success', 'Añadido correctamente');
        return redirect()->route('dashboard');

    }

    function showUpdate($type, $id)
    {

        $valid_types = ['products', 'users'];

        if (!in_array($type, $valid_types)) {
            return view('404');
        }

        switch ($type) {
            case 'users':
                $user = user::find($id);

            case 'products':
                $product = Product::find($id);
                break;

            default:
                # code...
                break;
        }

        return view('dashboard.edit', [
            'type' => $type,
            'elem' => ($type == 'users') ? $user : $product,
        ]);
    }

    public function update(Request $r)
    {
        switch ($r->table) {
            case 'users':
                $user = User::find($r->elem_id);

                $validated = request()->validate(
                    [
                        'name' => 'required|min:3|max:40',
                        'email' => 'required|email',
                    ]
                );

                if ($r->password_confirmation == null) {
                    $user->update([
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'password' => $user->password, // Asegúrate de cifrar la nueva contraseña
                        'role' => $r->role,
                        'status' => filter_var($r->status, FILTER_VALIDATE_BOOLEAN),
                    ]);

                } else if ($r->password == $r->password_confirmation) {
                    // La antigua contraseña coincide, puedes proceder a actualizar
                    $user->update([
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'password' => bcrypt($r->password), // Asegúrate de cifrar la nueva contraseña
                        'role' => $r->role,
                        'status' => filter_var($r->status, FILTER_VALIDATE_BOOLEAN),
                    ]);
                }
                notify()->preset('update', ['message' => 'Usuario actualizado correctamente (' . $validated['name'] . ')']);
                // return redirect()->route('dashboard')->with('Success', 'Usuario actualizado correctamente (' . $validated['name'] . ')');
                return redirect()->route('dashboard');

            default:
                # code...
                break;
        }
    }

    public function delete($table, $id)
    {

        switch ($table) {
            case 'products':
                $elem = Product::find($id);
                $msg = 'Eliminado correctamente (' . $elem->name . ')';
                break;
            case 'users':
                $elem = User::find($id);
                $msg = 'Eliminado correctamente (' . $elem->name . ')';
                break;
            case 'bookings':
                $elem = Booking::find($id);
                $msg = 'Eliminado correctamente (' . $elem->user->name . ' - ' . $elem->product->name . ')';
                break;
            case 'cities':
                $elem = City::find($id);
                $msg = 'Eliminado correctamente (' . $elem->name . ')';
                break;
            case 'countries':
                $elem = Country::find($id);
                $msg = 'Eliminado correctamente (' . $elem->name . ')';
                break;
            case 'categories':
                $elem = Category::find($id);
                $msg = 'Eliminado correctamente (' . $elem->name . ')';
                break;
            case 'invoices':
                $elem = Invoice::find($id);
                $msg = 'Eliminado correctamente';
                break;

            default:
                # code...
                break;
        }
        $elem->delete();

        notify()->preset('delete', ['message' => $msg]);

        // return redirect()->back()->with('Success', $msg);
        return redirect()->back();
    }

    public function visibility($table, $id)
    {

        switch ($table) {
            case 'products':
                $elem = Product::find($id);
                break;
            case 'users':
                $elem = User::find($id);
                break;


            default:
                # code...
                break;
        }

        $elem->update([
            'status' => !$elem->status
        ]);

        return redirect()->back()->with('Success', 'Cambio de visibilidad correcto (' . $elem->name . ')');
    }

    public function download($invoice, $user, $product)
    {

        $user = User::find($user);
        $product = Product::find($product);
        $invoice = Invoice::find($invoice);
        // dd($user->name, $user->email, $product->name);


        $customer = new Buyer([
            'name' => $user->name,
            'custom_fields' => [
                'email' => $user->email,
                'estado' => $invoice->payment_status,
            ],
        ]);

        $seller = new Buyer([
            'name' => 'El nomada',
            'custom_fields' => [
                'address' => 'Sabadell, Barcelona',
                'email' => 'contact@elnomada.com',
                'phone' => '+34 123-456-789',
            ],
        ]);

        $item = InvoiceItem::make($product->name)->pricePerUnit($product->price);


        return DownInvoice::make()->buyer($customer)->seller($seller)->addItem($item)->filename('IN00001')->stream();
        // return DownInvoice::make()->buyer($customer)->addItem($item)->stream();
    }

    public function store($type = 'all')
    {

        // dd($type);
        switch ($type) {
            case 'all':
                $prod = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->select(
                        'products.id',
                        'products.name',
                        'products.description',
                        'products.price',
                        'products.type',
                        DB::raw('COUNT(reviews.id) as review_count'),
                        DB::raw('ROUND(AVG(reviews.rating), 1) as rating')
                    )
                    ->groupBy('products.id')
                    ->where('products.status', true)
                    ->get();
                break;

            case 'hotel':
                $prod = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->select(
                        'products.id',
                        'products.name',
                        'products.description',
                        'products.price',
                        'products.type',
                        DB::raw('COUNT(reviews.id) as review_count'),
                        DB::raw('ROUND(AVG(reviews.rating), 1) as rating')
                    )
                    ->groupBy('products.id')
                    ->where('type', 'hotels')
                    ->where('products.status', true)
                    ->get();

                break;

            case 'pack':
                $prod = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->select(
                        'products.id',
                        'products.name',
                        'products.description',
                        'products.price',
                        'products.type',
                        DB::raw('COUNT(reviews.id) as review_count'),
                        DB::raw('ROUND(AVG(reviews.rating), 1) as rating')
                    )
                    ->groupBy('products.id')
                    ->where('type', 'packs')
                    ->where('products.status', true)
                    ->get();
                break;

            case 'flight':
                $prod = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->select(
                        'products.id',
                        'products.name',
                        'products.description',
                        'products.price',
                        'products.type',
                        DB::raw('COUNT(reviews.id) as review_count'),
                        DB::raw('ROUND(AVG(reviews.rating), 1) as rating')
                    )
                    ->groupBy('products.id')
                    ->where('type', 'flights')
                    ->where('products.status', true)
                    ->get();
                break;

            case 'activity':
                $prod = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->select(
                        'products.id',
                        'products.name',
                        'products.description',
                        'products.price',
                        'products.type',
                        DB::raw('COUNT(reviews.id) as review_count'),
                        DB::raw('ROUND(AVG(reviews.rating), 1) as rating')
                    )
                    ->groupBy('products.id')
                    ->where('type', 'activities')
                    ->where('products.status', true)
                    ->get();
                break;

            case 'transport':
                $prod = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->select(
                        'products.id',
                        'products.name',
                        'products.description',
                        'products.price',
                        'products.type',
                        DB::raw('COUNT(reviews.id) as review_count'),
                        DB::raw('ROUND(AVG(reviews.rating), 1) as rating')
                    )
                    ->groupBy('products.id')
                    ->where('type', 'transportations')
                    ->where('products.status', true)
                    ->get();
                break;


            default:
                # code...
                break;
        }

        return view('store.main', [
            'type' => $type,
            'prods' => $prod,
        ]);
    }

    public function showProduct($type, $id)
    {

        $prod = DB::table('products')
            ->leftjoin('reviews', 'products.id', '=', 'reviews.product_id')
            ->join($type, 'products.id', '=', $type . '.product_id')
            ->select(
                '*',
                DB::raw('COUNT(reviews.id) as review_count'),
                DB::raw('ROUND(AVG(reviews.rating), 1) as rating_avg')
            )
            // ->orderByDesc('reviews.id')
            ->where('products.id', $id)
            ->first();

        $extra = '';
        $extra2 = '';
        if ($type == 'hotels') {
            $extra = City::where('id', $prod->city_id)->first();
        } else if ($type == 'packs') {
            $extra = Category::where('id', $prod->category_id)->first();
        } else if ($type == 'flights') {
            $extra = City::where('id', $prod->departure_city_id)->first();
            $extra2 = City::where('id', $prod->arrival_city_id)->first();
        } else if ($type == 'activities') {
            $extra = City::where('id', $prod->city_id)->first();
        } else if ($type == 'transportations') {
            $extra = City::where('id', $prod->departure_city_id)->first();
            $extra2 = City::where('id', $prod->arrival_city_id)->first();
        }


        return view('store.' . $type, [
            // 'type' => $type,
            'prod' => $prod,
            'extra' => $extra,
            'extra2' => $extra2,
            'reviews' => Review::where('product_id', $prod->product_id)->orderByDesc('created_at')->get()
        ]);
    }

    public function buyProd($user, $prod)
    {

        $product = Product::find($prod);

        $booking = Booking::create(
            [
                'user_id' => $user,
                'product_id' => $prod,
                'total_price' => $product->price,
            ]
        );

        Invoice::create(
            [
                'user_id' => $user,
                'booking_id' => $booking->id,
                'total_amount' => $booking->total_price,
                'payment_status' => 'pendiente',
                'payment_date' => null,
            ]
        );

        return redirect()->back()->with('Success', 'Reservado con éxito');
    }

    public function comment(Request $r)
    {
        // dd($r);
        $validated = request()->validate(
            [
                'comment' => 'required|min:10|max:500',
                'rating' => 'required|min:0|max:10',
            ]
        );

        // dd($r);

        Review::create([
            'user_id' => $r->user,
            'product_id' => $r->product,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'status' => 1,
        ]);

        return redirect()->back();
    }
}
