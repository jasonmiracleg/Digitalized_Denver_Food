@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">

        <div class="flex items-center space-x-4 mb-8">
            <div>
                <img class="rounded-lg object-cover w-64 h-64" src="/image/{{ $stall->stallImage }}" alt="" />
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $stall->stallName }}</h1>
                <p class="mt-2 font-normal text-gray-700 dark:text-gray-400">{{ $stall->stallDescription }}</p>
            </div>
        </div>

        @if ($orders)
        <div class="mb-8">
            <h1 class="text-2xl font-bold">Here are some recent Orders you've made in {{ $stall->stallName }}</h1>
            <div class="grid grid-cols-8 gap-4 mt-8 max-h-96 overflow-y-auto">
                @foreach ($orders as $order)
                    <div class="block p-4 bg-white border border-gray-200 rounded-lg shadow">
                        <div>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
                                {{ $order->menu->menuName }}</h5>
                            <p class="ml-auto text-gray-500">{{ $order->menu->made->stallName }}</p>
                        </div>
                        <div>
                            <p class="font-normal text-gray-700">{{ $order->quantity }}x</p>
                            <p class="font-normal text-gray-700">Rp {{ number_format($order->totalPrice, 0, ',', '.') }},-</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

        <h3 class="text-2xl font-bold">Menus available in {{ $stall->stallName }}</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
            @foreach ($menus as $menu)
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <form action="{{ route('menuDetail', $menu) }}" method="GET">
                        @csrf
                        <a href="{{ route('menuDetail', $menu) }}">
                            <img class="rounded-t-lg object-cover w-full h-64" src="/image/{{ $menu->menuImage }}" alt="" />
                            <div class="p-5">
                                <div class="flex flex-row items-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $menu->menuName }}
                                    </h5>
                                    <p class="ml-auto text-gray-500">{{ $menu->made->stallName }}</p>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $menu->menuDescription }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp {{ number_format($menu->menuBasePrice, 0, ',', '.') }},-</p>
                            </div>
                        </a>
                    </form>
                </div>
            @endforeach
        </div>

    </div>
@endsection
