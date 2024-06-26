<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('totalPrice');
            $table->unsignedBigInteger('menuID')->index();
            $table->foreign('menuID')->on('menus')->references('id')->onUpdate('cascade');
            $table->unsignedBigInteger('cartID');
            $table->foreign('cartID')->references('id')->on('carts')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
