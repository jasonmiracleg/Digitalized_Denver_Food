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
            <<div class="form-group col-md-12">
                <label for="orderType">Order Type:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="orderType" id="dineIn" value="dine_in" required>
                    <label class="form-check-label" for="dineIn">
                        Dine In
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="orderType" id="takeaway" value="takeaway" required>
                    <label class="form-check-label" for="takeaway">
                        Takeaway
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-pink-color fw-bold w-100 mt-2">Finalize
                Order</button>
        </form>

    </div>
@endsection
