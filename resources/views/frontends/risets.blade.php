@extends('layouts.indexLayout')

@section('meta')
    @include('partials.indexMeta')
@endsection

@section('content')
    @include('partials.infoterbaru')
    @include('partials.navbar')
    @include('partials.categorytop')
    <div class="max-w-6xl mx-auto sm:pt-20 px-4">
        <div class=" border-t-4 border-t-kuning " >
            <h1 class="text-4xl font-bold mt-2 px-4">RISETS</h1>
        </div>
        <p class="mt-10 sm:text-xl text-sm px-4 mb-20">Laman ini berisi kajian kolaborasi antara Auriga dengan peneliti dan akademisi di wilayah yang mencakup wilayah Wallacea</p>

            <livewire:frontend-risets />
    </div>




    @include('partials.footer')
@endsection
