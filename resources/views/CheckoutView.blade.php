@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">
        @foreach ($cartItems as $cartItem)
        <div class="cart-item">
            <p>Cart ID: {{ $cartItem->cart_id }}</p>
            <p>Item ID: {{ $cartItem->id }}</p>
            <p>Quantity: {{ $cartItem->quantity }}</p>
            <p>Menu Name: {{ $cartItem->menu->menuName }}</p> <!-- Assuming the menu name column is 'name' -->
        </div>
        @endforeach

        <div>
            Finalize your Order ...
        </div>

        <form action="{{ route('createOrder') }}" method="post" class="row g-3">
            @csrf
            <button type="submit" class="btn btn-pink-color fw-bold w-100 mt-2">Finalize
                Order</button>
        </form>

    </div>
@endsection
