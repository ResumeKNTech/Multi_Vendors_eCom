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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_title');
            $table->string('slug')->unique();
            $table->text('product_description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('images');
            $table->text('images_gallery');
            $table->text('product_tags')->nullable();

            $table->decimal('price',8,2)->default(0);
            $table->decimal('offer_price',8,2)->default(0)->nullable();
            $table->dateTime('sales_begin')->nullable();
            $table->dateTime('sales_end')->nullable();

            $table->integer('stock');
            $table->enum('stock_status', ['in_stock', 'out_of_stock'])->default('in_stock');
            $table->enum('status', ['published', 'draft'])->default('published');

            $table->datetime('publish');
            $table->timestamps();

            // Foreign keys
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
