@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">
        @if ($cartItems->isEmpty())
            <h1>Cart is empty</h1>
        @else
            <h1>Here is your cart.</h1>
            @foreach ($cartItems as $cartItem)
            <div class="cart-item">
                <p>Cart ID: {{ $cartItem->cart_id }}</p>
                <p>Item ID: {{ $cartItem->id }}</p>
                <p>Quantity: {{ $cartItem->quantity }}</p>
                <p>Menu Name: {{ $cartItem->menu->menuName }}</p> <!-- Assuming the menu name column is 'name' -->
            </div>
            @endforeach

            <form action="{{ route('checkout') }}" method="get">
                <button type="submit" class="btn btn-pink-color fw-bold w-100">Proceed to
                    Checkout</button>
            </form>
        @endif
    </div>
@endsection
