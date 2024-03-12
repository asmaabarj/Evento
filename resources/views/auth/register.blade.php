<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento - Register</title>
    <!-- External CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- Local CSS -->
    <style>
        /* Custom Styles */
        /* Add your custom styles here */
    </style>
</head>

<body class="bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md lg:max-w-[60%] w-full">
        <!-- Session Status -->
        @if (session('status'))
        <div class="mb-4 text-green-500 text-sm">
            {{ session('status') }}
        </div>
        @endif
        <!-- Error Message -->
        @if (session('error'))
        <div class="mb-4 text-red-500 text-sm">
            {{ session('error') }}
        </div>
        @endif
        <h2 class="text-3xl font-bold mb-4 text-center text-gray-800">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="grid lg:grid-cols-2  grid-cols-1 gap-4">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium  text-gray-700">Name</label>
                <input id="name" type="text" name="name" class="mt-1 py-3 outline-none block w-full rounded-md border-gray-300 shadow-sm  px-2 bg-gray-100 text-gray-800" value="{{ old('name') }}" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input id="phone" type="text" name="phone" class="mt-1 block w-full py-3 outline-none rounded-md border-gray-300 shadow-sm px-2 bg-gray-100 text-gray-800" value="{{ old('phone') }}" required autofocus autocomplete="phone">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" name="email" class="mt-1 block w-full py-3 outline-none rounded-md border-gray-300 shadow-sm px-2 bg-gray-100 text-gray-800" value="{{ old('email') }}" required autocomplete="email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" class="mt-1 block py-3 outline-none w-full rounded-md border-gray-300 px-2 shadow-sm  bg-gray-100 text-gray-800" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="mt-1 block py-3 outline-none w-full px-2 rounded-md border-gray-300 shadow-sm  bg-gray-100 text-gray-800" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Register as</label>
                <select id="role" name="role" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm py-3  bg-gray-100  text-gray-800">
                    <option value="client">Client</option>
                    <option value="organisateur">Organisateur</option>
                </select>
            </div>
            
                <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('login') }}">Already registered?<span class="text-black font-medium"><u>   login here</u></span></a>
                <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 w-28 focus:ring-indigo-500 focus:ring-opacity-50">Register</button>
                </div>
          
            </div>
        </form>
    </div>
</body>

</html>
