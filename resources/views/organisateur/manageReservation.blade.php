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

    <div class=" lg:w-[80%] lg:ml-auto flex  justify-center mt-8 overflow-x-auto">
        <table class=" bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-pink-500 to-purple-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Event Title</th>
                    <th class="px-6 py-3 text-left">User Name</th>
                    <th class="px-6 py-3 text-left">User Email</th>
                    <th class="px-6 py-3 text-left">User Phone</th>
                    <th class="px-6 py-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->event->titre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reservation->user->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('reservation.accept', $reservation->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">Accept</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
