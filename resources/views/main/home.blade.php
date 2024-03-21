@extends('layout')

@section('content')
    <div class="flex bg-white h-screen">
        <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
            <div>
                <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Planifica tu nueva <span
                        class="text-indigo-600">Aventura</span></h2>
                <p class="mt-2 text-sm text-gray-500 md:text-base text-justify">Descubre las maravillas del mundo con
                    ¡ViajaYa!, tu portal
                    de confianza
                    para crear experiencias inolvidables. Elige entre nuestros emocionantes packs de viajes, selecciona los
                    mejores
                    hoteles, asegura tus vuelos y explora actividades fascinantes. ¡ViajaYa! hace que planificar tu próximo
                    viaje sea
                    sencillo y emocionante. No te pierdas la oportunidad de vivir momentos únicos. ¡Cumplamos juntos tus
                    sueños de
                    viaje!</p>
                <div class="flex justify-center lg:justify-start mt-6">
                    <a class="px-10 py-3 bg-gray-900 text-gray-200 text-xs border-2 border-white font-semibold rounded hover:bg-gray-200 hover:text-gray-900 hover:border-gray-900 transition duration-300"
                        href="/store">Comienza Ahora</a>
                </div>
            </div>

        </div>
        <div class="hidden lg:block lg:w-1/2 z-0" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
            <div class="h-full bg-cover"
                style="background-image: url(https://images.unsplash.com/photo-1551523891-ef1cebdca797?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)">
                <div class="h-full bg-black opacity-25"></div>
            </div>
        </div>
    </div>

    <style>
        #slider {
            animation: scroll 20s linear infinite
        }

        @keyframes scroll {
            0% {
                transform: :translateX(0)
            }

            100% {
                transform: translateX(calc(-25vw * 7.6))
            }
        }
    </style>

    <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center slide-track">
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider"
                    class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1577172249844-716749254893?q=80&w=1895&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    PLAYAS</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1578474846511-04ba529f0b88?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full h-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    GASTRONOMIA</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1431036101494-66a36de47def?q=80&w=1536&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end ">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    NIEVE</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://plus.unsplash.com/premium_photo-1677342597287-5e08cae7dc0b?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    EXCURSIONES</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    NATURALEZA</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://plus.unsplash.com/premium_photo-1669741908175-eb029fbc350f?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    BOSQUES</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1549144511-f099e773c147?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    CIUDADES</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1577172249844-716749254893?q=80&w=1895&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    PLAYAS</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1578474846511-04ba529f0b88?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full h-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    GASTRONOMIA</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1431036101494-66a36de47def?q=80&w=1536&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end ">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    NIEVE</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://plus.unsplash.com/premium_photo-1677342597287-5e08cae7dc0b?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    EXCURSIONES</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    NATURALEZA</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://plus.unsplash.com/premium_photo-1669741908175-eb029fbc350f?q=80&w=1888&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    BOSQUES</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-[25vw]">
                        <img src="https://images.unsplash.com/photo-1549144511-f099e773c147?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full">
                            <div class="flex h-full items-end">
                                <h3 class="text-xl text-center font-semibold leading-5 text-black bg-white/50 w-full py-6">
                                    CIUDADES</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        let defaultTransform = 0;

        function goNext() {
            defaultTransform = defaultTransform - 350;
            var slider = document.getElementById("slider");
            slider.style.transition = '2s'
            if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }

        setInterval(() => {
            goNext()
        }, 3000);

        next.addEventListener("click", goNext);

        function goPrev() {
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
            else defaultTransform = defaultTransform + 398;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        prev.addEventListener("click", goPrev);
    </script> --}}



    <div class="grid grid-cols-2 w-screen-lg my-10">
        <div class="py-20 bg-slate-100" style="clip-path:polygon(0% 0%, 0% 100%, 100% 100%, 90% 0)">
            <div class="pl-12 pr-28">
                <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl leading-snug mb-10">¡Destinos de
                    <span class="text-indigo-600">ensueño</span>!
                </h2>
                <p class="mt-2 text-sm text-gray-500 md:text-base text-justify">
                    Sumérgete en aventuras que te llevarán a lugares extraordinarios, donde cada momento se convierte en una
                    historia que contar. Explora la diversidad del mundo, desde exuberantes selvas hasta majestuosas
                    montañas, desde vibrantes ciudades hasta tranquilas playas. Con nosotros, cada viaje es una oportunidad
                    para crear recuerdos que perdurarán toda la vida.
                </p>
                <div class="flex justify-center lg:justify-start mt-6">
                    <a class="px-10 py-3 bg-gray-900 text-gray-200 text-xs border-2 border-white font-semibold rounded hover:bg-gray-200 hover:text-gray-900 hover:border-gray-900 transition duration-300"
                        href="/store">Comienza Ahora</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col px-20">
            <h2 class="font-bold text-2xl mb-12 mt-10 text-center">Hawai</h2>
            <div class="h-full mt-auto">
                <img src="https://images.unsplash.com/photo-1598135753163-6167c1a1ad65?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="h-full w-full object-contain" alt="">
            </div>
        </div>
    </div>


    <div class="grid grid-cols-2 w-screen-lg my-10">
        <div class="flex flex-col px-20">
            <h2 class=" font-bold text-2xl text-center mb-12 mt-10">Paracaidismo</h2>
            <div class="h-full mt-auto">
                <img src="https://images.unsplash.com/photo-1518765829116-c30081bc0cdd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="h-full w-full object-contain" alt="">
            </div>
        </div>

        <div class="py-20 bg-slate-500" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
            <div class="pl-28 pr-12">
                <h2 class=" text-3xl font-semibold text-white md:text-4xl leading-snug mb-10">¿Adrenalina
                    o <span class="text-indigo-200">Tranquilidad</span>?</h2>
                <p class="mt-2 text-sm text-gray-100 md:text-base text-justify">
                    Embárcate en aventuras emocionantes que te llevarán a vivir momentos únicos e inolvidables. Desde
                    emocionantes deportes extremos hasta relajantes excursiones en la naturaleza, tenemos experiencias para
                    todos los gustos y edades. Sumérgete en la diversión y la emoción mientras exploras nuevas actividades y
                    creas recuerdos que durarán toda la vida.
                </p>
                <div class="flex justify-center lg:justify-start mt-6">
                    <a class="px-10 py-3 bg-gray-900 text-gray-200 text-xs border-2 border-transparent font-semibold rounded hover:bg-gray-200 hover:text-gray-900 hover:border-gray-900 transition duration-300"
                        href="/store">Comienza Ahora</a>
                </div>
            </div>
        </div>
    </div>




    <div class="bg-stone-50">
        <div class="main max-w-screen-xl mx-auto py-24">
            <div class="popular">
                <header class="flex flex-col items-center mb-24">
                    <h2 class="font-extrabold text-5xl">DESTINOS <span class="text-indigo-600">INOLVIDABLES</span></h2>
                </header>
                <div class="list grid grid-cols-3 gap-6">

                    @foreach ($products as $product)
                        <div class="shadow-md hover:shadow-xl rounded-lg transition duration-300 relative bg-white">
                            <div
                                class="absolute z-40 py-1 pr-3 pl-3 mt-3 bg-indigo-300/75 px-1 text-lg text-black text-xs">
                                {{ $product->type }}
                            </div>
                            <div
                                class="absolute z-40 py-2 pr-3 pl-6 mt-3 right-0 bg-rose-500/80 px-1 text-lg text-white font-bold text-xl">
                                {{ $product->rating }}
                            </div>
                            <div class="bg-white min-h-80 p-2">
                                <div class="overflow-hidden h-80">
                                    <div
                                        class="block h-full relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-20 before:opacity-45">
                                        <img src="https://picsum.photos/450/450" alt=""
                                            class="absolute top-0 h-full w-full object-cover">
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center flex-col justify-center pb-5 pt-2 relative">
                                <a href="/store/{{ $product->type }}/{{ $product->id }}"
                                    class="absolute top-0 left-0 h-full w-full cursor-pointer"></a>
                                <h3 class="text-xl text-center font-bold text-slate-600 mb-1">{{ $product->name }}
                                </h3>
                                <span class="text-sky-700">{{ $product->city }}</span>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-center col-span-4 ">
                        <a class="px-10 py-3 h-14 w-60 mt-14 bg-gray-900 text-center text-gray-200 border-2 border-transparent font-semibold rounded hover:bg-gray-200 hover:text-gray-900 hover:border-gray-900 transition duration-300"
                            href="/store">Comienza Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
