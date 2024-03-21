@extends('dashboard.dashboard')

@section('dashContent')
    <div class="bg-white mx-4 p-4 rounded-md flex flex-col w-full">
        @if (session('error'))
            <div class="container" id="alertbox">
                <div class="container bg-red-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                    role="alert">
                    <p>{{ session('error') }}</p>

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
                    // $('.alertbox')[0].hide()
                    // e.preventDefault();
                    pid = $(this).parent().parent().hide(500)
                    console.log(pid)
                    // $(".alertbox", this).hide()
                })
            </script>
        @endif
        <h2 class="text-gray-500 text-2xl font-semibold pb-1">Creador</h2>
        <div class="my1-"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px  mb-6"></div>

        <form action="/dashboard/update" method="POST" autocomplete="off">
            @csrf

            <input type="text" hidden value="{{ $type }}" name="table">

            <input type="text" hidden value="{{ $elem->id }}" name="elem_id">

            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-name">
                        Nombre
                    </label>
                    <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                        id="grid-name" type="text" name="name" value='{{ $elem->name }}'>
                    @error('name')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                @if ($type == 'users')
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-email">
                            Email
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-email" type="text" name="email" placeholder="cristobal@example.com"
                            value='{{ $elem->email }}' autocomplete="off">
                        @error('email')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if ($type == 'products')
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-type-product">
                            Tipo
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-type-product" name="type">
                            <option value="hotels">Hotel</option>
                            <option value="packs">Pack</option>
                            <option value="flights">Vuelo</option>
                            <option value="activities">Actividad</option>
                            <option value="transportations">Transporte</option>
                        </select>
                    </div>
                @endif

            </div>
            @if ($type == 'products')
                <div class="-mx-3 md:flex mb-6">
                    <div class="md:w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-descripcion">
                            Descripción
                        </label>
                        <textarea rows="5"
                            class="resize-none form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-descripcion" type="text" name="desc"></textarea>
                        @error('desc')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="-mx-3 md:flex mb-2">
                @if ($type == 'products')
                    <div class="md:w-1/2 px-3 mb-6 ">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-precio">
                            Precio
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-precio" type="number" placeholder="0,0 €" name="price" min="0"
                            step="0.01">
                        @error('price')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if ($type == 'users')
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-role">
                            Rol
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-role" name="role">
                            @if ($elem->role == 'user')
                                <option value="user" selected>Usuario</option>
                                <option value="admin">Admin</option>
                            @else
                                <option value="user">Usuario</option>
                                <option value="admin" selected>Admin</option>
                            @endif
                        </select>
                    </div>
                @endif
                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-status">
                        Estado
                    </label>
                    <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                        id="grid-status" name="status">
                        @if ($elem->status)
                            <option value="true" selected>Activo</option>
                            <option value="false">Inactivo</option>
                        @else
                            <option value="true">Activo</option>
                            <option value="false" selected>Inactivo</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
                @if ($type == 'users')
                    {{-- <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Contraseña actual
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-password" type="password" name="old_password">
                        @error('password')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Nueva Contraseña
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-password" type="password" name="password">
                        @error('password')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Repita la Contraseña
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-password" type="password" name="password_confirmation">
                        @error('password')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>

            @if ($type == 'products')
                <div id="hotel_selected">

                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-city-hotel">
                                Ciudad
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-city-hotel" name="city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-entrance-date">
                                Fecha de entrada
                            </label>
                            <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-entrance-date" name="entrance_date" type="date">
                            </input>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-leave-date">
                                Fecha de salida
                            </label>
                            <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-leave-date" name="leave_date" type="date">
                            </input>
                            @error('leave_date')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-services">
                                Servicios
                            </label>
                            <textarea rows="5"
                                class="resize-none form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-services" type="text" name="amenities"></textarea>
                            @error('amenities')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="pack_selected">

                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-category">
                                Categoria
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-category" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div id="flight_selected">
                    <div class="-mx-3 md:flex mb-2">
                        <i class="fa-solid fa-plane-departure self-end text-4xl py-2"></i>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-origin-city">
                                Origen
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-origin-city" name="departure_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-destiny-city">
                                Fecha de salida
                            </label>
                            <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-destiny-city" name="departure_date" type="datetime-local">
                            </input>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-2">
                        <i class="fa-solid fa-plane-arrival self-end text-4xl py-2"></i>

                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-destiny-city">
                                Destino
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-destiny-city" name="arrival_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-arrival-date">
                                Fecha de llegada
                            </label>
                            <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-arrival-date" name="arrival_date" type="datetime-local">
                            </input>
                            @error('arrival_date')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div id="activity_selected">
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-activity_city">
                                Ciudad
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-activity_city" name="activity_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-activity-date">
                                Fecha de la actividad
                            </label>
                            <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-activity-date" name="activity_date" type="datetime-local">
                            </input>
                        </div>
                    </div>
                </div>
                <div id="transport_selected">
                    <div class="-mx-3 md:flex mb-2">
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-transport-type">
                                Tipo
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-transport-type" name="transport_type">
                                <option value="Taxi">Taxi</option>
                                <option value="Metro">Metro</option>
                                <option value="Bus">Bus</option>
                                <option value="Ferry">Ferry</option>
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-trasnport-date1">
                                Ciudad de salida
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-trasnport-date1" name="transport_departure_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-trasnport-date2">
                                Ciudad de llegada
                            </label>
                            <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                                id="grid-trasnport-date2" name="transport_arrival_city">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @endif

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="transition duration-300 bg-gray-900 text-gray-200 px-12 py-2 rounded-lg hover:bg-indigo-600 text-lg">Crear</button>
            </div>

        </form>
    </div>

    <script>
        $(document).ready(function() {

            $('#hotel_selected').show()
            $('#pack_selected').hide()
            $('#flight_selected').hide()
            $('#activity_selected').hide()
            $('#transport_selected').hide()

        })

        $('#grid-type-product').change(function() {
            let type = $(this).val()

            if (type == 'hotels') {
                $('#hotel_selected').fadeIn()
                $('#pack_selected').hide()
                $('#flight_selected').hide()
                $('#activity_selected').hide()
                $('#transport_selected').hide()

            } else if (type == 'packs') {
                $('#hotel_selected').hide()
                $('#pack_selected').fadeIn()
                $('#flight_selected').hide()
                $('#activity_selected').hide()
                $('#transport_selected').hide()

            } else if (type == 'flights') {
                $('#hotel_selected').hide()
                $('#pack_selected').hide()
                $('#flight_selected').fadeIn()
                $('#activity_selected').hide()
                $('#transport_selected').hide()

            } else if (type == 'activities') {
                $('#hotel_selected').hide()
                $('#pack_selected').hide()
                $('#flight_selected').hide()
                $('#activity_selected').fadeIn()
                $('#transport_selected').hide()

            } else if (type == 'transportations') {
                $('#hotel_selected').hide()
                $('#pack_selected').hide()
                $('#flight_selected').hide()
                $('#activity_selected').hide()
                $('#transport_selected').fadeIn()

            }
        });
    </script>
@endsection
