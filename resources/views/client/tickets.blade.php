<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>


<body class="bg-gray-200">
    @include('layouts.navbarClient')

    <section class="grid grid-cols-2  mt-10">
        <section class=" flex-grow  flex  p-4">
            <div class="flex w-full max-w-3xl text-zinc-900 h-64">

                <div class="h-full gap-10 bg-white flex flex-col items-center justify-center px-4 rounded-l-3xl">
                    <img src='{{ asset('storage/' . $reservation->event->photo) }}' alt=""
                        class="w-48 rounded h-28">
                    <div class="flex items-center px-4 rounded-full  bg-lime-400 h-8 ">
                        <h2 class="text-sm font-medium">{{ date('H:i', strtotime($reservation->event->date)) }}</h2>
                    </div>
                </div>

                <div
                    class="relative h-full flex flex-col items-center border-dashed justify-between border-2 bg-white border-zinc-900">
                    <div class="absolute rounded-full w-8 h-8 bg-gray-200 -top-5"></div>
                    <div class="absolute rounded-full w-8 h-8 bg-zinc-200 -bottom-5"></div>
                </div>
                <div class="h-full py-8 px-10 bg-white flex-grow rounded-r-3xl flex flex-col">
                    <div class="flex w-full justify-between items-center">
                        <div class="flex flex-col items-center">
                            <span class="lg:text-4xl font-bold">{{ $reservation->event->titre }}</span>
                        </div>
                    </div>
                    <div class="flex w-full mt-auto justify-between">
                        <div class="flex flex-col">
                            <span class="text-xs text-zinc-400">Date</span>
                            <span class="font-mono">{{ date('Y-m-d', strtotime($reservation->event->date)) }}</span>
                        </div>

                        <div class="flex flex-col">
                            <span class="text-xs text-zinc-400">Location</span>
                            <span class="font-mono">{{ $reservation->event->lieu }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs text-zinc-400">Price</span>
                            <span class="font-mono whitespace-nowrap">{{ $reservation->event->price }} MAD</span>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </section>
</body>

</html>
