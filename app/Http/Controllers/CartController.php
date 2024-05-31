<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $cartItems = $cart->cartItems()->get();

        return view('CartView', [
            'cart' => $cart,
            'cartItems' => $cartItems,
        ]);
    }
}
