@extends('layouts.indexLayout')

@section('meta')
    @include('partials.newsMeta')
@endsection

@section('content')
    @include('partials.infoterbaru')
    @include('partials.navbar')
    @include('partials.categorytop')

    {{-- image, title, description --}}
    <div class="max-w-4xl mx-auto sm:pt-20 px-4">
        <div class=" border-t-4 border-t-kuning " >
            <h1 class="text-4xl font-bold mt-2 px-4">{{$title}}</h1>
        </div>
        <p class="mt-10 text-xl px-4">{{$description}}</p>
    </div>
    <div class="max-w-5xl mx-auto mt-20">
        <div class="_df_book"  id="detailpdf" source="{{ asset('storage/files/reports/'.(app()->getLocale() == 'en' ? $data->fileEN: $data->fileID)) }}"></div>
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
                    <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="Wallacea Terminal" class="h-72 w-full object-cover object-center">
                </div>
                <a class="font-light text-sm mt-4">
                    @php
                        $date = \Carbon\Carbon::parse($item->publishdate)->locale(App::getLocale());
                        $date->settings(['formatFunction' => 'translatedFormat']);
                        echo $date->format('d F Y');
                    @endphp</h1>
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

    @include('partials.footer')
    @push('scripts')
        <script>
            console.log('ada')
            var option_detailpdf = {
                scrollWheel: false,
                height: '794'
            }
        </script>
    @endpush
@endsection
