@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')
    @include('partials.infoterbaru')
    @include('partials.navbar')
    <!-- category top -->
    <div class="border-b border-t border-kuning py-2 flex justify-center gap-12 font-light ">
            @foreach ($categories as $item)
                <a href="{{ route('categoryaksi', [app()->getLocale(), $item->category]) }}" class="{{ ($paramcategory == $item->category) ? 'font-bold' : null ; }}" href="{{ route('categoryriset', [app()->getLocale(), $item->category]) }}">{{$item->category}}</a>
            @endforeach
    </div>
    <div class="max-w-6xl mx-auto sm:pt-20 px-4">
        <div class=" border-t-4 border-t-kuning " >
            <h1 class="text-4xl font-bold mt-2 px-4">AKSI</h1>
        </div>
        <p class="mt-10 sm:text-xl text-sm px-4 mb-20">Isi ini sama dengan keterangan di home. Secto id quo doloremodis idelitius, inullor emporeribus repedic
            aeperrorror re explaud andenesequis et quidebis pro et, non nus corpossequas sunt que none rem net ipsandu
            sciant fugitat undanti aestion essitaturem et dolum lignihicia sinus mo tem venis andipidebit el id mo ma
            sequam ut res volorro berum volumen daectintia dolor a nimusae et doluptatur, non perspel ipicient.</p>

            <livewire:frontend-category-aksi :paramcategory='$paramcategory' />
    </div>




    @include('partials.footer')
@endsection
