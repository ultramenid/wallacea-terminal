@extends('layouts.dashboard')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <div class="max-w-6xl mx-auto px-6 md:px-8 sm:py-16 py-8 min-h-screen">
    <livewire:risets-component />
    </div>
@endsection
