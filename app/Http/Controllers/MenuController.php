<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function edit(Menu $menu){
        $menuEdit = Menu::where('id', $menu->id)->first();
        return view('DetailMenuView', compact('menuEdit'));
    }
}
