@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">
        <div>
            <h1 class="text-2xl font-bold">Denver Food Menus</h1>
        </div>
        <div class="flex flex-wrap justify-between w-full mb-8">
            @foreach ($menus as $menu)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow mt-8">
                    <form action="{{ route('menuDetail', $menu) }}" method="GET">
                        @csrf
                        <a href="{{ route('menuDetail', $menu) }}">
                            <img class="rounded-t-lg object-cover w-full h-64" src="image/{{ $menu->menuImage }}"
                                alt="" />
                            <div class="p-5">
                                <div class="flex flex-row items-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $menu->menuName }}</h5>
                                    <p class="ml-auto text-gray-500">{{ $menu->made->stallName }}</p>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $menu->menuDescription }}
                                </p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp
                                    {{ number_format($menu->menuBasePrice, 0, ',', '.') }},-</p>
                            </div>
                        </a>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
