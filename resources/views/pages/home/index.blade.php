@extends('layouts.app')
@section('content')
    <h1>Home</h1>
    <p>This is the home page</p>
    @include('component._alert')

    @livewire('users-index')
@endsection
