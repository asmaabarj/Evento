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

<body class="w-[100%] bg-gray-50">
    @include('layouts.navBar')
    @include('layouts.sideBarAdmin')

    <div class="lg:w-[80%] md:ml-auto bg-gray-0 p-8 font-sans">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white flex gap-5 items-center rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg p-3 w-14 h-14">
                        <svg class="h-8 w-8" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="text-3xl font-bold text-gray-800">{{ $categoriesCount }}</p>
                        <p class="text-gray-600 text-lg mt-1">Categories</p>
                    </div>
                </div>
                <div class="bg-white flex gap-5 items-center rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg p-3 w-14 h-14">
                        <svg class="h-8 w-8 text-white" fill="white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512">
                            <path
                                d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3l-2.9 1.7c-9.2 5.3-20.4 4-29.6-1.3s-16.1-14.5-16.1-25.1v-3.4c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v3.4c0 10.6-6.9 19.8-16.1 25.1s-20.4 6.6-29.6 1.3l-2.9-1.7c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l2.9 1.7c9.2 5.3 13.7 15.8 13.7 26.4s-4.5 21.1-13.7 26.4l-3 1.7c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3l2.9-1.7c9.2-5.3 20.4-4 29.6 1.3s16.1 14.5 16.1 25.1v3.4c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-3.4c0-10.6 6.9-19.8 16.1-25.1s20.4-6.6 29.6-1.3l2.9 1.7c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-3-1.7c-9.2-5.3-13.7-15.8-13.7-26.4s4.5-21.1 13.7-26.4l3-1.7zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="text-3xl font-bold text-gray-800">{{ $organizersCount }}</p>
                        <p class="text-gray-600 text-lg mt-1">Organizers</p>
                    </div>
                </div>
                <div class="bg-white flex gap-5 items-center rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg p-3 w-14 h-14">
                        <svg class="h-8 w-8 text-white" fill="white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 640 512">
                            <path
                                d="M211.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM32 256c0 17.7 14.3 32 32 32h85.6c10.1-39.4 38.6-71.5 75.8-86.6c-9.7-6-21.2-9.4-33.4-9.4H96c-35.3 0-64 28.7-64 64zm461.6 32H576c17.7 0 32-14.3 32-32c0-35.3-28.7-64-64-64H448c-11.7 0-22.7 3.1-32.1 8.6c38.1 14.8 67.4 47.3 77.7 87.4zM391.2 226.4c-6.9-1.6-14.2-2.4-21.6-2.4h-96c-8.5 0-16.7 1.1-24.5 3.1c-30.8 8.1-55.6 31.1-66.1 60.9c-3.5 10-5.5 20.8-5.5 32c0 17.7 14.3 32 32 32h224c17.7 0 32-14.3 32-32c0-11.2-1.9-22-5.5-32c-10.8-30.7-36.8-54.2-68.9-61.6zM563.2 96a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zM321.6 192a80 80 0 1 0 0-160 80 80 0 1 0 0 160zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="text-3xl font-bold text-gray-800">{{ $clientsCount }}</p>
                        <p class="text-gray-600 text-lg mt-1">Clients</p>
                    </div>
                </div>
                <div class="bg-white flex gap-5 items-center rounded-lg shadow-md p-6">
                    <div
                        class="flex items-center justify-center bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg p-3 w-14 h-14">
                        <svg class="h-8 w-8 text-white" fill="white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path
                                d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zM312 376c13.3 0 24-10.7 24-24s-10.7-24-24-24H136c-13.3 0-24 10.7-24 24s10.7 24 24 24H312z" />
                        </svg>
                    </div>
                    <div class="">
                        <p class="text-3xl font-bold text-gray-800">{{$eventCount}}</p>
                        <p class="text-gray-600 text-lg mt-1">Events</p>
                    </div>
                </div>
            </div>
        </div>
        <section class="md:flex  md:justify-between">
            <div class="overflow-x-auto py-8 md:w-[70%]">
                <table class="min-w-full bg-white font-[sans-serif]">
                    <thead class="whitespace-nowrap bg-purple-100 rounded">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Events
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Organizer
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Category
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Date
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Location
                            </th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach($events as $event)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 text-sm">
                                <div class="flex items-center cursor-pointer">
                                    <img src='{{ asset('storage/' . $event->photo) }}'
                                        class="w-9 h-9 rounded-md shrink-0" />
                                    <div class="ml-4">
                                        <p class="text-sm text-black">{{$event->titre}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3 text-sm">
                                {{$event->user->name}}
                            </td>
                            <td class="px-6 py-3 text-sm">
                                {{$event->categorie->titre}}
                            </td>
                            <td class="px-6 py-3 text-sm">
                                {{ date('Y-m-d', strtotime($event->date)) }} / {{ date('H:i', strtotime($event->date)) }}
                            </td>
                            <td class="px-6 py-3 text-sm">
                                {{$event->lieu}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="overflow-x-auto py-8 md:w-[25%]">
                <table class="min-w-full bg-white font-[sans-serif]">
                    <thead class="whitespace-nowrap bg-purple-100 rounded">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Category
                            </th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                Events
                            </th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach($categories as $category)
                        <tr class="hover:bg-gray-50">
                            
                            <td class="px-6 py-3 text-sm">
                                {{ $category->titre }}
                            </td>
                            <td class="px-6 py-3 text-sm">
                                {{ $eventCounts[$category->id] }}
                            </td>
                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </section>
    </div>
    <script>
        function toggleModal(modalId) {
              const modal = document.getElementById(modalId);
              modal.classList.toggle('hidden');
          }
  </script>
</body>