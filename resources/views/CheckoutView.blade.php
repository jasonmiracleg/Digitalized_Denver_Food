@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24">
        <h1 class="text-2xl font-bold mb-8">Your order</h1>

        @foreach ($cartItems as $cartItem)
        <div class="flex items-center space-x-4 mb-8">
            <div>
                <img class="rounded-xl object-cover w-64 h-64" src="/image/{{ $cartItem->menu->menuImage }}"/>
            </div>
            <div>
                <p class="text-xl font-semibold">Menu Name: {{ $cartItem->menu->menuName }}</p> <!-- Assuming the menu name column is 'name' -->
                <p class="text-l">Quantity: {{ $cartItem->quantity }}</p>
            </div>
        </div>
        @endforeach

        <hr class="w-screen h-0.5 my-8 bg-gray-200 border-0 rounded">
        <h1 class="text-2xl font-bold mb-8">Finalize your Order</h1>

        <form action="{{ route('createOrder') }}" method="post" class="row g-3">
            @csrf
            <div class="form-group col-md-12">
                <label class="text-lg" for="orderType">Order Type :</label>
                <div class="form-check mt-1">
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

            <button type="submit" class="mt-8 bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Finalize Order</button>
        </form>

    </div>
@endsection
