<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Invalid email']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
        }

        $user->update(['isLogin' => '1']);
        Auth::login($user);

        return redirect()->route('orderPage'); // redirect to your intended page
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            Auth::logout(); // Log out the user
            User::where('id', $user->id)->update(['isLogin' => '0']);
        }
    
        return redirect()->route('guest'); // Redirect to your home page or any other page
    }
}
