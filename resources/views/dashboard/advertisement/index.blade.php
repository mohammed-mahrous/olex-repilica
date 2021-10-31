@extends('adminlte::page')

@section('title', 'Advertisements')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>Advertisements</h1>
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
        @include('layouts.dashboard.filters.advertisements-filters')
    </div>

    {{ $dataTable->table(['width' => 'full']) }}

@endsection

@section('js')
    {{ $dataTable->scripts() }}
@stop
