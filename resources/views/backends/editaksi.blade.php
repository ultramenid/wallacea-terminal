@extends('layouts.dashboard')

@section('content')
    @include('partials.backendHeader')
    @include('partials.backendNav')
    <livewire:edit-aksi-component :id="$id" />
@endsection
