@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">
        @if ($cartItems->isEmpty())
            <h1>Cart is empty</h1>
        @else
            <h1 class="text-2xl font-bold mb-8">Here is your cart</h1>
            @foreach ($cartItems as $cartItem)
            <div class="cart-item">
                <div class="flex items-center space-x-4 mb-8">
                    <div>
                        <img class="rounded-xl object-cover w-64 h-64" src="/image/{{ $cartItem->menu->menuImage }}"/>
                    </div>
                    <div>
                        <p class="text-xl font-semibold">Menu Name: {{ $cartItem->menu->menuName }}</p> <!-- Assuming the menu name column is 'name' -->
                        <p class="text-l">Quantity: {{ $cartItem->quantity }}</p>
                    </div>
                </div>
                <hr class="w-screen h-0.5 my-8 bg-gray-200 border-0 rounded">
            </div>
            @endforeach

            <div class="flex items-center space-x-4 mb-8">
                <button class="bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"><a href="{{ route('stallsPage') }}">Browse more Menu</a></button>
                <form action="{{ route('checkout') }}" method="get">
                    <button type="submit" class="bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Proceed to Checkout</button>
                </form>
            </div>
        @endif
    </div>
@endsection
