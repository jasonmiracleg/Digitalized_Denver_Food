@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">
        @if ($orders && count($orders) > 0)
            <div class="mb-8">
                <h1 class="text-2xl font-bold">Here are some recent Orders you've made</h1>
                <div class="grid grid-cols-8 gap-4 mt-8 max-h-96 overflow-y-auto">
                    @foreach ($orders as $order)
                        <div class="block p-4 bg-white border border-gray-200 rounded-lg shadow">
                            <div>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">
                                    {{ $order->detailMenu->menuName }}</h5>
                                <p class="ml-auto text-gray-500">{{ $order->detailMenu->made->stallName }}</p>
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

        <div>
            <h1 class="text-2xl font-bold">Denver Food Stalls</h1>
            <p>Check out the many different stalls in Denver Food!</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full mb-8">
            @foreach($stalls as $stall)
                <div class="bg-white border border-gray-200 rounded-lg shadow mt-8">
                    <form action="{{ route('stallPage', $stall) }}" method="GET">
                        @csrf
                        <a href="{{ route('stallPage', $stall) }}">
                            <img class="rounded-t-lg object-cover w-full h-64" src="/image/{{ $stall->stallImage }}"
                                alt="" />
                            <div class="p-5">
                                <div class="flex flex-row items-center">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $stall->stallName }}</h5>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $stall->stallDescription }}
                                </p>

                            </div>
                        </a>
                    </form>
                </div>
            @endforeach
        </div>

    </div>
@endsection
