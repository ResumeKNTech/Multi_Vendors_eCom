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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_image')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('gender', ['men', 'woman'])->default('men');
            $table->string('short_bio')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();


            $table->enum('type_user', ['customer', 'vendor','admin'])->default('customer');

            $table->string('link_fb')->nullable();
            $table->string('link_github')->nullable();
            $table->string('link_zalo')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
