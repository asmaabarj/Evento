<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento - Reset Password</title>
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
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="relative">
                    <input id="email" type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm outline-none py-3 px-2 bg-gray-100 text-gray-800" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" class="mt-1 block w-full rounded-md outline-none py-3 px-2 bg-gray-100 text-gray-800" required autocomplete="new-password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm outline-none py-3 px-2 bg-gray-100 text-gray-800" required autocomplete="new-password">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</body>

</html>
