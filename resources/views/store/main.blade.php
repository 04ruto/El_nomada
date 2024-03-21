@extends('store.store')

@section('storeContent')
    <div class="flex-1 w-full md:w-1/2s">

        <div class="grid grid-cols-3 gap-4 p-4 overflow-x-auto overflox-y-hidden max-h-[120vh]">
            @foreach ($prods as $prod)
                <a href="/store/{{ $prod->type }}/{{ $prod->id }}"
                    class="flex flex-row rounded-xl shadow-lg p-3  border border-white bg-white h-[220px] transition duration-300 delay-100 hover:scale-105">
                    <div class="h-full w-1/3 self-center">
                        <img @if ($prod->type == 'hotels') src="https://images.unsplash.com/photo-1589923158776-cb4485d99fd6?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" @endif
                            @if ($prod->type == 'packs') src="https://images.unsplash.com/photo-1477064996809-dae46985eee7?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" @endif
                            @if ($prod->type == 'flights') src="https://images.unsplash.com/photo-1568323993144-20d546ba585d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" @endif
                            @if ($prod->type == 'activities') src="https://images.unsplash.com/photo-1567607365703-a8469a1020c4?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" @endif
                            @if ($prod->type == 'transportations') src="https://images.unsplash.com/photo-1622790953594-9e6688c4c8e8?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" @endif
                            alt="tailwind logo" class="rounded-xl h-[100%]" />
                    </div>
                    <div class="w-2/3 h-full bg-white flex flex-col space-y-2 p-3">
                        <div class="flex justify-between item-center">
                            <p class="text-gray-500 font-medium hidden md:block">{{ $prod->type }}</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <p class="text-gray-600 font-bold text-sm ml-1">
                                    {{ $prod->rating }}
                                    <span class="text-gray-500 font-normal">({{ $prod->review_count }} reviews)</span>
                                </p>
                            </div>
                        </div>
                        <h3 class="font-black text-gray-800 text-xl">{{ $prod->name }}</h3>
                        <p class=" text-gray-500 text-sm">{{ $prod->description }}</p>

                        <p class="flex text-md font-semibold text-gray-800 items-end h-full justify-end">
                            {{ $prod->price }} <span class="text-gray-600">€</span>
                            <span class="font-normal text-gray-600 text-md ml-1">
                                @if ($prod->type == 'hotels')
                                    /noche
                                    <i class="fa-solid fa-person ml-1"></i>
                                @elseif($prod->type == 'packs')
                                    /grupo
                                    <i class="fa-solid fa-people-group ml-1"></i>
                                @else
                                    /persona
                                    <i class="fa-solid fa-person ml-1"></i>
                                @endif
                            </span>
                        </p>

                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
