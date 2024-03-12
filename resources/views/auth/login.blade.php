<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>

<body class="bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md max-w-md w-full">
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
        <h2 class="text-3xl font-bold mb-4 text-center text-gray-800">Welcome Back!</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <div class="relative">
                    <input id="email" type="email" name="email" class="mt-1 py-3 px-2 block w-full rounded-md border-gray-300 shadow-sm  outline-none  bg-gray-100 text-gray-800" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    </div>
                </div>
                @error('email')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" class="mt-1 py-3 px-2 outline-none block w-full rounded-md border-gray-300 shadow-sm  f bg-gray-100 text-gray-800" required autocomplete="current-password">
                </div>
                @error('password')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-600">Remember me</label>
            </div>
            <div class="flex items-center justify-between">
                <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">Forgot your password?</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Log In</button>
            </div>
            <a class="text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('register') }}">Don't have an account ?<span class="text-black  font-medium">  <u>Register here</u> </span></a>

        </form>
    </div>
</body>

</html>
