@extends('adminlte::page')

@section('title', 'Add user')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>users</h1>
    @stop

    @section('content')

        <div class="container ">
            @include('dashboard.users.create-form')
        </div>
    @endsection
