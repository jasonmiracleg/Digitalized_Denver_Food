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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID')->index();
            $table->foreign('userID')->on('users')->references('id')->onUpdate('cascade');
            $table->unsignedBigInteger('menuID')->index();
            $table->foreign('menuID')->on('menus')->references('id')->onUpdate('cascade');
            $table->integer('quantity');
            $table->float('totalPrice');
            $table->enum('status', ['Ordered', 'In-Progress', 'Ready for pick-up', 'Cancelled', 'Awaiting Payment']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
