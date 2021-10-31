@extends('layouts.store')

@section('title')
    <title>
        {{ $Category->name }}
    </title>
@endsection
@section('content')
    @include('layouts.store-nav')
    <div class=" container shadow-lg mx-auto  w-full mt-10">
        <div class="relative">
            <div class="fixed lg:left-0 sm:left-5 z-10 sm:w-12  md:top-28 lg:top-28 sm:top-20">
                @include('layouts.store-filters')
            </div>
        </div>
        <div class="bg-transparent">
            <div class="heading text-left font-bold text-2xl m-5 text-black ">{{ $Category->name }}</div>
            <div class="holder mx-auto lg:w-11/12 w-full grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-6">
                @foreach ($advertisements as $ad)

                    <div class=" transition duration-300 mb-10 m-2 hover:bg-gray-200 p-5 rounded-lg  bg-gray-100 relative">
                        <a href="{{ route('store.advertisement.show', ['category' => $Category, 'advertisement' => $ad]) }}"
                            class="cursor-pointer">
                            <img class=" w-full" src={{ asset("images/$ad->image") }} alt="image" />
                        </a>
                        <div class="desc p-4 text-gray-800">
                            <a href="{{ route('store.advertisement.show', ['category' => $Category, 'advertisement' => $ad]) }}"
                                target="_new"
                                class="title font-bold block cursor-pointer hover:underline">{{ $ad->name }}</a>
                            <a href="{{ route('store.user.show', $ad->user) }}" target="_new"
                                class="badge bg-indigo-500 text-blue-100 rounded px-1 text-xs font-bold cursor-pointer">{{ '@' . $ad->owner }}</a>
                            <span class="description text-sm block py-2 border-gray-400 mb-2">{{ $ad->discription }}
                            </span>
                            <span class="description text-sm block py-2 border-gray-400 mb-2">
                                @foreach ($ad->tags as $tag)
                                    {{ $tag->name . ' , ' }}
                                @endforeach
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $advertisements->withQueryString()->links() }}


        </div>
    </div>
@endsection
