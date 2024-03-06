<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full">
    @include('layouts.sideBarAdmin')

    <div class="w-[80%] mt-10 ml-auto bg-white rounded-md overflow-hidden shadow-md">
        <div class="py-4 px-6">
            <h1 class="text-2xl font-bold mb-4">All Categories</h1>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($categories as $category)
                    <div class="bg-gray-200 p-4 rounded-md">
                        <img src="{{ asset('images/'.$category->photo) }}" alt="{{ $category->titre }}" class="w-full h-32 object-cover mb-2">
                        <p class="text-gray-700 font-semibold">{{ $category->titre }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
