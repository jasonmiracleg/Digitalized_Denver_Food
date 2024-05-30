@extends('layouts.app')

@section('content')
    <div class="max-w-screen-xl p-4 max-w-screen-xl mx-auto pt-24 flex flex-row relative">
        <div>
            <img class="rounded-lg object-cover w-auto h-96" src="/image/{{ $menuEdit->menuImage }}" />
        </div>
        <div class="w-full">
            <form method="POST" action="{{ route('createOrder') }}">
                @csrf
                <div class="ms-8 flex gap-y-3 flex-col">
                    <h1 class="text-3xl font-bold">{{ $menuEdit->menuName }}</h1>
                    <p class="text-2xl">{{ $menuEdit->made->stallName }}</p>
                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400">{{ $menuEdit->menuDescription }}
                    </p>
                    <p class="font-normal text-xl text-gray-700 dark:text-gray-400">Rp
                        <span id="price">{{ number_format($menuEdit->menuBasePrice, 0, ',', '.') }}</span>,-
                    </p>
                    <div class="flex items-center rounded-md border-yellow-200 text-right">
                        <button type="button"
                            class="bg-yellow-200 font-bold py-1.5 px-4 rounded text-[18px] decrement">-</button>
                        <span class="quantity text-xl font-bold px-8" id="quantity">1</span>
                        <button type="button"
                            class="bg-yellow-200 font-bold py-1.5 px-4 rounded text-[18px] increment">+</button>
                    </div>
                    <input type="hidden" name="menuID" value="{{ $menuEdit->id }}">
                    <input type="hidden" name="quantity" id="quantityInput" value="1">
                    <input type="hidden" name="basePrice" value="{{ $menuEdit->menuBasePrice }}">
                    <button type="submit"
                        class="bg-green-500 text-white py-2 px-4 rounded-lg font-bold absolute bottom-4">Place an
                        Order</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const incrementButton = document.querySelector('.increment');
            const decrementButton = document.querySelector('.decrement');
            const quantityElement = document.getElementById('quantity');
            const quantityInput = document.getElementById('quantityInput');
            const priceElement = document.getElementById('price');

            let quantity = 1;
            let basePrice = {{ $menuEdit->menuBasePrice }};

            function updatePrice() {
                const totalPrice = quantity * basePrice;
                priceElement.textContent = new Intl.NumberFormat('id-ID').format(totalPrice);
                quantityInput.value = quantity; // Update the hidden input field value
            }

            incrementButton.addEventListener('click', function() {
                quantity++;
                quantityElement.textContent = quantity;
                updatePrice();
            });

            decrementButton.addEventListener('click', function() {
                if (quantity > 1) {
                    quantity--;
                    quantityElement.textContent = quantity;
                    updatePrice();
                }
            });
        });
    </script>
@endsection
