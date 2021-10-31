@extends('adminlte::page')

@section('title', 'users')

@section('content_header')
    <div class="d-flex flex-row justify-content-between">
        <h1>Users</h1>
        <div class="float-right">
            <form action="{{ route('users.create') }}" method="get">
                <x-adminlte-button label="Add new Admin" theme="primary" type="submit" />
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
            @include('layouts.dashboard.filters.users-filters')
        </div>
        {{ $dataTable->table(['width' => 'full']) }}
    @endsection

    @section('js')
        {{ $dataTable->scripts() }}
    @stop
