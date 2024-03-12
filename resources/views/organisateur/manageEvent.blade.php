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

<body class="w-[100%] ">
    @include('layouts.sideBarOrganizer')
    @include('layouts.navBar')
    @if (session('success'))
        <div id="success-message"
            class="bg-purple-500  fixed right-20  top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 10000);
        </script>
    @endif
    <div
        class=" lg:w-[80%] md:ml-auto mt-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-10 mb-4  md:px-12 px-4 pb-14">
        @foreach ($events as $event)
            <div class="relative mx-auto w-full">
                <a href="#"
                    class="relative inline-block duration-300 ease-in-out transition-transform transform hover:-translate-y-2 w-full">
                    <div class="shadow p-4 rounded-t-lg bg-white">
                        <div class="flex  justify-center relative  overflow-hidden h-52">
                            <img src='{{ asset('storage/' . $event->photo) }}' alt="">
                            <div class="transition-transform duration-500 transform ease-in-out hover:scale-110 w-full">
                                <div class="absolute inset-0 bg-black opacity-10"></div>
                            </div>

                            @if ((int) $event->status === 0)
                                <span
                                    class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-orange-600 text-sm font-medium text-white select-none">
                                    Waiting
                                </span>
                            @elseif((int) $event->status === 1)
                                <span
                                    class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-green-600 text-sm font-medium text-white select-none">
                                    Accepted
                                </span>
                            @else
                                <span
                                    class="absolute top-0 left-0 inline-flex mt-3 ml-3 px-3 py-2 rounded-lg z-10 bg-red-600 text-sm font-medium text-white select-none">
                                    Declined
                                </span>
                            @endif
                        </div>

                        <div class="mt-4">
                            <h2 class="font-medium text-base md:text-lg text-gray-800 line-clamp-1" title="New York">
                                {{ $event->titre }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-800 line-clamp-1"
                                title="New York, NY 10004, United States">
                                <i class='bx bx-map'></i>

                                <span class="mt-2 xl:mt-0 ml-2">
                                    {{ $event->lieu }}
                                </span>
                            </p>
                        </div>

                        <div class="grid grid-cols-2 grid-rows-2 gap-4 mt-8">
                            <p class="inline-flex flex-col  xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-time-five'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    {{ str_replace('T', ' ', $event->date) }}
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-category-alt'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    {{ $event->categorie->titre }}
                                </span>
                            </p>
                            <p class="inline-flex flex-col xl:flex-row xl:items-center text-gray-800">
                                <i class='bx bx-purchase-tag-alt bx-rotate-90'></i>
                                <span class="mt-2 xl:mt-0 ml-2">
                                    {{ $event->price }} MAD
                                </span>
                            </p>
                            <p
                                class="inline-block font-semibold text-primary whitespace-nowrap leading-tight rounded-xl">

                                {{ $event->acceptation }}
                            </p>
                        </div>


                    </div>
                    <div class="flex text-white w-full">
                        @if ((int) $event->status === 0)
                            <form action="{{ route('editEvent') }}" method="GET" class="w-full">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="bg-green-800 w-full  text-center rounded-bl-lg">
                                    Update</button>
                            </form>
                        @endif
                        @if ((int) $event->status === 0 || (int) $event->status === 2)
                            <form action="{{ route('deletEvent', ['id' => $event->id]) }}" method="POST"
                                class="w-full ">
                                @csrf
                                <button type="submit" class="bg-red-800 w-full  text-center  rounded-br-lg ">
                                    Delete</button>
                            </form>
                        @endif
                    </div>
                </a>

            </div>
        @endforeach
    </div>

</body>

</html>
