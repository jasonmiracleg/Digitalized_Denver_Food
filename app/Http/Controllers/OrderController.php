<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user();
        Order::create([
            'userID' => $user->id,
            'menuID' => $request->menuID,
            'quantity' => $request->quantity ?? 1,
            'totalPrice' => $request->basePrice * ($request->quantity ?? 1),
            'status' => 'Ordered'
        ]);

        session()->flash('alert', 'Order placed successfully!');

        return redirect()->route('orderPage');
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
