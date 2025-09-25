<!-- navbar -->
    <!-- top sm -->
    <header x-data="{open: false, searchsm:false}" class="sticky top-9 z-50 ">
        <div  class="bg-biru-wallacea lg:hidden block py-6">
            <div x-show="!searchsm" class="flex justify-between px-4 items-center">
                <svg @click="open=true"  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <a href="{{ route('index', [app()->getLocale()]) }}">
                <img src="{{ asset('assets/logo-wallacea-putih.png') }}"  alt="papua betahita" class="h-8"></a>
                {{-- <svg @click="searchsm = true" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg> --}}
                <div></div>
            </div>
            {{-- <div x-show="searchsm" @click.away="searchsm=false" class="max-w-5xl mx-auto px-4" style="display: none !important;">
                <form action="#" method="get" class="flex justify-between items-center relative">
                    <input class="border border-white px-4 py-2 bg-gray-200 w-full" type="text" placeholder="Search. . .">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="absolute right-3 h-6 w-6 text-black" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </form>
            </div> --}}
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
                    <a href="{{ route('index', app()->getlocale() )}}"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">HOME<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="{{ route('news', app()->getlocale() )}}"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">NEWS<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="{{ route('risets', app()->getlocale() )}}"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">RISET<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="{{ route('aksi', app()->getlocale() )}}"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">AKSI<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="{{ route('regulasi', app()->getlocale() )}}"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">REGULASI<a>
                    <p class="border-b border-gray-300"></p>
                </div>
                <div class="px-6">
                    <a href="{{ route('data', app()->getlocale() )}}"   class="mb-4 px-4 inline-block text-base leading-5 text-white uppercase">DATA<a>
                    <p class="border-b border-gray-300"></p>
                </div>

            </div>
        </div>
    </header>

    <!-- Top pc-->
    <div class="py-6  sm:block hidden"  x-data="{border:false, search:false}" @scroll.window="border = (window.pageYOffset > 50) ? true : false" >
        <div :class="border ? 'border-t border-b border-black py-4' : 'border-t border-b border-white py-3'" >
            <div x-show="!search" class="max-w-6xl w-full flex items-center justify-between mx-auto px-4" x-data="{ pages: false }">
                <a href="{{ route('index', [app()->getLocale()]) }}" class="text-left w-full">
                    <img src="{{ asset('assets/logo-wallacea.png') }}" alt="Wallacea Terminal"  class="h-12">
                </a>

                <div class="flex gap-12 items-center">
                    <a href="{{ route('news', app()->getlocale() )}}" class="uppercase text-biru-wallacea py-1 {{ ($nav == 'news') ? 'border-b-2 border-kuning' : null }}">NEWS</a>
                    <a href="{{ route('risets', app()->getlocale() )}}" class="uppercase text-biru-wallacea {{ ($nav == 'riset') ? 'border-b-2 border-kuning' : null }}">RISET</a>
                    <a href="{{ route('aksi', app()->getlocale() )}}" class="uppercase text-biru-wallacea {{ ($nav == 'aksi') ? 'border-b-2 border-kuning' : null }}">AKSI</a>
                    <a href="{{ route('regulasi', app()->getlocale() )}}" class="uppercase text-biru-wallacea {{ ($nav == 'regulasi') ? 'border-b-2 border-kuning' : null }}">REGULASI</a>
                    <a href="{{ route('data', app()->getlocale() )}}" class="uppercase text-biru-wallacea">DATA</a>
                    <a href="" class="uppercase text-biru-wallacea">RESOURCES</a>
                </div>

                <div class="">

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
