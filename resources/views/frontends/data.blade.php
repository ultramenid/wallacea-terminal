@extends('layouts.peta')

@section('meta')
    @include('partials.indexMeta')
@endsection


@section('content')
<div class="sm:flex hidden" x-data=" {legend:true}">
    @include('partials.legend')
    <livewire:modal-description />
    <div class="w-3/12 h-full px-6 z-30" >
        {{-- @include('partials.langSwitchPC') --}}
        <div class="w-full flex justify-center">
            <a href="{{ route('index', app()->getLocale()) }}"><img src="{{ asset('assets/logo-wallacea.png') }}" alt="wallacea" class="h-12 mt-12"></a>

        </div>
        <div class=" overflow-x-auto scrollbar-hide  justify-between px-4 flex gap-4  mt-6 border-b border-gray-300 z-30">
            <a class="whitespace-nowrap text-xs font-medium uppercase py-1 border-b-2 border-simontini">data</a>
            <a href="{{ route('index', app()->getlocale() )}}" class="whitespace-nowrap text-xs font-medium uppercase cursor-pointer py-1">home</a>
            <a href="#" class="whitespace-nowrap text-xs font-medium uppercase cursor-pointer py-1">news</a>
            <a href="#" class="whitespace-nowrap text-xs font-medium uppercase cursor-pointer py-1">riset</a>
            <a href="#" class="whitespace-nowrap text-xs font-medium uppercase cursor-pointer py-1">regulasi</a>
        </div>
        <div class="overflow overflow-y-auto h-[80vh] scrollbar-hide">
            <div class="py-6 flex flex-col gap-2 " x-data="{open:'open1', test:[]}" >
                <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1' : 'border-black border px-4 py-1 select-none cursor-pointer'"  @click="open='open1'">
                    <div class="flex w-full justify-between items-center py-1">
                        <a class="font font-semibold text-sm ">Territorial</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col" x-show="open === 'open1'" style="display: none !important">
                        <x-checkbox idAttr="pulaubesar" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Pulau Besar Wallacea')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Pulau Besar Wallacea',
                                        description: 'Pulau adalah wilayah daratan yang terbentuk secara alamiah yang dikelilingi air dan berada di atas permukaan air pada waktu air pasang.',
                                        sumber: 'https://tanahair.indonesia.go.id/map',
                                        tahun: '2021',
                                        skala: '1:50.000',
                                        walidata: 'Kementerian Dalam Negeri'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="pulaukecil" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Pulau Kecil Wallacea')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Pulau Kecil Wallacea',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="adminkabkota" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Batas Administrasi Kab/Kota')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Batas Administrasi Kab/Kota',
                                        description: 'Kabupaten/Kota adalah satuan pembagian administratif yang dipimpin oleh seorang bupati/walikota.',
                                        sumber: 'https://tanahair.indonesia.go.id/map',
                                        tahun: '2021',
                                        skala: '1:50.000',
                                        walidata: 'Kementerian Dalam Negeri'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="provinsi" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Batas Administrasi Provinsi')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Batas Administrasi Provinsi',
                                        description: 'Provinsi adalah daerah otonom yang pemerintahannya terdiri atas kepala daerah yang disebut `gubernur` dan lembaga legislatif daerah berupa Dewan Perwakilan Rakyat Daerah Provinsi.',
                                        sumber: 'https://tanahair.indonesia.go.id/map',
                                        tahun: '2021',
                                        skala: '1:50.000',
                                        walidata: 'Kementerian Dalam Negeri'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="biogegrafi" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Garis Biogeografi Wallacea')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Garis Biogeografi Wallacea',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="weber" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Garis Wallace and Weber')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Garis Wallace and Weber',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                    </div>
                </div>
                {{-- <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1'  : 'border-black border px-4 py-1 select-none cursor-pointer'" >
                    <div class="flex w-full justify-between items-center py-1" @click="open='open1'">
                        <a class="font font-semibold text-sm">Forest Changes</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col gap-1" x-show="open === 'open1'" style="display: none !important">
                        <x-checkbox idAttr="deforestasi2023" layerName="simontini:def_test 4326 v Thresholded">
                            {{__('Deforestasi 2023')}}
                        </x-checkbox>

                    </div>
                </div> --}}
                <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1'  : 'border-black border px-4 py-1 select-none cursor-pointer'" >
                    <div class="flex w-full justify-between items-center py-1" @click="open='open1'">
                        <a class="font font-semibold text-sm">Land Cover</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col gap-1" x-show="open === 'open1'" style="display: none !important">
                        <x-checkbox idAttr="tambang" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Tutupan Tambang')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Tutupan Tambang',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>

                    </div>
                </div>
                {{-- <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1'  : 'border-black border px-4 py-1 select-none cursor-pointer'" >
                    <div class="flex w-full justify-between items-center py-1" @click="open='open1'">
                        <a class="font font-semibold text-sm">Land Use</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col gap-1" x-show="open === 'open1'" style="display: none !important">

                        <x-checkbox idAttr="hgu" layerName="kpa:HGU_BPN_2019">
                            {{__('Hak Guna Usaha')}}
                        </x-checkbox>


                    </div>
                </div> --}}
                <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1'  : 'border-black border px-4 py-1 select-none cursor-pointer'" >
                    <div class="flex w-full justify-between items-center py-1" @click="open='open1'">
                        <a class="font font-semibold text-sm">Land Status</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col gap-1" x-show="open === 'open1'" style="display: none !important">
                        <x-checkbox idAttr="kawasanhutan" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Kawasan Hutan')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Kawasan Hutan',
                                        description: 'Kawasan Hutan. Terdiri atas Peta Penunjukan Kawasan Hutan, Peta Perubahan Peruntukan Kawasan Hutan, Peta Perubahan Fungsi Kawasan Hutan dan Penunjukan Bukan Kawasan Hutan Menjadi Kawasan Hutan dalam rangka revisi RTRW Provinsi, dan Peta Perkembangan Pengukuhan Kawasan Hutan.',
                                        sumber: 'https://sigap.menlhk.go.id',
                                        tahun: '2022',
                                        skala: '1:250.000',
                                        walidata: 'Kementerian Lingkungan Hidup dan Kehutanan'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="adat" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Peta Indikatif Wilayah Adat')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Peta Indikatif Wilayah Adat',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                    </div>
                </div>
                <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1'  : 'border-black border px-4 py-1 select-none cursor-pointer'" >
                    <div class="flex w-full justify-between items-center py-1" @click="open='open1'">
                        <a class="font font-semibold text-sm">Biodiversity</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col gap-1" x-show="open === 'open1'" style="display: none !important">

                        <x-checkbox idAttr="ibba" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('IBBA')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'IBBA (Important bird and biodiversity area)',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>

                    </div>
                </div>
                <div :class="(open === 'open1') ? 'h-filter overflow-y-auto border-black border px-4 py-1'  : 'border-black border px-4 py-1 select-none cursor-pointer'" >
                    <div class="flex w-full justify-between items-center py-1" @click="open='open1'">
                        <a class="font font-semibold text-sm">Concession</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="w-full mt-2 flex flex-col gap-1" x-show="open === 'open1'" style="display: none !important">

                        <x-checkbox idAttr="ppkh" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('PPKH')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'PPKH (Persetujuan Penggunaan Kawasan Hutan)',
                                        description: 'Not Avaliable.',
                                        sumber: 'Not Avaliable',
                                        tahun: 'Not Avaliable',
                                        skala: 'Not Avaliable',
                                        walidata: 'Not Avaliable'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="iup" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Izin Usaha Pertambangan')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Izin Usaha Pertambangan',
                                        description: 'Wilayah Izin Usaha Pertambangan merupakan izin usaha pertambangan mineral dan batubara yang diberikan kepada Badan Usaha, koperasi, dan perseorangan melalui lelang. Jenis perizinan dibedakan berdasarkan komoditas pertambangan yang terbagi dalam 4 kelompok komoditas meliputi: Mineral Logam Termasuk Mineral Ikutannya, Batubara, Mineral Bukan Logam, dan Batuan. Sementara berdasarkan tahapan aktivitas pertambangan, perizinan dikelompokan menjadi dua yaitu izin eksplorasi dan operasi produksi.',
                                        sumber: 'https://momi.minerba.esdm.go.id',
                                        tahun: '2022',
                                        skala: '1:50.000',
                                        walidata: 'Kementerian Energi dan Sumberdaya Mineral'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                        <x-checkbox idAttr="smelter" >
                            <div class="bg-search flex items-center space-x-1 -ml-1" >
                                <a class="text-sm">{{__('Smelter')}}</a>
                                <svg
                                    @click="$dispatch('trigerModal', {
                                        title: 'Smelter',
                                        description: 'Not Available',
                                        sumber: 'Not Available',
                                        tahun: 'Not Available',
                                        skala: 'Not Available',
                                        walidata: 'Not Available'
                                    })"
                                    xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 cursor-pointer active:outline-none focus:outline-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </div>
                        </x-checkbox>
                    </div>
                </div>
                <div class="fixed bottom-5 px-2">
                    <div class="border-b-2 border-black h-6"></div>
                </div>
            </div>
        </div>


    </div>
    <div id="map" class="w-9/12 h-screen z-30"></div>

</div>

<div class="sm:hidden ">
    @include('partials.topbarMobile')
    <div class="h-screen w-full flex items-center justify-center">
        <a class="text-center text-gray-500">under development for mobile version</a>
    </div>
</div>


@endsection
@push('scripts')
    <script src="{{ asset('js/map.js') }} "></script>
@endpush
