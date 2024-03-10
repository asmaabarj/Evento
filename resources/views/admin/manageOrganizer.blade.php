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
    @include('layouts.sideBarAdmin')
    <div class="w-[80%] ml-auto px-7 py-10">
        <table class= "w-full bg-white  shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-pink-500 to-purple-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Client</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Phone</th>
                    <th class="px-6 py-3 text-left">Created at</th>
                    <th class="px-6 py-3 text-left">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($organizers as $organizer)
                <tr class="border-b hover:bg-gray-100 transition-colors duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $organizer->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $organizer->user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $organizer->user->phone }} </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $organizer->user->created_at }} </td>
                    <td class="px-6 py-4 whitespace-nowrap"> <form action="/archiveUser/{{ $organizer->user->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="role" value="organizer">
                        <button type="submit" class="bg-red-600 rounded px-4 py-2 text-white">Ban</button>


                    </form></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>