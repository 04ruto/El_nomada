@extends('layout')

@section('content')
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <div class="w-full md:w-3/12 md:mx-2">
                    <div class="bg-white p-3 border-t-4 border-indigo-600">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                src="https://images.unsplash.com/photo-1517400508447-f8dd518b86db?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $user->role }}</h3>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Estado de la cuenta</span>
                                <span class="ml-auto">
                                    @if ($user->status)
                                        <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Activo</span>
                                    @else
                                        <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">Inactivo</span>
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Miembro desde</span>
                                <span class="ml-auto">
                                    @if ($user->created_at)
                                        {{ $user->created_at->format('Y-m-d') }}
                                    @else
                                        Empty
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full md:w-9/12 mx-2">
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Perfil</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2">{{ explode(' ', $user->name, 2)[0] }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2">
                                        @if (count(explode(' ', $user->name, 2)) > 1)
                                            {{ explode(' ', $user->name, 2)[1] }}
                                        @endif
                                    </div>
                                </div>

                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Correo electrónico</div>
                                    <div class="px-4 py-2">{{ $user->email }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="/logout"
                            class="block w-full  text-sm text-center font-semibold rounded-lg bg-red-300 hover:bg-red-500 hover:shadow-sm hover:shadow-red-300 p-3 my-4 transition duration-300">Cerrar
                            Sessión</a>
                    </div>

                    <div class="bg-white p-3 shadow-sm rounded-sm mt-4">

                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Reservas</span>
                            </div>

                            @if (session('successPay'))
                                <div class="container mb-2 w-full" id="alertbox">
                                    <div class="container bg-green-400 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                                        role="alert">
                                        <p>{{ session('successPay') }}</p>

                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                                            <svg class="fill-current h-6 w-6 text-white" role="button"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <title>Close</title>
                                                <path
                                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                                    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

                                <script>
                                    $(".closealertbutton").click(function(e) {
                                        pid = $(this).parent().parent().hide(500)
                                    })
                                </script>
                            @endif
                            @if (session('failedPay'))
                                <div class="container mb-2 w-full" id="alertbox">
                                    <div class="container bg-red-400 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                                        role="alert">
                                        <p>{{ session('failedPay') }}</p>

                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                                            <svg class="fill-current h-6 w-6 text-white" role="button"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <title>Close</title>
                                                <path
                                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                                    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

                                <script>
                                    $(".closealertbutton").click(function(e) {
                                        pid = $(this).parent().parent().hide(500)
                                    })
                                </script>
                            @endif

                            <table class="table-auto w-full">
                                <thead class="text-xs font-semibold uppercase bg-gray-100">
                                    <tr>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="px-4 py-2 font-semibold text-left">Producto</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="px-4 py-2 font-semibold text-left">Descripción</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="px-4 py-2 font-semibold text-left">Precio</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="px-4 py-2 font-semibold text-center">Estado Pago</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="px-4 py-2 font-semibold text-center">Acción</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @if (!empty($bookings))
                                        @foreach ($bookings as $booking)
                                            <tr>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                                            {{-- <img class="rounded-full"
                                                                src="https://images.unsplash.com/photo-1635070636690-d887c1a77e7b?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                                width="40" height="40" alt="Alex Shatov"> --}}
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4/5"
                                                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path
                                                                    d="M0 64C0 28.7 28.7 0 64 0H384c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM183 278.8c-27.9-13.2-48.4-39.4-53.7-70.8h39.1c1.6 30.4 7.7 53.8 14.6 70.8zm41.3 9.2l-.3 0-.3 0c-2.4-3.5-5.7-8.9-9.1-16.5c-6-13.6-12.4-34.3-14.2-63.5h47.1c-1.8 29.2-8.1 49.9-14.2 63.5c-3.4 7.6-6.7 13-9.1 16.5zm40.7-9.2c6.8-17.1 12.9-40.4 14.6-70.8h39.1c-5.3 31.4-25.8 57.6-53.7 70.8zM279.6 176c-1.6-30.4-7.7-53.8-14.6-70.8c27.9 13.2 48.4 39.4 53.7 70.8H279.6zM223.7 96l.3 0 .3 0c2.4 3.5 5.7 8.9 9.1 16.5c6 13.6 12.4 34.3 14.2 63.5H200.5c1.8-29.2 8.1-49.9 14.2-63.5c3.4-7.6 6.7-13 9.1-16.5zM183 105.2c-6.8 17.1-12.9 40.4-14.6 70.8H129.3c5.3-31.4 25.8-57.6 53.7-70.8zM352 192A128 128 0 1 0 96 192a128 128 0 1 0 256 0zM112 384c-8.8 0-16 7.2-16 16s7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H112z" />
                                                            </svg>
                                                        </div>
                                                        <div class="font-medium text-gray-800">
                                                            {{ $booking->prod_name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-left">{{ $booking->prod_description }}</div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    @if ($booking->payment_status == 'cancelado' or $booking->payment_status == 'reembolsado')
                                                        <div class="text-center font-medium text-red-500">
                                                            {{ $booking->price }} €
                                                        </div>
                                                    @endif
                                                    @if ($booking->payment_status == 'pendiente')
                                                        <div class="text-center font-medium">
                                                            {{ $booking->price }} €
                                                        </div>
                                                    @endif
                                                    @if ($booking->payment_status == 'pagado')
                                                        <div class="text-center font-medium text-green-500">
                                                            {{ $booking->price }} €
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="p-2 whitespace-nowrap text-center">
                                                    @if ($booking->payment_status == 'pagado')
                                                        <span
                                                            class="p-1 bg-green-300 rounded ">{{ $booking->payment_status }}</span>
                                                    @endif
                                                    @if ($booking->payment_status == 'pendiente')
                                                        <span
                                                            class="p-1 bg-orange-300 rounded">{{ $booking->payment_status }}</span>
                                                    @endif
                                                    @if ($booking->payment_status == 'reembolsado')
                                                        <span
                                                            class="p-1 bg-yellow-300 rounded">{{ $booking->payment_status }}</span>
                                                    @endif
                                                    @if ($booking->payment_status == 'cancelado')
                                                        <span
                                                            class="p-1 bg-red-300 rounded">{{ $booking->payment_status }}</span>
                                                    @endif
                                                </td>
                                                <td class="p-2 whitespace-nowrap text-center text-base">
                                                    <a href="/pay/{{ Auth::user()->id }}/{{ $booking->fact_id }}/accept">
                                                        <i class="fa-regular fa-credit-card"></i>
                                                    </a>
                                                    <a href="/pay/{{ Auth::user()->id }}/{{ $booking->fact_id }}/decline"
                                                        class="ml-4">
                                                        <i class="fa-solid fa-ban"></i>
                                                    </a>
                                                </td>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center p-2 whitespace-nowrap">Sin reservas</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
