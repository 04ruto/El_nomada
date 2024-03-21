@extends('dashboard.dashboard')

@section('dashContent')
    <!-- Área de contenido principal -->
    <div class="flex-1 p-4 w-full md:w-1/2">
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
        <div class="relative max-w-md w-full">
            <div class="absolute top-1 left-2 inline-flex items-center p-2">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input
                class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                type="search" placeholder="Buscar...">
        </div>

        <!-- Contenedor de Gráficas -->
        <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">

            <!-- Segundo contenedor -->
            <!-- Sección 2 - Gráfica de Comercios -->
            <div class="bg-white p-4 rounded-md flex-1">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Facturas</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container" style="position: relative; height:200px; width:100%">
                    <!-- El canvas para la gráfica -->
                    <canvas id="factsChart"></canvas>
                </div>
            </div>
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Ganancias</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <div class="chart-container text-7xl text-green-600 flex justify-center pt-10"
                    style="position: relative; height:200px; width:100%">
                    <i class="fa-solid fa-arrow-trend-up"></i>&nbsp;
                    {{ number_format($invoices->where('payment_status', '!=', 'cancelado')->where('payment_status', '!=', 'reembolsado')->sum('total_amount'), 2, ',', '.') }}
                    €
                </div>

            </div>
        </div>

        <!-- Tercer contenedor debajo de los dos anteriores -->
        <!-- Sección 3 - Tabla de Autorizaciones Pendientes -->
        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <div class="flex justify-between">
                <h2 class="text-gray-500 text-2xl font-semibold pb-4">Facturas <sub>({{ $invoices->count() }})</sub></h2>
                <a href="/dashboard/invoice/create"
                    class="flex select-none items-center gap-3 rounded-lg bg-gradient-to-tr from-indigo-400 to-indigo-300 px-4 text-center align-middle text-xs font-bold uppercase text-white active:opacity-[0.85] transition duration-300 hover:scale-110"
                    type="button" data-ripple-light="true">
                    <i class="fa-solid fa-plus"></i>
                    añadir
                </a>
            </div>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
            <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                            Usuario</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                            Correo</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                            Producto</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Precio</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Estado</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Fecha pago</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light">{{ $invoice->user->name }}</td>
                            <td class="py-2 px-4 border-b border-grey-light text-xs">
                                {{ $invoice->user->email }}
                            </td>
                            <td class="py-2 px-4 border-b border-grey-light">
                                {{ $invoice->booking->product->name }}</td>

                            @if ($invoice->payment_status == 'cancelado' or $invoice->payment_status == 'reembolsado')
                                <td class="py-2 px-4 border-b border-grey-light text-center text-red-600">
                                @else
                                <td class="py-2 px-4 border-b border-grey-light text-center">
                            @endif
                            {{ $invoice->total_amount }} €
                            </td>
                            <td class="py-1 px-2 text-center text-black text-sm border-b border-grey-light">
                                @if ($invoice->payment_status == 'pagado')
                                    <span class="p-1 bg-green-300  rounded ">{{ $invoice->payment_status }}</span>
                                @endif
                                @if ($invoice->payment_status == 'pendiente')
                                    <span class="p-1 bg-orange-300 rounded">{{ $invoice->payment_status }}</span>
                                @endif
                                @if ($invoice->payment_status == 'reembolsado')
                                    <span class="p-1 bg-yellow-300 rounded">{{ $invoice->payment_status }}</span>
                                @endif
                                @if ($invoice->payment_status == 'cancelado')
                                    <span class="p-1 bg-red-300 rounded">{{ $invoice->payment_status }}</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b border-grey-light text-xs text-center">
                                {{ $invoice->payment_date }}</td>
                            <td class="py-1 px-2 text-center border-b border-grey-light min-w-[100px]">
                                <a href="/dashboard/invoices/{{ $invoice->id }}/delete"
                                    class="text-gray-400 hover:text-red-500  ml-2">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="/dashboard/download/{{ $invoice->id }}/{{ $invoice->user->id }}/{{ $invoice->booking->product->id }}"
                                    target="_blank" class="text-gray-400 hover:text-red-500  ml-2">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Script para las gráficas -->
    <script>
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
