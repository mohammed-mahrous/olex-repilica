@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <div class="d-flex flex-row justify-content-between mb-5 pb-2 border-3 border-bottom border-primary">
        <h1>Categories</h1>
        <div class="float-right">
            <form action="{{ route('categories.create') }}" method="get">
                <x-adminlte-button label="Add new" theme="primary" type="submit" />
            </form>
        </div>
    @stop

    @section('content')
        @if (session()->has('success'))

            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="container ">
            @include('layouts.dashboard.filters.categories-filters')
        </div>

        {{ $dataTable->table(['class' => 'w-100 h-100 m-5'], true) }}
    @endsection

    @section('js')
        {{ $dataTable->scripts() }}
    @stop
