<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
            }, 10000);
        </script>
    @endif

    @include('layouts.sideBarOrganizer')
    @include('layouts.navBar')

    <div class="lg:w-[80%] mt-8 lg:ml-auto  bg-white rounded-md overflow-hidden">
        <div class="py-4 px-10">
            @if ($event !== null)
                <form action="{{ route('updateEvent', ['id' => $event->id]) }}" method="POST"
                    enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @else
                    <form action="{{ route('addEvent') }}" method="POST" enctype="multipart/form-data"
                        class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @endif
            @csrf
            <div class="mb-2">
                <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text" id="titre" name="titre" value="{{ $event ? $event->titre : old('titre') }}"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
            </div>
            <div class="mb-2">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                <input type="datetime-local" id="date" name="date"
                    value="{{ $event ? $event->date : old('date') }}"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
            </div>
            <div class="mb-2">
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                <input type="text" id="location" name="location"
                    value="{{ $event ? $event->lieu : old('location') }}"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
            </div>
            <div class="mb-2">
                <label for="numberOfPlaces" class="block text-gray-700 text-sm font-bold mb-2">Number of Places:</label>
                <input type="number" id="numberOfPlaces" name="numberOfPlaces"
                    value="{{ $event ? $event->nbPlaces : old('numberOfPlaces') }}"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
            </div>
            <div class="mb-2">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                <select id="category" name="category"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->titre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-around">
                <div class="mb-2">
                    <label for="reservation_method" class="block text-gray-700 text-sm font-bold mb-2">Reservation
                        Method:</label>
                    <select id="reservation_method" name="reservation_method"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
                        <option value="">Select Reservation Method</option>
                        <option value="manuelle" {{ old('reservation_method') == 'manuelle' ? 'selected' : '' }}>Manual
                        </option>
                        <option value="automatique" {{ old('reservation_method') == 'automatique' ? 'selected' : '' }}>
                            Automatic</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price Ticket:</label>
                    <input type="text" id="location" name="price"
                        value="{{ $event ? $event->price : old('price') }}"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
                </div>


            </div>
            <div class="mb-2">
                <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Picture:</label>
                <input type="file" id="picture" name="picture"
                    class="w-full px-4 py-3 border rounded-md focus:outline-none focus:border-purple-500" required>
            </div>
            <div class="mb-2">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                <textarea id="description" name="description"
                    class="w-full px-4 py-1 border rounded-md focus:outline-none focus:border-purple-500" required>{{ $event ? $event->description : old('description') }}</textarea>
            </div>
            <div class="mb-2">
                @if ($event !== null)
                    <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:bg-purple-600">
                        Update Event
                    </button>
                @else
                    <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:bg-purple-600">
                        Add Event
                    </button>
                @endif
            </div>
            </form>
        </div>
    </div>

</body>

</html>
