@extends('layouts.dashboard')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-eksternal-component :id="$detailnews->id" />
@endsection
