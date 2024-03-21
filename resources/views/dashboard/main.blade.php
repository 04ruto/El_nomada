@extends('dashboard.dashboard')

@section('dashContent')
    <!-- Área de contenido principal -->
    <div class="flex-1 p-4">

        <x-notify::notify />

        @if (session('Success'))
            <div class="container mb-2 w-full" id="alertbox">
                <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                    role="alert">
                    <p>{{ session('Success') }}</p>

                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                        <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
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
        <!-- Campo de búsqueda -->
        {{-- <div class="relative max-w-md w-full">
                        <div class="absolute top-1 left-2 inline-flex items-center p-2">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input
                            class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                            type="search" placeholder="Buscar...">
                    </div> --}}

        <!-- Contenedor de las 4 secciones (disminuido para dispositivos pequeños) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
            <!-- Gráfica de Usuarios -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Usuarios</h2>
                <div class="my1-"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px  mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container" style="position: relative; height:150px; width:100%">
                    <!-- El canvas para la gráfica -->
                    <canvas id="usersChart"></canvas>
                </div>
            </div>

            <!-- Gráfica de Comercios -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Productos</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container" style="position: relative; height:150px; width:100%">
                    <!-- El canvas para la gráfica -->
                    <canvas id="productsChart"></canvas>
                </div>
            </div>

            <!-- Usuarios -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-4">Usuarios</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Nombre</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Correo</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Rol</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    {{ $user->email }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light ">
                                    {{ $user->role }}</td>
                                @if ($user->status)
                                    <td class="py-1 px-2 text-center text-white text-sm border-b border-grey-light">
                                        <span class="p-1 bg-green-500  rounded ">Activo</span>
                                    </td>
                                @else
                                    <td class="py-1 px-2 text-center text-white text-sm border-b border-grey-light">
                                        <span class="p-1 bg-red-500 rounded">Inactivo</span>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
                {{-- <div class="text-right mt-4">
                            {{ $users->links() }}
                        </div> --}}
            </div>

            <!-- Tabla de Productos -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-4">Productos</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Nombre</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Descripción</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light text-right">
                                Precio</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-right">
                                Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">{{ $product->name }}</td>
                                <td class="py-2 px-4 border-b border-grey-light text-xs">
                                    {{ $product->description }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    {{ $product->price }} €</td>
                                @if ($product->status)
                                    <td class="py-1 px-2 text-center text-white text-sm border-b border-grey-light">
                                        <span class="p-1 bg-green-500  rounded ">Activo</span>
                                    </td>
                                @else
                                    <td class="py-1 px-2 text-center text-white text-sm border-b border-grey-light">
                                        <span class="p-1 bg-red-500 rounded">Inactivo</span>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Botón "Ver más" para la tabla de Transacciones -->
                <div class="text-right mt-4 ">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
            <!-- Gráfica de Usuarios -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Reservas</h2>
                <div class="my1-"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px  mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container flex justify-center items-center w-full text-8xl"
                    style="position: relative; height:150px;">
                    <!-- El canvas para la gráfica -->
                    {{ $bookings->count() }}
                </div>
            </div>

            <!-- Gráfica de Comercios -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Facturas</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container" style="position: relative; height:150px; width:100%">
                    <!-- El canvas para la gráfica -->
                    <canvas id="factsChart"></canvas>
                </div>
            </div>

            <!-- Sección 3 - Tabla de Autorizaciones Pendientes (disminuida para dispositivos pequeños) -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-4">Reservas</h2>
                <div class="my-1"></div>
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Usuario</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Producto</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                                Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">{{ $booking->user->name }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    {{ $booking->product->name }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light text-center">
                                    {{ $booking->total_price }} €</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="text-right mt-4">
                            {{ $bookings->links() }}
                        </div> --}}
            </div>

            <!-- Tabla de Productos -->
            <div class="bg-white p-4 rounded-md">
                <h2 class="text-gray-500 text-2xl font-semibold pb-4">Facturas</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Usuario</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light">
                                Precio</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light text-center">
                                Estado</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-left text-grey-light border-b border-grey-light text-right">
                                Fecha Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">{{ $invoice->user->name }}
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light">
                                    {{ $invoice->total_amount }} €
                                </td>
                                @if ($invoice->payment_status == 'pagado')
                                    <td class="py-1 px-2 text-center text-black text-sm border-b border-grey-light">
                                        <span class="p-1 bg-green-300  rounded ">{{ $invoice->payment_status }}</span>
                                    </td>
                                @endif
                                @if ($invoice->payment_status == 'pendiente')
                                    <td class="py-1 px-2 text-center text-black text-sm border-b border-grey-light">
                                        <span class="p-1 bg-orange-300 rounded">{{ $invoice->payment_status }}</span>
                                    </td>
                                @endif
                                @if ($invoice->payment_status == 'reembolsado')
                                    <td class="py-1 px-2 text-center text-black text-sm border-b border-grey-light">
                                        <span class="p-1 bg-yellow-300 rounded">{{ $invoice->payment_status }}</span>
                                    </td>
                                @endif
                                @if ($invoice->payment_status == 'cancelado')
                                    <td class="py-1 px-2 text-center text-black text-sm border-b border-grey-light">
                                        <span class="p-1 bg-red-300 rounded">{{ $invoice->payment_status }}</span>
                                    </td>
                                @endif
                                {{-- <td class="py-2 px-4 border-b border-grey-light text-center">
                                                {{ $invoice->payment_status }}</td> --}}
                                <td class="py-2 px-4 border-b border-grey-light text-right">
                                    {{ $invoice->payment_date }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Botón "Ver más" para la tabla de Transacciones -->
                {{-- <div class="text-right mt-4 ">
                            {{ $invoices->links() }}
                        </div> --}}
            </div>
        </div>
    </div>


    <script>
        // Usuarios activos / inactivos
        var u_activos = {{ $users->where('status', true)->count() }};
        var u_inactivos = {{ $users->where('status', false)->count() }};

        // Configurar de Usuarios
        var usersChart = new Chart(document.getElementById('usersChart'), {
            type: 'doughnut',
            data: {
                labels: ['Activos', 'Inactivos'],
                datasets: [{
                    data: [u_activos, u_inactivos],
                    backgroundColor: ['#86efac', '#fca5a5'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom'
                }
            }
        });

        // Productos activos / inactivos
        var p_activos = {{ $products->where('status', true)->count() }};
        var p_inactivos = {{ $products->where('status', false)->count() }};

        // Gráfica de Comercios
        var productsChart = new Chart(document.getElementById('productsChart'), {
            type: 'doughnut',
            data: {
                labels: ['Activos', 'Inactivos'],
                datasets: [{
                    data: [p_activos, p_inactivos],
                    backgroundColor: ['#86efac', '#fca5a5'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Ubicar la leyenda debajo del círculo
                }
            }
        });


        // Facturas
        var f_pagada = {{ $invoices->where('payment_status', 'like', 'pagado')->count() }};
        var f_pendiente = {{ $invoices->where('payment_status', 'like', 'pendiente')->count() }};
        var f_reembolso = {{ $invoices->where('payment_status', 'like', 'reemboldado')->count() }};
        var f_cancelada = {{ $invoices->where('payment_status', 'like', 'cancelado')->count() }};

        // Gráfica de Comercios
        var FactsChart = new Chart(document.getElementById('factsChart'), {
            type: 'doughnut',
            data: {
                labels: ['Pagadas', 'Pendientes', 'Rembolasadas', 'Canceladas'],
                datasets: [{
                    data: [f_pagada, f_pendiente, f_reembolso, f_cancelada],
                    backgroundColor: ['#86efac', '#fdba74', '#fde047', '#fca5a5'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Ubicar la leyenda debajo del círculo
                }
            }
        });

        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle(
                'hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
    </script>
@endsection
