<!-- navbar -->
    <!-- top sm -->
    <header x-data="{open: false, searchsm:false}" class="sticky top-0 z-20 ">
        <div  class="bg-biru-wallacea lg:hidden block py-6">
            <div x-show="!searchsm" class="flex justify-between px-4 items-center">
                <svg @click="open=true"  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <img src="{{ asset('assets/logo-wallacea-putih.png') }}" alt="papua betahita" class="h-8">
                <svg @click="searchsm = true" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <div x-show="searchsm" @click.away="searchsm=false" class="max-w-5xl mx-auto px-4" style="display: none !important;">
                <form action="#" method="get" class="flex justify-between items-center relative">
                    <input class="border border-white px-4 py-2 bg-gray-200 w-full" type="text" placeholder="Search. . .">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="absolute right-3 h-6 w-6 text-black" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </form>
            </div>
        </div>
        <div class="fixed w-3/4 h-screen z-30 bg-biru-wallacea inset-0 overflow-y-auto"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.outside="open = false"
        x-cloak style="display: none !important"
        x-show="open">
            <button class="absolute px-6 py-6 focus:outline-none text-white" @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="mt-16 space-y-3 ">
                <div class="px-6">
                    <a href="#"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">TAMBANG<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="#"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">HUTAN<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="#"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">ENERGI<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="#"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">KONSERVASI<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="#"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">ANALISIS<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6" x-data="{open:false}">
                    <div class="flex items-center px-4" @click="open=!open" @clic.away="open=false">
                        <a class="inline-block text-base leading-5 text-white uppercase">
                            MULTIMEDIA
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 ml-1 -mb-1 text-white" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="open" class="mt-3 flex flex-col justify-center px-6 space-y-1 py-2" style="display: none !important;">
                        <a href="#" class="text-red-500">FOTO</a>
                        <a href="#" class="text-red-500">VIDEO</a>
                        <a href="#" class="text-red-500">PODCAST</a>
                        <a href="#" class="text-red-500">INFOGRAGIS</a>
                    </div>
                    <p class="border-b border-gray-300 mt-4"></p>
                </div>
                <div class="px-6">
                    <a href="#"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">BUMI KITA<a>
                    <p class="border-b border-gray-300"></p>
                </div>
            </div>
        </div>
    </header>

    <!-- Top pc-->
    <div class="py-6  sm:block hidden"  x-data="{border:false, search:false}" @scroll.window="border = (window.pageYOffset > 50) ? true : false" >
        <div :class="border ? 'border-t border-b border-black py-4' : 'border-t border-b border-white py-3'" >
            <div x-show="!search" class="max-w-6xl flex items-center justify-between mx-auto px-4" x-data="{ pages: false }">
                <img src="{{ asset('assets/logo-wallacea.png') }}" alt="Wallacea Terminal" class="h-12 ">

                <div class="flex gap-12 items-center">
                    <a href="" class="uppercase text-biru-wallacea">NEWS</a>
                    <a href="" class="uppercase text-biru-wallacea">RISET</a>
                    <a href="" class="uppercase text-biru-wallacea">AKSI</a>
                    <a href="" class="uppercase text-biru-wallacea">REGULASI</a>
                    <a href="" class="uppercase text-biru-wallacea">DATA</a>
                </div>

                {{-- <a href="#">
                    <svg @click="search =! search" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 black" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </a> --}}
            </div>
            {{-- <div x-show="search" @click.away="search=false" class="max-w-5xl mx-auto" style="display: none !important;">
                <form action="#" method="get" class="flex justify-between items-center relative">
                    <input class="border border-white px-4 py-2 bg-gray-200 w-full focus:outline-none" type="text" placeholder="Search. . .">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="absolute right-3 h-6 w-6 text-black" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </form>
            </div> --}}
        </div>
    </div>
