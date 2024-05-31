<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('userID', $user->id)->orderBy('created_at', 'desc')->take(8)->get();;
        return view('OrderView', [
            'menus' => Menu::all(),
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $cart = $user->cart;
        $cartItems = $cart->cartItems;

        return view('CheckoutView', [
            'cart' => $cart,
            'cartItems' => $cartItems,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

        $user = Auth::user();
        $cart = $user->cart;
        $cartItems = $cart->cartItems;
        $totalamount = 0;

        // contoh ambil data
        // $deliveryDate = $request->input('delivery_date');

        foreach ($cartItems as $cartItem) {
            $totalamount += $cartItem->totalPrice;
        }

        $user = Auth::user();
        $order = Order::create([
            'userID' => $user->id,
            'totalPrice' => $totalamount,
            'orderType' => $request->input('orderType')
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'quantity' => $cartItem->quantity,
                'totalPrice' => $cartItem->totalPrice, // Ensure totalPrice is included here
                'order_id' => $order->id,
                'menuID' => $cartItem->menuID,
            ]);

            $cartItem->delete();
        }


        session()->flash('alert', 'Order placed successfully!');

        return redirect()->route('stallsPage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
