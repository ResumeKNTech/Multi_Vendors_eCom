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
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_price', 15, 2)->default(0);
            $table->enum('status', ['pending', 'shipped', 'cancelled'])->default('pending');
            $table->text('shipping_address');
            $table->enum('payment_method', ['cash', 'credit_card'])->default('cash');
            $table->integer('distance')->nullable();  // Distance in kilometers
            $table->decimal('shipping_fee', 15, 2)->default(0);  // This should be calculated based on 'distance' in the application logic
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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
