@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')

     {{-- <!-- login -->
     <div class="max-w-6xl mx-auto flex justify-end py-1 px-2">
        <a href="/cms/login" class="flex gap-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            <span class="text-sm font-light">Login</span>
        </a>
    </div> --}}

    @include('partials.infoterbaru')
    @include('partials.navbar')
    @include('partials.nasional')
    <div class="sm:hidden flex justify-center gap-4 px-4 overflow-y-auto scrollbar-hide">
        @foreach ($subcategory as $item)
            <a href="{{ route('regionnews', [app()->getLocale(), $item->subcategory]) }}" class="py-3  text-sm whitespace-nowrap">
                {{$item->subcategory}}
            </a>
        @endforeach

    </div>
    <!-- hero -->
    <div class="max-w-6xl mx-auto flex sm:flex-row flex-col gap-10 mt-12 px-4">
        <div class="sm:flex hidden flex-col border-t-4 border-t-kuning  sm:w-3/12 w-0 ">
            <a href="{{ route('internasionalnews', [app()->getLocale()]) }}" class="border-b-[0.5px] py-3 border-b-gray-500">
                Internasional
            </a>
            <a href="{{ route('nasionalnews', [app()->getLocale()]) }}" class="border-b-[0.5px] py-3 border-b-gray-500">
                Nasional
            </a>
            @foreach ($subcategory as $item)
                <a href="{{ route('regionnews', [app()->getLocale(), $item->subcategory]) }}" class="pl-8 border-b-[0.5px] py-3 border-b-gray-500 text-sm">
                    {{$item->subcategory}}
                </a>
            @endforeach
        </div>
        <div class="sm:w-9/12 w-full flex sm:flex-row flex-col sm:gap-6 gap-12">
            @foreach ($news as $item)
                <div class="flex flex-col sm:w-6/12 w-full">
                        @if ($item->slug)
                            <a href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}" class="h-60 w-full">
                        @else
                            <a  href="{{$item->url}}" target="_blank" class="h-60 w-full">
                        @endif
                            <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{$item->title}}" class="h-full w-full object-cover object-center">
                        </a>
                    <a class="font-light text-sm mt-8">
                        @php
                            $date = \Carbon\Carbon::parse($item->publishdate)->locale(App::getLocale());
                            $date->settings(['formatFunction' => 'translatedFormat']);
                            echo $date->format('d F Y');
                        @endphp</h1>

                        @if (!$item->slug)
                        - {{$item->source}}
                        @endif
                    </a>
                    @if ($item->slug)
                        <a href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}" class="font-bold">{{ $item->title }}</a>
                    @else
                        <a  href="{{$item->url}}" target="_blank" class="font-bold">{{ $item->title }}</a>
                    @endif
                    <p class="mt-3 font-light text-sm">{{ $item->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- riset -->
    <div class="max-w-6xl mx-auto px-4 mt-24">
        <div class="flex items-center gap-2" x-data="{ tooltip: 'Keterangan tentang riset ini, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum repellendus illum earum quam natus sint, fugiat provident ipsum ea vel sunt blanditiis animi doloribus sed, cupiditate nesciunt molestias labore non.!' }">
            <a href="#" class="text-4xl font-bold text-biru-wallacea">RISET</a>
            <div class="rounded-full h-8 w-8 border-2 border-biru flex items-center justify-center" x-tooltip="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="w-4 h-4 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                  </svg>
            </div>
        </div>

        <div class="flex sm:flex-row flex-col gap-10 mt-6">
            @foreach ($risets as $item)
                <div class="flex flex-col sm:w-6/12 w-full">
                    <a class="font-bold text-biru uppercase">{{ $item->category }}</a>
                    <a href="{{ route('detailriset', [app()->getLocale(), $item->id, $item->slug]) }}">
                        <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{$item->title}}" class="h-80 w-full object-cover object-center">
                    </a>
                    <a class="font-light text-sm mt-4">
                        @php
                            $date = \Carbon\Carbon::parse($item->publishdate)->locale(App::getLocale());
                            $date->settings(['formatFunction' => 'translatedFormat']);
                            echo $date->format('d F Y');
                        @endphp
                    </a>
                    <a href="{{ route('detailriset', [app()->getLocale(), $item->id, $item->slug]) }}" class="font-bold">{{$item->title}}</a>
                    <p class="mt-3 font-light text-sm">{{$item->description}}</p>

                </div>
            @endforeach
        </div>
    </div>

    <!-- aksi / highlight -->
    <div class="bg-biru-wallacea mt-24 py-24" x-data="{ tooltip: 'Keterangan tentang aksi ini, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum repellendus illum earum quam natus sint, fugiat provident ipsum ea vel sunt blanditiis animi doloribus sed, cupiditate nesciunt molestias labore non.!' }">
        <div class="max-w-6xl mx-auto flex sm:flex-row flex-col px-4 items-center gap-10">
            <a class="h-96 sm:w-6/12 w-full" href="{{ route('detailaksi', [app()->getLocale(), $aksi->id, $aksi->slug]) }}">
            <img src="{{ asset('storage/files/photos/'.$aksi->img) }}" alt="{{$aksi->title}}" class="h-full w-full object-cover object-center">
            </a>
            <div class="flex flex-col sm:w-6/12 w-full">
                <div class="flex  items-center gap-2">
                    <a href="" class="text-3xl font-bold text-kuning-wallacea">AKSI</a>
                    <div class="rounded-full h-6 w-6 border-2 border-kuning flex items-center justify-center" x-tooltip="tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="w-3 h-3 text-kuning-wallacea">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                          </svg>
                    </div>
                </div>
                <a class="text-white text-4xl font-bold mt-4" href="{{ route('detailaksi', [app()->getLocale(), $aksi->id, $aksi->slug]) }}">{{$aksi->title}}</a>
                <p class="mt-4 text-white">{{$aksi->description}}</p>
                <a class="text-white font-bold mt-10" >{{$aksi->category}}</a>

            </div>
        </div>
    </div>

    {{-- <!-- regulasi -->
    <div class="max-w-6xl mx-auto px-4 mt-24">
        <div class="flex items-center gap-2">
            <a href="#" class="text-4xl font-bold text-biru-wallacea">REGULASI</a>
            <div class="rounded-full h-8 w-8 border-2 border-biru flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="w-4 h-4 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                  </svg>
            </div>
        </div>

        <div class=" flex gap-6 py-12 scrollbar-hide overflow-x-scroll  snap-x snap-mandatory">
            <div class=" w-72 h-full sm:flex-shrink flex-shrink-0 snap-center">
                <a class="text-sm font-semibold">LEGAL BRIEF HUKUM</a>
                <img src="assets/example-2.png" alt="Wallacea Terminal" class=" object-cover object-center h-full w-full">
                <p class="mt-4 font-bold">Wajah Sebenarnya Hilirisasi Nikel ala Cawapres Menurut OMS</p>
            </div>

            <div class=" w-72 h-full sm:flex-shrink flex-shrink-0 snap-center">
                <a class="text-sm font-semibold">SUBSTANSI HUKUM</a>
                <img src="assets/example-2.png" alt="Wallacea Terminal" class=" object-cover object-center h-full w-full">
                <p class="mt-4 font-bold">Wajah Sebenarnya Hilirisasi Nikel ala Cawapres Menurut OMS</p>
            </div>
            <div class=" w-72 h-full sm:flex-shrink flex-shrink-0 snap-center">
                <a class="text-sm font-semibold">TINJAUAN HUKUM</a>
                <img src="assets/example-2.png" alt="Wallacea Terminal" class=" object-cover object-center h-full w-full">
                <p class="mt-4 font-bold">Wajah Sebenarnya Hilirisasi Nikel ala Cawapres Menurut OMS</p>
            </div>
            <div class=" w-72 h-full sm:flex-shrink flex-shrink-0 snap-center">
                <a class="text-sm font-semibold">PERATURAN</a>
                <img src="assets/example-2.png" alt="Wallacea Terminal" class=" object-cover object-center h-full w-full">
                <p class="mt-4 font-bold">Wajah Sebenarnya Hilirisasi Nikel ala Cawapres Menurut OMS</p>
            </div>
        </div>
    </div> --}}

    <!-- data / map -->
    <div class="max-w-6xl mx-auto px-4 mt-24" x-data="{ tooltip: 'Keterangan tentang data ini, Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum repellendus illum earum quam natus sint, fugiat provident ipsum ea vel sunt blanditiis animi doloribus sed, cupiditate nesciunt molestias labore non.!' }">
        <div class="flex items-center gap-2">
            <a href="{{ route('data', [app()->getLocale()]) }}" class="text-4xl font-bold text-biru-wallacea">DATA</a>
            <div class="rounded-full h-8 w-8 border-2 border-biru flex items-center justify-center" x-tooltip="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="w-4 h-4 ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                  </svg>
            </div>
        </div>
        <div id="map" class="h-[80vh] w-full mt-4 z-40"></div>
    </div>


    @include('partials.footer')

    <script>
        var map = L.map('map', {
            center: [-2.734073330631159, 122.99983789744495],
            zoom: 5.4,
            // attributionControl: false,
            zoomControl: false,
            gestureHandling: true
          });
          var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            detectRetina: true,
            attribution: 'Auriga Nusantara',
            maxNativeZoom: 17
        }).addTo(map);

        L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Garis Biogeografi Wallacea',
        transparent: true,
        format: 'image/png'
        }).addTo(map);

        L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'terminal_wallacea:Garis Wallace and Weber',
        transparent: true,
        format: 'image/png'
        }).addTo(map);
    </script>


@endsection
