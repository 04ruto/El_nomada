@extends('layout')

@section('content')
    <div class="md:flex flex-col items-start justify-center bg-gray-100 p-4 px-10">
        <div class="w-full mx-auto px-2 mb-4">
            <div class="flex items-center space-x-2 text-gray-400 text-sm">
                <a href="/store"
                    class="hover:underline hover:text-gray-600 hover:scale-110 transition duration-300">Store</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <a href="/store/activity"
                    class="hover:underline hover:text-gray-600 hover:scale-110 transition duration-300">Actividades</a>
                <span>
                    <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
                <span>{{ $prod->name }}</span>
            </div>
        </div>
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4 bg-white  shadow-lg rounded-xl">

            <div class="w-2/4 md:block hidden">
                <img class="w-full" alt="Hotel"
                    src="https://images.unsplash.com/photo-1567607365703-a8469a1020c4?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
            </div>
            <div class=" w-full ml-6">
                @if (session('Success'))
                    <div class="container mb-2 w-full" id="alertbox">
                        <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative"
                            role="alert">
                            <p>{{ session('Success') }}</p>

                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closealertbutton">
                                <svg class="fill-current h-6 w-6 text-white" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none ">{{ $prod->type }}</p>
                    <h1 class=" text-3xl font-semibold lg:leading-6 leading-7 mt-6">
                        {{ $prod->name }}</h1>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4">Descripción</p>
                    <div class="flex items-center justify-center">
                        <p class="text-sm leading-none max-w-[400px] leading-relaxed">
                            {{ $prod->description }}
                        </p>
                    </div>
                </div>
                <div class="py-4 border-b border-gray-200 flex items-center justify-between">
                    <p class="text-base leading-4">Fecha</p>
                    <div class="flex items-center justify-center">
                        {{-- <p class="text-sm leading-none">{{ $prod->city_id }}</p> --}}
                        <p class="text-sm leading-none">
                            <span class="font-semibold">{{ $prod->act_date }}</span> - {{ $extra->name }},
                            {{ $extra->country->name }}
                        </p>
                    </div>
                </div>

                @auth

                    <a href="/store/buy/{{ Auth::user()->id }}/{{ $prod->product_id }}"
                        class="mt-5 flex mx-auto items-center justify-center font-bold bg-gradient-to-r from-indigo-400 to-indigo-200 rounded-lg w-[90%] py-4 transition duration-300 hover:scale-110">
                        <svg class="mr-3 text-white dark:text-gray-900" width="18" height="19"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                        Comprar ({{ $prod->price }} €)
                    </a>
                @endauth
                @guest
                    <a href="/store/buy/null/{{ $prod->product_id }}"
                        class="mt-5 flex mx-auto items-center justify-center font-bold bg-gradient-to-r from-indigo-400 to-indigo-200 rounded-lg w-[90%] py-4 transition duration-300 hover:scale-110">
                        <svg class="mr-3 text-white dark:text-gray-900" width="18" height="19"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path
                                d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                        Comprar ({{ $prod->price }} €)
                    </a>
                @endguest

            </div>
        </div>
        <div class='flex items-center justify-center w-full mt-10 flex-col gap-4'>
            @auth
                <div class="rounded-xl border p-5 shadow-md w-full bg-white">
                    <form action="{{ url('/comment') }}" method="POST">
                        @csrf

                        <input type="text" name="user" hidden value="{{ Auth::user()->id }}">
                        <input type="text" name="product" hidden value="{{ $prod->id }}">

                        <div class="flex w-full items-center justify-between border-b pb-3">
                            <div class="flex items-center space-x-3">
                                <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/33')]">
                                </div>
                                <div class="text-lg font-bold text-slate-700">{{ Auth::user()->name }}</div>
                            </div>
                        </div>

                        <div class="mt-4 mb-2">
                            <textarea name="comment" class="border w-full resize-none h-20 p-1 outline-none" placeholder="Danos tu opinión"></textarea>
                            @error('comment')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <div class="flex items-center justify-between text-slate-500 ">
                                <div class="flex items-center transition duration-300">
                                    <div>
                                        <p>Puntuación:</p>
                                        <div class="custom-number-input h-10 w-32">
                                            <div class="flex h-10 w-full rounded-lg relative bg-transparent mt-1">
                                                <div data-action="decrement"
                                                    class="flex justify-center bg-gray-200 text-gray-600 hover:text-gray-700 transition duration-300 hover:bg-gray-300 h-full w-20 rounded-l cursor-pointer outline-none">
                                                    <i class="fa-solid fa-minus self-center"></i>
                                                </div>
                                                <input type="number"
                                                    class="outline-none focus:outline-none text-center w-full font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                    name="rating" value="0" min="0" max="10"></input>

                                                <div data-action="increment"
                                                    class="flex justify-center bg-gray-200 text-gray-600 hover:text-gray-700 transition duration-300 hover:bg-gray-300 h-full w-20 rounded-r cursor-pointer">
                                                    <i class="fa-solid fa-plus self-center"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <style>
                                            input[type='number']::-webkit-inner-spin-button,
                                            input[type='number']::-webkit-outer-spin-button {
                                                -webkit-appearance: none;
                                                margin: 0;
                                            }

                                            .custom-number-input input:focus {
                                                outline: none !important;
                                            }

                                            .custom-number-input button:focus {
                                                outline: none !important;
                                            }
                                        </style>

                                        <script>
                                            function decrement(e) {
                                                const btn = e.target.parentNode.parentElement.querySelector(
                                                    'div[data-action="decrement"]'
                                                );
                                                const target = btn.nextElementSibling;
                                                let value = Number(target.value);
                                                (value > 0) ?
                                                value-- : value
                                                target.value = value;
                                            }

                                            function increment(e) {
                                                const btn = e.target.parentNode.parentElement.querySelector(
                                                    'div[data-action="decrement"]'
                                                );
                                                const target = btn.nextElementSibling;
                                                let value = Number(target.value);
                                                (value < 10) ? value++ : value

                                                target.value = value;
                                            }

                                            const decrementButtons = document.querySelectorAll(
                                                `div[data-action="decrement"]`
                                            );

                                            const incrementButtons = document.querySelectorAll(
                                                `div[data-action="increment"]`
                                            );

                                            decrementButtons.forEach(btn => {
                                                btn.addEventListener("click", decrement);
                                            });

                                            incrementButtons.forEach(btn => {
                                                btn.addEventListener("click", increment);
                                            });
                                        </script>
                                    </div>

                                </div>

                                <button type="submit"
                                    class=" px-2 py-2 bg-gradient-to-r from-indigo-400 to-indigo-200 text-black text-md font-semibold rounded-lg hover:scale-110 transition duration-300"
                                    href="/store">Comentar <i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            @endauth

            @foreach ($reviews as $review)
                @if ((Auth::guest() or Auth::user()->role == 'user') and $review->status)
                    <div class="rounded-xl border p-5 shadow-md w-full bg-white">
                        <div class="flex w-full items-center justify-between border-b pb-3">
                            <div class="flex items-center space-x-3">
                                <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/33')]">
                                </div>
                                <div class="text-lg font-bold text-slate-700">{{ $review->user->name }}</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-sm text-neutral-500">{{ $review->rating }} / 10
                                    <i class="fa-regular fa-star mr-1.5 text-normal"></i>
                                </div>
                                @if (Auth::user() and Auth::user()->role == 'admin')
                                    @if ($review->status)
                                        <a href="/comment/{{ $review->id }}/hide"
                                            class="text-gray-400 hover:text-yellow-500 hover:scale-110 transition duration-300">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </a>
                                    @else
                                        <a href="/comment/{{ $review->id }}/show"
                                            class="text-gray-400 hover:text-yellow-500 hover:scale-110 transition duration-300">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endif
                                    <a href="/comment/{{ $review->id }}"
                                        class="text-gray-400 hover:text-red-500 hover:scale-110 transition duration-300">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 mb-6">
                            <div class="text-md text-neutral-600">{{ $review->comment }}</div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between text-slate-500">
                                <div class="flex space-x-4 md:space-x-8">
                                    <div
                                        class="flex cursor-pointer items-center transition duration-300 hover:text-yellow-500">
                                        @php
                                            $rating = $review->rating; // Valoración sobre 10
                                            $stars = ($rating * 5) / 10; // Valoració sobre 5
                                            $fullStars = floor($stars); // Estrelles complertes
                                            $halfStar = $stars - $fullStars; // ¿Hay media estrella?
                                        @endphp

                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $fullStars)
                                                {{-- Estrella completa --}}
                                                <i class="fa-solid fa-star mr-1.5 text-lg"></i>
                                            @elseif ($halfStar > 0)
                                                {{-- Mitja estrella --}}
                                                <i class="fa-regular fa-star-half-stroke mr-1.5 text-lg"></i>
                                                @php $halfStar = 0; @endphp <!-- S'utilitza una sola vegada -->
                                            @else
                                                {{-- Estrella buida --}}
                                                <i class="fa-regular fa-star mr-1.5 text-lg"></i>
                                            @endif
                                        @endfor

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (!Auth::guest() and Auth::user()->role == 'admin')
                    <div class="rounded-xl border p-5 shadow-md w-full bg-white">
                        <div class="flex w-full items-center justify-between border-b pb-3">
                            <div class="flex items-center space-x-3">
                                <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/33')]">
                                </div>
                                <div class="text-lg font-bold text-slate-700">{{ $review->user->name }}</div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="text-sm text-neutral-500">{{ $review->rating }} / 10
                                    <i class="fa-regular fa-star mr-1.5 text-normal"></i>
                                </div>
                                @if ($review->status)
                                    <a href="/comment/{{ $review->id }}/hide"
                                        class="text-gray-400 hover:text-yellow-500 hover:scale-110 transition duration-300">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </a>
                                @else
                                    <a href="/comment/{{ $review->id }}/show"
                                        class="text-gray-400 hover:text-yellow-500 hover:scale-110 transition duration-300">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                @endif
                                <a href="/comment/{{ $review->id }}"
                                    class="text-gray-400 hover:text-red-500 hover:scale-110 transition duration-300">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                            </div>
                        </div>

                        <div class="mt-4 mb-6">
                            <div class="text-md text-neutral-600">{{ $review->comment }}</div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between text-slate-500">
                                <div class="flex space-x-4 md:space-x-8">
                                    <div
                                        class="flex cursor-pointer items-center transition duration-300 hover:text-yellow-500">
                                        @php
                                            $rating = $review->rating; // Valoración sobre 10
                                            $stars = ($rating * 5) / 10; // Valoració sobre 5
                                            $fullStars = floor($stars); // Estrelles complertes
                                            $halfStar = $stars - $fullStars; // ¿Hay media estrella?
                                        @endphp

                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $fullStars)
                                                {{-- Estrella completa --}}
                                                <i class="fa-solid fa-star mr-1.5 text-lg"></i>
                                            @elseif ($halfStar > 0)
                                                {{-- Mitja estrella --}}
                                                <i class="fa-regular fa-star-half-stroke mr-1.5 text-lg"></i>
                                                @php $halfStar = 0; @endphp <!-- S'utilitza una sola vegada -->
                                            @else
                                                {{-- Estrella buida --}}
                                                <i class="fa-regular fa-star mr-1.5 text-lg"></i>
                                            @endif
                                        @endfor

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
    <script>
        let elements = document.querySelectorAll("[data-menu]");
        for (let i = 0; i < elements.length; i++) {
            let main = elements[i];
            main.addEventListener("click", function() {
                let element = main.parentElement.parentElement;
                let andicators = main.querySelectorAll("svg");
                let child = element.querySelector("#sect");
                child.classList.toggle("hidden");
                andicators[0].classList.toggle("rotate-180");
            });
        }
    </script>
@endsection
