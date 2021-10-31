@extends('adminlte::page')

@section('title', 'category')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1> edit {{ $category->name }} category</h1>
    @stop

    @section('content')
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="container ">
            @include('dashboard.category.edit-form')
        </div>
    @endsection
