@extends('layouts.store')

@section('title')
    <title>
        home
    </title>
@endsection
@section('content')
    @include('layouts.store-nav')
    <div class=" container shadow-lg mx-auto  w-full mt-10">
        <div class=" bg-transparent">
            <div class="holder mx-auto lg:w-11/12 w-full grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-6">
                @foreach ($advertisements as $ad)
                    <div class=" transition duration-300 mb-10 m-2 hover:bg-gray-200 p-5 rounded-lg  bg-gray-100 relative">
                        <img class="w-full" src={{ $ad->image }} alt="image" />

                        <div class="desc p-4 text-gray-800">
                            <a href="{{ route('store.advertisement.show', ['category' => $ad->category, 'advertisement' => $ad]) }}"
                                target="_new"
                                class="title font-bold block cursor-pointer hover:underline">{{ $ad->name }}</a>
                            <a href="{{ route('store.user.show', $ad->user) }}" target="_new"
                                class="badge bg-indigo-500 text-blue-100 rounded px-1 text-xs font-bold cursor-pointer">{{ '@' . $ad->owner }}</a>
                            <span class="text-sm block  py-2 border-gray-400 mb-2">{{ $ad->category->name }}</span>
                            <span class="text-sm block py-2 border-gray-400 mb-2">{{ $ad->discription }}</span>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
@endsection
