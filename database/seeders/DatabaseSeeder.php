<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Stall;
use App\Models\User;
use App\Models\Cart;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jason',
            'email' => 'jason@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        Cart::create([
            'userID' => 1,
        ]);

        Stall::create([
            'stallName' => 'Gloria',
            'stallDescription' => 'HOMEMADE NOODLES SINCE 1970',
            'stallImage' => 'GloriaLogo.jpeg'
        ]);

        Stall::create([
            'stallName' => 'ChiFry',
            'stallDescription' => 'Est. 2013
            🍯 Specialist Crispy Chicken Honey Sauce
            📍 100++ Outlet di Indonesia',
            'stallImage' => 'ChiFryLogo.png'
        ]);

        Stall::create([
            'stallName' => 'Chinese Food',
            'stallDescription' => 'taste so heavenly',
            'stallImage' => 'ChineseFoodLogo.jpg'
        ]);

        Stall::create([
            'stallName' => 'Cincau Station',
            'stallDescription' => 'Always New Always Fresh :)',
            'stallImage' => 'CincauStationLogo.jpg'
        ]);

        Menu::create([
            'stallID' => 1,
            'menuName' => 'Mie Pangsit Ayam',
            'menuBasePrice' => 23000,
            'menuDescription' => 'Mie ayam homemade yang dilengkapi dengan pangsit yang renyah',
            'menuImage' => 'PangsitMie.jpg'
        ]);

        Menu::create([
            'stallID' => 2,
            'menuName' => 'Tahu Crispy',
            'menuBasePrice' => 15000,
            'menuDescription' => 'Tahu yang digoreng tepung dan ditaburi dengan sedikit garam',
            'menuImage' => 'TahuCrispy.png'
        ]);

        Menu::create([
            'stallID' => 3,
            'menuName' => 'Chicken Katsu',
            'menuBasePrice' => 25000,
            'menuDescription' => 'Filet ayam yang diolah dengan tepung roti',
            'menuImage' => 'ChickenKatsu.jpeg'
        ]);

        Menu::create([
            'stallID' => 2,
            'menuName' => 'Kentang Goreng',
            'menuBasePrice' => 18000,
            'menuDescription' => 'Kentang yang cukup renyah dan dilengkapi dengan saos sambal',
            'menuImage' => 'KentangGoreng.jpg'
        ]);

        Menu::create([
            'stallID' => 4,
            'menuName' => 'Ayam Geprek',
            'menuBasePrice' => 20000,
            'menuDescription' => 'Ayam yang ditumbuk dengan ulekan sambal',
            'menuImage' => 'AyamGeprek.png'
        ]);

        Menu::create([
            'stallID' => 3,
            'menuName' => 'Nasi Goreng',
            'menuBasePrice' => 17000,
            'menuDescription' => 'Nasi goreng yang dilengkapi dengan sayuran dan ayam',
            'menuImage' => 'NasiGoreng.jpeg'
        ]);


    }
}
