@extends('layouts.dashboard')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:add-eksternal-component />
@endsection
