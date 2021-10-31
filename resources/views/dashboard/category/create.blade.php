@extends('adminlte::page')

@section('title', 'Add Category')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>Categories</h1>
    @stop

    @section('content')

        <div class="container ">
            @include('dashboard.category.create-form')
        </div>
    @endsection
