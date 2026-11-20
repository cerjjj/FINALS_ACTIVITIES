<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('status')->default('Active');
            $table->timestamps();
        });

        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_accounts');
        Schema::dropIfExists('customer_accounts');
    }
};
