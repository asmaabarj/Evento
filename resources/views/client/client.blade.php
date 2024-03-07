<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    
</body>
</html>
<div class="bg-white flex px-4 py-3 mt-10 border-b-[2px] border-[#d869d291]  focus-within:border-pink-500 overflow-hidden max-w-xl mx-auto font-[sans-serif]">
    <form action="{{ route('client') }}" method="GET" class="flex">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="18px" class="fill-gray-600 mr-3">
      <path
        d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
      </path>
    </svg>
    <input type='text' name="search" placeholder='Search Something...' class="w-full outline-none text-sm" />
  </div>
</form>


<div class="bg-gray-50 px-4 py-20 font-[sans-serif]">
    <div class="max-w-6xl max-md:max-w-lg mx-auto">
        <h2 class="text-3xl font-extrabold text-[#333]">LATEST EVENTS</h2>
        
        <div class="bg-white flex px-2 py-2 rounded-full border  border-purple-500 overflow-hidden max-w-[22vw] mt-10  font-[sans-serif]">
            <form action="{{ route('client') }}" method="GET" class="grid grid-cols-2">
                <select name="category" class="w-full outline-none bg-white pl-4 text-sm text-black">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->titre }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-purple-500  hover:bg-blue-700 transition-all text-white text-sm rounded-full px-5 py-2.5">Filter</button>
            </form>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mt-12">
            @foreach($events as $event)
        <div class="bg-white cursor-pointer rounded overflow-hidden group">
          <div class="relative overflow-hidden">
            <img src='{{ asset('storage/' . $event->photo) }}' alt="Blog Post 1" class="w-full h-[44vh] object-cover group-hover:scale-125 transition-all duration-300" />
            <div class="px-4 py-2.5 text-white text-sm tracking-wider bg-gradient-to-r from-pink-500 to-purple-500 absolute bottom-0 right-0">{{ date('Y-m-d', strtotime($event->date)) }} AT {{ date('H:i', strtotime($event->date)) }}</div>
          </div>
          
          <div class="p-6">
            <h4 class="text-sm font-medium text-gray-500">{{ $event->user->name }}</h4>
            <h3 class="text-xl font-bold text-[#333]">{{ $event->titre }}</h3>
            <h4 class="text-base font-medium text-gray-800">{{ $event->description }} </h4>
            <h6 class="text-lg font-bold text-gray-900">{{ $event->lieu }}</h6>
            <div class="flex justify-end text-gray-700  items-center ">
                <i class='bx bx-chair '></i>
                <h1 class="text-sm">available places : {{ $event->nbPlaces }}</h1>
            </div>
            <button type="button" class="px-4 py-2 mt-6 rounded text-white text-sm tracking-wider border-none outline-none bg-pink-500 hover:bg-purple-600">Reserve</button>
          </div>
        </div> 
        @endforeach 
      </div>
    </div>
  </div>