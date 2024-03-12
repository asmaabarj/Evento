<div class="py-4 px-6  bg-white flex items-center shadow-md shadow-black/5 sticky -top-0.5 left-0 z-30">
    <ul class="text-sm ml-4">
        <li class="mr-2">
            <a href="/admin" class="text-gra-700 text-md hover:text-white font-semibold flex items-center gap-2"><img
                    src="{{ asset('storage/images/' . 'logo.png') }}" alt="logo" class="w-24"> </a>
        </li>
    </ul>
    <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">

        <div class=" inline-block  border-gray-300 border-l-2 pl-6 cursor-pointer ">
            <button onclick="toggleModal('ProfilPop')"><svg class="mt-2" fill="#883c99"
                    xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path class="outline-none"
                        d="M80-160v-160h160v160H80Zm240 0v-160h560v160H320ZM80-400v-160h160v160H80Zm240 0v-160h560v160H320ZM80-640v-160h160v160H80Zm240 0v-160h560v160H320Z" />
                </svg>
            </button>
            <div class="absolute z-50 w-[120px] hidden h-[85px] md:top-full rounded-md right-2 drop-shadow-2xl"
                id="ProfilPop">
                <a href='/client'
                    class='hover:bg-[#49566f]  duration-300 hover:text-white w-full h-[50%] bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center pl-4'>Home
                </a>
                <div class="h-[50%]"> <a href=""> <span
                            class="absolute md:mt-2.5   rounded-[0.37rem] bg-red-800 px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">{{ $countReservation }}</span>
                    </a>
                    <a href='/Reservations'
                        class='hover:bg-[#49566f]  duration-300 hover:text-white w-full h-full bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center pl-4'>Reservations</a>
                </div>
                <a href='/logout'
                    class='hover:bg-[#49566f] rounded-b-md duration-300 hover:text-white w-full h-[50%] bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center pl-4'>log
                    out</a>
            </div>
        </div>


    </div>
</div>
<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>
