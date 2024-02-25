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
        Schema::create('pizza_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pizza_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->integer('quantity');
            $table->decimal('t_price', 8, 2);
            $table->timestamps();

            $table->index('pizza_id', 'pizza_order_pizza_idx');
            $table->index('order_id', 'pizza_order_order_idx');

            $table->foreign('pizza_id', 'pizza_order_pizza_fk')->on('pizzas')->references('id');
            $table->foreign('order_id', 'pizza_order_order_fk')->on('orders')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_orders');
    }
};
