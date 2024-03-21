@extends('dashboard.dashboard')

@section('dashContent')
    <!-- Área de contenido principal -->
    <div class="flex-1 p-4 w-full md:w-1/2">

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
        <div class="relative max-w-md w-full">
            <div class="absolute top-1 left-2 inline-flex items-center p-2">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input
                class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline"
                type="search" placeholder="Buscar...">
        </div>

        <!-- Contenedor de Gráficas -->
        <div class="grid grid-cols-3 gap-4 mt-2 p-2 wrap">
            {{-- Paises --}}
            <div class="flex-1 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Paises</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container flex justify-center items-center w-full text-8xl"
                    style="position: relative; height:150px;">
                    <!-- El canvas para la gráfica -->
                    {{ $countries->count() }}
                </div>
            </div>
            {{-- Ciudades --}}
            <div class="flex-1 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Ciudades</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container flex justify-center items-center w-full text-8xl"
                    style="position: relative; height:150px;">
                    <!-- El canvas para la gráfica -->
                    {{ $cities->count() }}
                </div>
            </div>

            {{-- Categorias --}}
            <div class="flex-1 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-2xl font-semibold pb-1">Categorias</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <div class="chart-container flex justify-center items-center w-full text-8xl"
                    style="position: relative; height:150px;">
                    <!-- El canvas para la gráfica -->
                    {{ $categories->count() }}
                </div>
            </div>


            {{-- Paises --}}
            <div class=" bg-white p-4 shadow rounded-lg">
                <div class="flex justify-between">
                    <h2 class="text-gray-500 text-2xl font-semibold pb-4">Paises</h2>
                </div>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-center">
                                Bandera</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                                Nombre</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-center">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">
                                    <img src="https://flagcdn.com/24x18/{{ $country->code }}.png"
                                        srcset="https://flagcdn.com/48x36/{{ $country->code }}.png 2x,
                                          https://flagcdn.com/72x54/{{ $country->code }}.png 3x"
                                        width="24" height="18" class="mx-auto">
                                </td>
                                <td class="py-2 px-4 border-b border-grey-light">{{ $country->name }}</td>
                                <td class="py-1 px-2 text-center border-b border-grey-light">
                                    <a href="/dashboard/countries/{{ $country->id }}/delete"
                                        class="text-gray-400 hover:text-red-500 ml-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="border-2 border-indigo-600/30 shadow-lg ">
                            <form action="/dashboard/create" method="post">
                                @csrf

                                <input type="text" hidden value="country" name="table">
                                <td>
                                    <input type="text" name="code_country" class="py-2 px-4 w-full text-center"
                                        placeholder="Codigo País">
                                </td>
                                @error('code_country')
                                    <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                                <td>
                                    <input type="text" name="country_name" class="py-2 px-4 w-full"
                                        placeholder="Nuevo País">
                                </td>
                                @error('country_name')
                                    <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                                <td class="py-1 px-2 text-center">
                                    <button type="submit" class="text-gray-400 hover:text-green-500 ml-2">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- Ciudades --}}
            <div class=" bg-white p-4 shadow rounded-lg">
                <div class="flex justify-between">
                    <h2 class="text-gray-500 text-2xl font-semibold pb-4">Ciudades por País</h2>
                </div>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                                País</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                                Ciudad</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-center">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-4 border-b border-grey-light">{{ $city->country->name }}</td>
                                <td class="py-2 px-4 border-b border-grey-light">{{ $city->name }}</td>
                                <td class="py-1 px-2 text-center border-b border-grey-light">
                                    <a href="/dashboard/cities/{{ $city->id }}/delete"
                                        class="text-gray-400 hover:text-red-500 ml-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="border-2 border-indigo-600/30 shadow-lg">
                            <form action="/dashboard/create" method="post">
                                @csrf

                                <input type="text" hidden value="city" name="table">
                                <td>
                                    <select name="country_selection" class="py-2 px-4">
                                        <option selected value="value">----------------</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                @error('country_selection')
                                    <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                                <td>
                                    <input type="text" name="city_name" class="py-2 px-4 w-full"
                                        placeholder="Nueva Ciudad">
                                </td>
                                @error('city_name')
                                    <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                                <td class="py-1 px-2 text-center">
                                    <button type="submit" class="text-gray-400 hover:text-green-500 ml-2">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- categorias --}}
            <div class=" bg-white p-4 shadow rounded-lg">
                <div class="flex justify-between">
                    <h2 class="text-gray-500 text-2xl font-semibold pb-4">Categorias</h2>
                </div>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px mb-6"></div>
                <!-- Línea con gradiente -->
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm leading-normal">
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                            </th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-left">
                                Nombre</th>
                            <th
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-center">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-2 px-8 border-b border-grey-light w-[100px]">{{ $counter }}</td>
                                <td class="py-2 px-4 border-b border-grey-light">{{ $category->name }}</td>
                                <td class="py-1 px-2 text-center border-b border-grey-light">
                                    <a href="/dashboard/categories/{{ $category->id }}/delete"
                                        class="text-gray-400 hover:text-red-500  ml-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                        <tr class="border-2 border-indigo-600/30 shadow-lg ">
                            <form action="/dashboard/create" method="post">
                                @csrf

                                <input type="text" hidden value="category" name="table">

                                <td class="py-2 px-8 ">{{ $counter }}</td>
                                <td>
                                    <input type="text" name="category_name" class="py-2 px-4"
                                        placeholder="Nueva Categoria">
                                </td>
                                @error('category_name')
                                    <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                                <td class="py-1 px-2 text-center">
                                    <button type="submit" class="text-gray-400 hover:text-green-500 ml-2">
                                        <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">

        </div>

    </div>

    <!-- Script para las gráficas -->
    <script>
        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle(
                'hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
    </script>
@endsection
