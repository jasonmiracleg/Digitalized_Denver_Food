<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Stall;
use App\Models\OrderItems;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderItem;

class StallController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = OrderItem::whereHas('order', function ($query) use ($user) {
            $query->where('userID', $user->id);
        })->get();
        return view('StallsView', [
            'stalls' => Stall::all(),
            'menus' => Menu::all(),
            'orders' => $orders
        ]);
    }

    public function view(Stall $stall)
    {

        $user = Auth::user();
        $orders = OrderItem::whereHas('order', function ($query) use ($user) {
            $query->where('userID', $user->id);
        })
            ->whereHas('menu', function ($query) use ($stall) {
                $query->where('stallID', $stall->id);
            })
            ->get();


        $menus = Menu::where('stallID', $stall->id)->get();

        return view('DetailStallView', [
            'stall' => $stall,
            'menus' => $menus,
            'orders' => $orders,
        ]);
    }
}
