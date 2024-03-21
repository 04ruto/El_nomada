@extends('dashboard.dashboard')

@section('dashContent')
    <div class="bg-white mx-4 p-4 rounded-md flex flex-col w-full">
        <h2 class="text-gray-500 text-2xl font-semibold pb-1">Creador</h2>
        <div class="my1-"></div> <!-- Espacio de separación -->
        <div class="bg-gradient-to-r from-indigo-300 to-indigo-200 h-px  mb-6"></div>

        <form action="/dashboard/create" method="POST">
            @csrf

            <input type="text" hidden value="{{ $type }}" name="table">


            <div class="-mx-3 md:flex mb-6">
                @if ($type != 'booking' and $type != 'invoice')
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-name">
                            Nombre
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-name" type="text" name="name">
                        @error('name')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if ($type == 'booking')
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-user-booking">
                            Usuario
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-user-booking" name="user">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-product-booking">
                            Producto
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-product-booking" name="product">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->type }})</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if ($type == 'user')
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-email">
                            Email
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-email" type="text" name="email" placeholder="cristobal@example.com"
                            autocomplete="off">
                        @error('email')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if ($type == 'product')
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
                @if ($type == 'invoice')
                    <div class="md:w-1/2 w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-booking-invoice">
                            Reserva
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-booking-invoice" name="booking">
                            @foreach ($bookings as $booking)
                                <option value="{{ $booking->id }}-{{ $booking->user_id }}">{{ $booking->user->name }}
                                    ({{ $booking->product->name }})
                                    - {{ $booking->total_price }} €</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            </div>

            @if ($type == 'product')
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
                @if ($type == 'product')
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
                @if ($type == 'user')
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-password">
                            Contraseña
                        </label>
                        <input class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-password" type="password" placeholder="·····" name="password" min="0"
                            autocomplete="off">
                        @error('password')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-role">
                            Rol
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-role" name="role">
                            <option value="user" selected>Usuario</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                @endif
                @if ($type != 'booking' and $type != 'invoice')
                    <div class="md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-status">
                            Estado
                        </label>
                        <select class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                            id="grid-status" name="status">
                            <option value="true" selected>Activo</option>
                            <option value="false">Inactivo</option>
                        </select>
                    </div>
                @endif
            </div>

            @if ($type == 'product')
                <div id="hotel_selected" class="selected-item">

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
                <div id="pack_selected" class="selected-item">

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
                <div id="flight_selected" class="selected-item">
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
                <div id="activity_selected" class="selected-item">
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
                <div id="transport_selected" class="selected-item">
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
            let type = $(this).val();

            $('.selected-item').hide(); // Oculta todos los elementos con la clase 'selected-item'

            // Muestra el elemento correspondiente según el tipo seleccionado
            switch (type) {
                case 'hotels':
                    $('#hotel_selected').fadeIn();
                    break;
                case 'packs':
                    $('#pack_selected').fadeIn();
                    break;
                case 'flights':
                    $('#flight_selected').fadeIn();
                    break;
                case 'activities':
                    $('#activity_selected').fadeIn();
                    break;
                case 'transportations':
                    $('#transport_selected').fadeIn();
                    break;
                default:
                    break;
            }
        });
    </script>
@endsection
