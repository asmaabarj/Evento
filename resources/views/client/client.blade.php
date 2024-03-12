<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    @include('layouts.navbarClient')


    @if (session('success'))
        <div id="success-message"
            class="fixed inset-0 px-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="w-full max-w-md bg-white shadow-lg rounded-md px-5 py-10 relative mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-24 h-24 fill-green-500 absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2"
                    viewBox="0 0 60 60">
                    <defs>
                        <linearGradient id="grad" x1="0%" y1="20%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:rgb(233, 67, 130);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:rgb(159, 64, 255);stop-opacity:1" />
                        </linearGradient>
                    </defs>
                    <circle cx="30" cy="30" r="29" fill="url(#grad)" />
                    <path fill="#fff"
                        d="m24.262 42.07-6.8-6.642a1.534 1.534 0 0 1 0-2.2l2.255-2.2a1.621 1.621 0 0 1 2.256 0l4.048 3.957 11.353-17.26a1.617 1.617 0 0 1 2.2-.468l2.684 1.686a1.537 1.537 0 0 1 .479 2.154L29.294 41.541a3.3 3.3 0 0 1-5.032.529z"
                        data-original="#ffffff" />
                </svg>
                <div class="mt-8">
                    <h3 class="text-2xl font-semibold flex-1">{{ session('success') }} !</h3>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 3000);
        </script>
    @endif

    <div
        class="bg-white flex px-4 py-3 mt-32 border-b-[2px] border-[#d869d291]  focus-within:border-pink-500 overflow-hidden lg:max-w-xl mx-auto font-[sans-serif]">
        <form action="{{ route('client') }}" method="GET" class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="18px"
                class="fill-gray-600 mr-3">
                <path
                    d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                </path>
            </svg>
            <input type='text' name="search" placeholder='Search Something...'
                class="w-full outline-none text-sm" />
    </div>
    </form>

    <div class=" px-4 py-20 font-[sans-serif]">
        <div class="max-w-6xl max-md:max-w-lg mx-auto">
            <h2 class="text-3xl font-extrabold text-[#333]">LATEST EVENTS</h2>

            <div
                class="bg-white flex px-2 py-2 rounded-full border  border-purple-500 overflow-hidden md:max-w-[50%] lg:max-w-[24vw] mt-10  font-[sans-serif]">
                <form action="{{ route('client') }}" method="GET" class="grid grid-cols-2">
                    <select name="category" class="w-full outline-none bg-white pl-4 text-sm text-black">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->titre }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="bg-gradient-to-r from-pink-500 to-purple-500  transition-all text-white text-sm rounded-full  py-2.5">Filter</button>
                </form>
            </div>

            <div class="grid grid-cols-1  lg:grid-cols-2 gap-8 mt-12">
                @foreach ($events as $event)
                    <div>
                        <div class="bg-white cursor-pointer rounded overflow-hidden group"
                            onclick="toggleModal('eventDetails{{ $event->id }}')">
                            <div class="relative overflow-hidden">
                                <img src='{{ asset('storage/' . $event->photo) }}' alt="Blog Post 1"
                                    class="w-full h-[44vh] object-cover group-hover:scale-125 transition-all duration-300" />
                                <div
                                    class="px-4 py-2.5 text-white text-sm tracking-wider bg-gradient-to-r from-pink-500 to-purple-500 absolute bottom-0 right-0">
                                    {{ date('Y-m-d', strtotime($event->date)) }} AT
                                    {{ date('H:i', strtotime($event->date)) }}</div>
                            </div>
                        </div>

                        <div class="p-6">
                            <h4 class="text-sm font-medium text-gray-500">{{ $event->user->name }}</h4>
                            <h3 class="text-xl font-bold text-[#333]">{{ $event->titre }}</h3>
                            <h6 class="text-lg font-bold text-gray-900"> <i class='bx bx-map'></i>
                                {{ $event->lieu }}</h6>
                            <div class="flex  mt-4 justify-between">
                                <p class="inline-flex  xl:flex-row xl:items-center text-gray-800">
                                    <i class='bx bx-purchase-tag-alt bx-rotate-90'></i>
                                    <span class="mt-2 xl:mt-0 ml-2">
                                        {{ $event->price }} MAD
                                    </span>
                                </p>
                                <div class="flex justify-end text-gray-700  items-center ">
                                    <i class='bx bx-chair '></i>
                                    <h1 class="text-sm">available places : {{ $event->nbPlacesRester }}</h1>
                                </div>
                            </div>
                            <form action="/reserveEvent/{{ $event->id }}/{{ $event->user->id }}" method="POST">
                                @csrf

                                <button type="submit"
                                    class="px-4 py-2 mt-6 rounded text-white text-sm tracking-wider border-none outline-none bg-pink-500 hover:bg-purple-600">Reserve</button>
                            </form>
                        </div>
                    </div>
                    <div id="eventDetails{{ $event->id }}"
                        class="fixed hidden top-0 bottom-0 left-0 right-0 bg-black/60 z-50"
                        onclick="toggleModal('eventDetails{{ $event->id }}')">
                        <div class="">

                            <div
                                class="font-[sans-serif] lg:w-[60vw] w-[90%] fixed top-[20%] left-0 right-0  p-8 rounded-md mx-auto shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] bg-white  my-12">
                                <img src="{{ asset('storage/' . $event->photo) }}"
                                    class="w-80 h-48 rounded-[5px] absolute right-0 left-0 mx-auto -top-24" />
                                <div class="mt-20 text-center">
                                    <p class="text-sm text-right text-[#333] leading-relaxed"> <span
                                            class="text-[#111] font-bold">Category :
                                        </span>{{ $event->categorie->titre }}</p>
                                    <p class="text-sm mt-6  text-[#333] leading-relaxed">{{ $event->description }}.</p>
                                    <h6 class="text-sm font-bold text-gray-900"> <i class='bx bx-map'></i>
                                        {{ $event->lieu }}</h6>
                                    <h6 class="text-xs font-bold text-gray-900"> Date :
                                        {{ date('Y-m-d', strtotime($event->date)) }}</h6>
                                    <h6 class="text-xs font-bold text-gray-900"> Time :
                                        {{ date('H:i', strtotime($event->date)) }}</h6>
                                    <h4 class="text-base font-extrabold mt-8"> {{ $event->titre }} </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex justify-center  my-10"> {{ $events->links() }}</div>

</body>

</html>
