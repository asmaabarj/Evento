    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Manage Events</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="w-[100%]">
        @if (session('success'))
        <div id="success-message"
            class="bg-purple-500  fixed right-20  top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 5000);
        </script>
    @endif
        @include('layouts.sideBarAdmin')

        <div class="overflow-x-auto py-8 w-[80%] flex justify-center mt-8 ml-auto">
            <table class="bg-white font-[sans-serif]">
                <thead class="whitespace-nowrap bg-gradient-to-r from-pink-500 to-purple-500 rounded">
                    <tr>
                        <th class="px-8 py-4 text-left text-sm font-semibold text-black">Event</th>
                        <th class="px-8 py-4 text-left text-sm font-semibold text-black">Date</th>
                        <th class="px-8 py-4 text-left text-sm font-semibold text-black">Location</th>
                        <th class="px-8 py-4 text-left text-sm font-semibold text-black">Places</th>
                        <th class="px-8 py-4 text-left text-sm font-semibold text-black">Ticket Price</th>
                        <th class="px-8 py-4 text-left text-sm font-semibold text-black">Category</th>
                        <th class="px-8 py-4 text-left flex justify-center text-sm font-semibold text-black">Action</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    @foreach($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 text-sm">
                            <div class="flex items-center cursor-pointer">
                                <img src='{{ asset('storage/' . $event->photo) }}' class="w-16 h-16 rounded-md shrink-0" />
                                <div class="ml-4">
                                    <p class="text-sm text-black">{{ $event->titre }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $event->user->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-3 text-sm">{{ $event->date }}</td>
                        <td class="px-8 py-3 text-sm">{{ $event->lieu }}</td>
                        <td class="px-8 py-3 text-sm">{{ $event->nbPlaces }}</td>
                        <td class="px-8 py-3 text-sm">{{ $event->price }}</td>
                        <td class="px-8 py-3 text-sm">{{ $event->categorie->titre }}</td>
                        <td class="px-8 py-3 text-sm flex gap-2 justify-end items-center">
                            <form id="accept-form-{{ $event->id }}" action="{{ route('events.accept', $event->id) }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="accept-button px-4 py-2 bg-gradient-to-r from-pink-400 rounded text-white text-sm tracking-wider font-medium border-none outline-none bg-pink-600 active:from-pink-500">
                                    Accept
                                </button>
                            </form>
                            <form id="refuse-form-{{ $event->id }}" action="{{ route('events.refuse', $event->id) }}" method="POST" class="mt-3">
                                @csrf
                            <button type="submit" class="px-4 py-2  bg-gradient-to-r from-purple-400 rounded text-white text-sm tracking-wider font-medium border-none outline-none bg-purple-600 active:from-purple-500">
                                Refuse
                            </button>
                            </form>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </html>
