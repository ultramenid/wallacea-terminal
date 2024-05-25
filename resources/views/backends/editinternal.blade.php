@extends('layouts.dashboard')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-internal-component :id="$detailnews->id" />
@endsection
