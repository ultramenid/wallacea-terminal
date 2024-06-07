@extends('layouts.indexLayout')

@section('meta')
    @include('partials.newsMeta')
@endsection

@section('content')
    @include('partials.infoterbaru')
    @include('partials.navbar')
    <!-- category top -->
    <div class="border-b border-t border-kuning py-2 flex justify-center gap-12 font-light ">
        @foreach ($categories as $item)
            <a href="{{ route('categoryaksi', [app()->getLocale(), $item->category]) }}" class="{{ ($category == $item->category) ? 'font-bold' : null ; }}" href="{{ route('categoryriset', [app()->getLocale(), $item->category]) }}">{{$item->category}}</a>
        @endforeach
    </div>

    {{-- image, title, description --}}
    <div class="max-w-4xl mx-auto sm:pt-20 ">
        <img src="{{ asset('storage/files/photos/'.$data->img) }}" class=" border-t-4 border-t-kuning " alt="{{ $title }}">
        <h1 class="text-4xl font-bold mt-8 px-4">{{$title}}</h1>
        <p class="mt-4 text-xl px-4">{{$description}}</p>
    </div>

    {{-- content --}}
    <div class="py-12 max-w-2xl mx-auto px-4 font-light prose">
        {!! (app()->getLocale() == 'en') ? $data->contentEN : $data->contentID !!}
    </div>


    {{-- related --}}



    <div class="max-w-5xl mx-auto px-4 mt-20">
        <h2 class="text-3xl font-bold">BERITA LAINYA</h2>
        <div class="flex sm:flex-row flex-col gap-6 w-full mt-10">
            @foreach ($related as $item)
            <div class="flex flex-col sm:w-6/12 w-full">
                <div>
                    <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{$item->title}}" class="h-72 w-full object-cover object-center">
                </div>
                <a class="font-light text-sm mt-4">
                    @php
                        $date = \Carbon\Carbon::parse($item->publishdate)->locale(App::getLocale());
                        $date->settings(['formatFunction' => 'translatedFormat']);
                        echo $date->format('d F Y');
                    @endphp</h1>
                </a>
                <a href="{{ route('detailaksi', [app()->getLocale(), $item->id, $item->slug]) }}" class="font-bold">{{ $item->title }}</a>

                <p class="mt-3 font-light text-sm">{{ $item->description }}</p>
            </div>
        @endforeach
        </div>

    </div>

    @include('partials.footer')
@endsection
