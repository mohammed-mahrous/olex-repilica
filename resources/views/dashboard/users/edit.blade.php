@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1> users
        </h1>
    @stop

    @section('content')
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="container ">
            @include('dashboard.users.edit-form')
        </div>
    @endsection
