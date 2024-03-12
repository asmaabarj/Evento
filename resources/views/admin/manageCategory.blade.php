<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body class="w-full bg-gray-50">

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

    @include('layouts.navBar')
    @include('layouts.sideBarAdmin')

    <div class="lg:w-[80%] mt-10  flex justify-center   bg-gray-50 rounded-md overflow-hidden ">
        <div class="py-4 shadow-xl md:w-[45%]">
            <div class="overflow-x-auto">
                <table class="min-w-full  bg-white font-[sans-serif]">
                    <thead class="whitespace-nowrap bg-gradient-to-r from-pink-500 to-purple-500 rounded">
                        <tr>
                            <th class="px-12 py-4 text-left text-sm font-semibold text-black">Name</th>
                            <th class="px-12 py-4 text-left text-sm font-semibold flex mr-5 justify-end text-black">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50">

                                <td class="px-12 py-6 text-sm">{{ $category->titre }}</td>
                                <td class="px-12 py-6 flex justify-end items-center text-sm">
                                    <form action="/editCatgory" method="POST">
                                        @csrf
                                        <input type="hidden" name="categorieId" value="{{ $category->id }}">
                                        <button class="mr-4" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 fill-purple-500 hover:fill-purple-700"
                                                viewBox="0 0 348.882 348.882">
                                                <path
                                                    d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                    data-original="#000000" />
                                                <path
                                                    d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                    data-original="#000000" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        <button class="mr-4" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 fill-pink-500 hover:fill-pink-700" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000" />
                                                <path
                                                    d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000" />
                                            </svg>
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="addCategoryModal" class="hidden fixed z-50 inset-0 ">

        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20   sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                @if ($categorieEdit !== null)
                    <script>
                        document.getElementById('addCategoryModal').classList.remove('hidden')
                    </script>

                    <form action="/updateCategorie" method="POST">
                        <input type="hidden" name="categorieId" value="{{ $categorieEdit ? $categorieEdit->id : '' }}">

                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                        width="24">
                                        <path
                                            d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Update category

                                    </h3>

                                    <label for="name" class="block text-sm font-medium text-gray-700 mt-2">category
                                        Name:</label>
                                    <input type="text" name="name" id="name"
                                        value="{{ $categorieEdit ? $categorieEdit->titre : '' }}"
                                        class="mt-1 p-2 block w-full border-gray-300 rounded-md"
                                        placeholder="Enter category name">
                                </div>

                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <a href="/manageCategory"><button id="ClosecategoryButton" type="button"
                                    onclick="toggleModal('addCategoryModal')"
                                    class="md:w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-pink-800 text-base font-medium text-white hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:ml-3 mb-2 md:mb-0 sm:w-auto sm:text-sm">
                                    Close
                                </button></a>

                            <button id="" type="submit"
                                class="md:w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-purple-800 text-base font-medium text-white hover:bg-purple/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Update category
                            </button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>

</body>

</html>
