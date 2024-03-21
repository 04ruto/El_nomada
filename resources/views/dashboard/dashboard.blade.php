@extends('layout')

@section('content')
    <!-- component -->
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>

        <div class="flex flex-col min-h-screen bg-gray-100">

            <!-- Contenido principal -->
            <div class="flex-1 flex py-1">
                <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
                <div class="p-2 bg-white w-60 flex flex-col hidden md:flex">
                    <nav>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                            href="/dashboard">
                            <i class="fas fa-home mr-2"></i>Inicio
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                            href="/dashboard/users">
                            <i class="fas fa-users mr-2"></i>Usuarios
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                            href="/dashboard/products">
                            <i class="fas fa-store mr-2"></i>Productos
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                            href="/dashboard/others">
                            <i class="fas fa-store mr-2"></i>Otros
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                            href="/dashboard/bookings">
                            <i class="fas fa-calendar-days mr-2"></i>Reservas
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-indigo-400 hover:to-indigo-200 hover:text-white"
                            href="/dashboard/invoices">
                            <i class="fas fa-file-alt mr-2"></i>Facturas
                        </a>
                    </nav>
                </div>
                @yield('dashContent')

            </div>
        </div>
    </body>

    </html>
@endsection
