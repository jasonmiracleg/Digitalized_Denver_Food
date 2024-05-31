<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Stall;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class StallController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('userID', $user->id)->orderBy('created_at', 'desc')->take(8)->get();;
        return view('StallsView', [
            'stalls' => Stall::all(),
            'menus' => Menu::all(),
            'orders' => $orders
        ]);
    }

    public function view(Stall $stall){

        $user = Auth::user();
        $orders = Order::where('userID', $user->id)
                    ->whereHas('detailMenu', function ($query) use ($stall) {
                        $query->where('stallID', $stall->id);
                    })
                    ->orderBy('created_at', 'desc')
                    ->take(8)
                    ->get();

        $menus = Menu::where('stallID', $stall->id)->get();

        return view('StallView', [
            'stall' => $stall,
            'menus' => $menus,
            'orders' => $orders,
        ]);
    }
}
