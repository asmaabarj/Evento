<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50">
    <div class="lg:flex ">
        <div class="lg:w-1/5 ">
            @include('layouts.sideBarOrganizer')
            @include('layouts.navBar')

        </div>
        <div class="lg:w-4/5 p-4 md:px-8 md:py-12">
            <div class="lg:flex grid grid-cols-1 lg:justify-between mb-8">
                <div class="w-full lg:w-2/5 md:mr-4 ">
                    <h2 class="text-lg text-gray-600 font-bold mb-4 ">Automatic Events Table</h2>
                    <table
                        class="w-full bg-white shadow-md rounded-lg overflow-hidden max-w-full overflow-x-auto mb-10">
                        <thead class="bg-gradient-to-r from-pink-500 to-purple-500 text-white">
                            <tr>
                                <th class="px-5 py-3 text-left">Event</th>
                                <th class="px-5 py-3 text-left">Reservations</th>
                                <th class="px-5 py-3 text-left">Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($automaticEvents as $event)
                                <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                                    <td class="px-5 py-4 ">{{ $event->titre }}</td>
                                    <td class="px-5 py-4 ">{{ $event->reservationCount }}</td>
                                    <td class="px-5 py-4 whitespace-nowrap">{{ $event->totalEarnings }} MAD</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-full lg:w-3/5  md:ml-4">
                    <h2 class="text-lg font-bold mb-4  text-gray-600">Manual Events Table</h2>
                    <table class="w-full bg-white shadow-md rounded-lg overflow-hidden max-w-full overflow-x-auto">
                        <thead class="bg-gradient-to-r from-pink-500 to-purple-500 text-white">
                            <tr>
                                <th class="px-5 py-3 text-left">Event</th>
                                <th class="px-5 py-3 text-left">Reservations</th>
                                <th class="px-5 py-3 text-left">Accepted</th>
                                <th class="px-5 py-3 text-left whitespace-nowrap">Not Accepted</th>
                                <th class="px-5 py-3 text-left">Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manualEvents as $event)
                                <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                                    <td class="px-5 py-4 ">{{ $event->titre }}</td>
                                    <td class="px-5 py-4 ">
                                        {{ $event->acceptedReservationsCount + $event->notAcceptedReservationsCount }}
                                    </td>
                                    <td class="px-5 py-4 ">{{ $event->acceptedReservationsCount }}</td>
                                    <td class="px-5 py-4 ">{{ $event->notAcceptedReservationsCount }}</td>
                                    <td class="px-5 py-4 whitespace-nowrap">{{ $event->totalEarnings }} MAD</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
