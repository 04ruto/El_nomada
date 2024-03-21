@extends('layout')

@section('content')
    <div class="flex flex-col min-h-screen bg-gray-100 ">

        <!-- Contenido principal -->
        <div class="flex-1 flex py-1">
            <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
            <div class="p-2 bg-white w-60 flex flex-col hidden md:flex">
                <nav>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                        href="/store">
                        <i class="fa-solid fa-passport mr-2"></i> Todos los Productos
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                        href="/store/hotel">
                        <i class="fa-solid fa-hotel mr-2"></i> Hoteles
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                        href="/store/pack">
                        <i class="fa-solid fa-suitcase mr-2"></i> Packs
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                        href="/store/flight">
                        <i class="fa-solid fa-plane mr-2"></i> Vuelos
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                        href="/store/activity">
                        <i class="fa-solid fa-person-hiking mr-2"></i> Actividades
                    </a>
                    <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                        href="/store/transport">
                        <i class="fa-solid fa-train mr-2"></i> Transportes
                    </a>
                </nav>
            </div>

            @yield('storeContent')

        </div>
    </div>
@endsection
