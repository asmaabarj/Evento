<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-[100%]">
    @include('layouts.sideBarOrganizer')
    <div class="w-[80%] ml-auto md:flex md:justify-between mt-12">
        <!-- Automatic Events Table -->
        <table class="md:w-[33%] md:ml-4 bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-pink-500 to-purple-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Event</th>
                    <th class="px-6 py-3 text-left">Reservations</th>
                    <th class="px-6 py-3 text-left">Earnings</th>
                </tr>
            </thead>
            <tbody>
                @foreach($automaticEvents as $event)
                <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->titre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->reservationCount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->totalEarnings }} MAD</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Manual Events Table -->
        <table class="md:w-[62%] md:mr-4 bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-pink-500 to-purple-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Event</th>
                    <th class="px-6 py-3 text-left">Reservations</th>
                    <th class="px-6 py-3 text-left">Accepted</th>
                    <th class="px-6 py-3 text-left">Not Accepted</th>
                    <th class="px-6 py-3 text-left">Earnings</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manualEvents as $event)
                <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->titre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->acceptedReservationsCount + $event->notAcceptedReservationsCount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->acceptedReservationsCount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->notAcceptedReservationsCount }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->totalEarnings }} MAD</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
