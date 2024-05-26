@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')
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
            <a href="{{ route('internasionalnews', [app()->getLocale()]) }}" class="border-b-[0.5px] py-3 border-b-gray-500 {{ ($nasional == 'Internasional') ? 'font-bold' : null ; }}">
                Internasional
            </a>
            <a href="{{ route('internasionalnews', [app()->getLocale()]) }}" class="border-b-[0.5px] py-3 border-b-gray-500 {{ ($nasional == 'Nasional') ? 'font-bold' : null ; }}">
                Nasional
            </a>
            @foreach ($subcategory as $item)
                <a href="{{ route('regionnews', [app()->getLocale(), $item->subcategory]) }}" class="pl-8 border-b-[0.5px] py-3 border-b-gray-500 text-sm {{ ($region == $item->subcategory) ? 'font-bold' : null ; }}">
                    {{$item->subcategory}}
                </a>
            @endforeach
        </div>
        <livewire:region-news :region='$region' />

    </div>
    @include('partials.footer')

@endsection
