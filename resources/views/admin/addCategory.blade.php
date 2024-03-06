<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="w-full">
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

<div class="w-[80%] mt-12 ml-auto bg-white rounded-md overflow-hidden shadow-md">
    <div class="py-4 px-10">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="category_name" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                <input type="text" id="category_name" name="category_name"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-purple-500" required>
            </div>
            <div class="mb-4">
                <label for="category_image" class="block text-gray-700 text-sm font-bold mb-2">Category Image:</label>
                <input type="file" id="category_image" name="category_image"
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-purple-500" accept="image/*" required>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-md hover:bg-purple-600 focus:outline-none focus:bg-purple-600">
                    Add Category
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
