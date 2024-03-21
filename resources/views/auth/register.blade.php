<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>El nómada</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="shortcut icon" href="{{ URL::to('/assets/img/logov2.png') }}" type="image/x-icon">


</head>

<body>
    <div class="flex items-center justify-center h-screen bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1613244470189-15e1da3279d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="bg-white/70 p-8 rounded-lg shadow-lg max-w-sm w-full backdrop-blur">
            <h2 class="text-2xl font-semibold text-center mb-2">Crear nueva cuenta</h2>
            <p class="text-gray-600 text-center mb-2">Introduce tu información para registrarte.</p>
            <form action="{{ url('/register/create') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="fullName" class="block text-gray-700 text-sm font-semibold mb-2">Nombre *</label>
                    <input type="text" id="fullName"
                        class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                        placeholder="Cristobal Colón" name="name">
                    @error('name')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Correo electrónico
                        *</label>
                    <input type="text" id="email"
                        class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                        placeholder="cristobal@example.com" name="email">
                    @error('email')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Contraseña *</label>
                    <input type="password" id="password"
                        class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                        placeholder="••••••••" name="password">
                    <p class="text-gray-600 text-xs mt-1">Debe contener almenos 8 caracteres.
                    </p>
                    @error('password')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Repita la
                        contraseña
                        *</label>
                    <input type="password" id="password_confirmation"
                        class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500"
                        placeholder="••••••••" name="password_confirmation">
                    @error('password_confirmation')
                        <span class="text-red-600 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="transition duration-300 w-full bg-gray-900 text-gray-200 px-4 py-2 rounded-lg hover:bg-indigo-600">Registrar</button>

                <p class="text-gray-600 text-xs text-center mt-4">
                    Registrandote, aceptas los
                    <a href="#" class="text-blue-500 hover:underline">Temrinos y Condiciones</a>.
                </p>

                <p class="text-gray-600 text-xs text-center mt-4">
                    Ya tienes una cuenta?
                    <a href="{{ url('/login') }}" class="text-blue-500 hover:underline">Sign In</a>.
                </p>
            </form>
        </div>
    </div>
</body>

</html>
