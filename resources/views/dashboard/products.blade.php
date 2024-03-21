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
            <!-- Primer contenedor -->
            <!-- Sección 1 - Gráfica de Usuarios -->
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Productos - Activos</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container" style="position: relative; height:200px; width:100%">
                    <!-- El canvas para la gráfica -->
                    <canvas id="productsChart"></canvas>
                </div>
            </div>
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Productos - Tipo</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container" style="position: relative; height:200px; width:100%">
                    <!-- El canvas para la gráfica -->
                    <canvas id="productTypeChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Productos --}}
        <div class="mt-8 bg-white p-4 shadow rounded-lg">
            <div class="flex justify-between">
                <h2 class="text-gray-500 text-2xl font-semibold pb-4">Productos <sub>({{ $products->count() }})</sub></h2>
                <a href="/dashboard/product/create"
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
                            Nombre</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                            Descripción</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                            Tipo</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-center">
                            Precio</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Estado</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b border-grey-light text-xs">
                                {{ $product->description }}
                            </td>
                            <td class="py-2 px-4 border-b border-grey-light ">
                                {{ $product->type }}</td>
                            <td class="py-2 px-4 border-b border-grey-light text-center">
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
                            <td class="py-1 px-2 text-center border-b border-grey-light min-w-[100px]">
                                <a href="/dashboard/products/{{ $product->id }}/visibility"
                                    class="text-gray-400 hover:text-yellow-500 mr-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-indigo-500  mx-2">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="/dashboard/products/{{ $product->id }}/delete"
                                    class="text-gray-400 hover:text-red-500  ml-2">
                                    <i class="fa-solid fa-trash"></i>
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
        // Usuarios activos / inactivos
        var p_activos = {{ $products->where('status', true)->count() }};
        var p_inactivos = {{ $products->where('status', false)->count() }};

        // Configurar de Usuarios
        var usersChart = new Chart(document.getElementById('productsChart'), {
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
                    position: 'bottom'
                }
            }
        });

        // Usuarios activos / inactivos
        var hotels = {{ $products->where('type', 'like', 'hotels')->count() }};
        var packs = {{ $products->where('type', 'like', 'packs')->count() }};
        var flights = {{ $products->where('type', 'like', 'flights')->count() }};
        var activities = {{ $products->where('type', 'like', 'activities')->count() }};
        var transportations = {{ $products->where('type', 'like', 'transportations')->count() }};

        // Configurar de Usuarios
        var usersChart = new Chart(document.getElementById('productTypeChart'), {
            type: 'doughnut',
            data: {
                labels: ['Hoteles', 'Packs', 'Vuelos', 'Actividades', 'Transportes'],
                datasets: [{
                    data: [hotels, packs, flights, activities, transportations],
                    backgroundColor: ['#7ce0a9', '#f6cb51', '#4fc3f7', '#ff8a65', '#ba68c8'],
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


        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle(
                'hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
    </script>
@endsection
