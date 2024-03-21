<?php

use App\Http\Controllers\ProjectController;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {

    $productos = DB::table('hotels')
        ->join('products', 'products.id', '=', 'hotels.product_id')
        ->join('reviews', 'products.id', '=', 'reviews.product_id')
        ->join('cities', 'cities.id', '=', 'hotels.city_id')
        ->select(
            'products.name as name',
            'products.id as id',
            'products.type as type',
            DB::raw('ROUND(AVG(reviews.rating), 1) as rating'),
            'cities.name as city'
        )
        ->groupBy('products.id')
        ->orderByDesc('rating')
        ->limit(3)
        ->get();

    $data = [
        'products' => $productos,
    ];

    // dd($productos);

    return view('main.home', $data);
})->name('home');



// Login - View
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Login - Validate
Route::post(
    '/login/validate',
    [ProjectController::class, "login"]
);



// Logup
Route::get('/logup', function () {
    return view('auth.register');
})->name('register');

// Logup - New user
Route::post(
    '/register/create',
    [ProjectController::class, "logup"]
);



// Logout
Route::get(
    '/logout',
    [ProjectController::class, "logout"]
);



// UserProfile
Route::get(
    '/profile/{id}',
    [ProjectController::class, "profile"]
)->middleware('auth');

// UserProfile - Pay
Route::get(
    '/pay/{user}/{booking}/{action}',
    [ProjectController::class, "profilePay"]
)->middleware('auth');



// Contact
Route::get('/contact', function () {
    return view('main.contact');
})->name('contact');



// Dashboard
Route::get(
    '/dashboard/{page?}',
    [ProjectController::class, "dashboard"]
)->name('dashboard')->middleware('auth');


// Dashboard - Create
Route::match(
    ['post', 'get'],
    '/dashboard/{type}/create',
    [ProjectController::class, "showCreate"]
)->middleware('auth');

// Dashboard - Create
Route::post(
    '/dashboard/create',
    [ProjectController::class, "create"]
)->middleware('auth');


// Dashboard - Modify
Route::get(
    '/dashboard/{type}/{id}/update',
    [ProjectController::class, "showUpdate"]
)->middleware('auth');

// Dashboard - Modify
Route::post(
    '/dashboard/update',
    [ProjectController::class, "update"]
)->middleware('auth');


// Dashboard - Visibility
Route::get(
    '/dashboard/{type}/{id}/visibility',
    [ProjectController::class, "visibility"]
)->middleware('auth');


// Dashboard - Delete
Route::get(
    '/dashboard/{type}/{id}/delete',
    [ProjectController::class, "delete"]
)->middleware('auth');

// Dashboard - Download Invoice
Route::get(
    '/dashboard/download/{invoice}/{user}/{product}',
    [ProjectController::class, "download"]
)->middleware('auth');



// Store
Route::get(
    '/store/{type?}',
    [ProjectController::class, "store"]
)->name('store');

// Store - Show
Route::get(
    '/store/{type}/{id}',
    [ProjectController::class, "showProduct"]
);

// Store - Buy
Route::get(
    '/store/buy/{user_id}/{prod_id}',
    [ProjectController::class, "buyProd"]
)->middleware('auth');

// Store - Comment
Route::post(
    '/comment',
    [ProjectController::class, "comment"]
)->middleware('auth');

// Store - Comment (Oculta)
Route::get(
    '/comment/{id}/hide',
    function ($id) {
        $review = Review::find($id);
        $review->update([
            'status' => false,
        ]);
        return redirect()->back();
    }

)->middleware('auth');

// Store - Comment (Mostra)
Route::get(
    '/comment/{id}/show',
    function ($id) {
        $review = Review::find($id);
        $review->update([
            'status' => true,
        ]);
        return redirect()->back();
    }
)->middleware('auth');

// Store - Comment (Esborra)
Route::get(
    '/comment/{id}',
    function ($id) {
        Review::find($id)->delete();
        return redirect()->back();
    }
)->middleware('auth');



// Cart
Route::get('/cart', );

// Cart - Add
Route::get('/cart/add/{id}', );

// Cart - Remove
Route::get('/cart/delete/{id}', );
