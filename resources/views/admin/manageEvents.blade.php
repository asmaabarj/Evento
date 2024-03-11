<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

@if (session('success'))
<div id="success-message" class="bg-purple-500 fixed right-20 top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
    {{ session('success') }}
</div>

<script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 5000);
</script>
@endif
<body class="w-[100%] bg-gray-50">
   
    @include('layouts.navBar')
    @include('layouts.sideBarAdmin')

    <div class="lg:w-[80%] md:ml-auto px-4 py-10">
        <table class="bg-white rounded-lg ">
                <thead class=" bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-white">Event</th>
                        <th class="px-4 py-4 text-left text-sm font-semibold text-white">Date</th>
                        <th class="px-4 py-4 text-left text-sm font-semibold text-white">Location</th>
                        <th class="px-4 py-4 text-left text-sm font-semibold text-white">Places</th>
                        <th class="px-4 py-4 text-left text-sm font-semibold text-white whitespace-nowrap">Ticket Price</th>
                        <th class="px-4 py-4 text-left text-sm font-semibold text-white">Category</th>
                        <th class="px-4 py-4 text-left flex justify-center text-sm font-semibold text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 text-sm">
                            <div class="flex items-center cursor-pointer">
                                <img src='{{ asset('storage/' . $event->photo) }}' class="w-16 h-16 rounded-md shrink-0" />
                                <div class="ml-4">
                                    <p class="text-sm pr-6 w  text-black ">{{ $event->titre }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $event->user->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm">{{ $event->date }}</td>
                        <td class="px-4 py-4 text-sm">{{ $event->lieu }}</td>
                        <td class="px-4 py-4 text-sm">{{ $event->nbPlaces }}</td>
                        <td class="px-4 py-4 text-sm">{{ $event->price }}</td>
                        <td class="px-4 py-4 text-sm">{{ $event->categorie->titre }}</td>
                        <td class="px-4 py-4 text-sm flex gap-2 justify-end items-center">
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
    </div>
    <script>
        function toggleModal(modalId) {
              const modal = document.getElementById(modalId);
              modal.classList.toggle('hidden');
          }
  </script>
</body>

</html>
