<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemsController extends Controller
{
    public function store(Request $request)
    {

        $user = Auth::user();
        $cart = $user->cart;

        CartItem::create([
            'userID' => $user->id,
            'menuID' => $request->menuID,
            'quantity' => $request->quantity ?? 1,
            'totalPrice' => $request->basePrice * ($request->quantity ?? 1),
            'cart_id' => $cart->id
        ]);

        return redirect()->route('cartPage')->with('success', 'Product added to cart successfully');
    }

    public function update(Request $request, CartItem $cartitem)
    {
        $cartitem->update([
            'quantity' => $request->input('quantity'),
            'note' => $request->input('note', ''),
        ]);

        return redirect()->route('cart')->with('success', 'Cart item updated successfully');
    }

    public function destroy(CartItem $cartitem)
    {
        $cartitem->delete();
        return redirect()->route('cart');
    }
}
