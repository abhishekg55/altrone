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
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->tinyInteger('status')->default(false)->comment('0 => Pending, 1 => Transit, 2 => Delivered');
            $table->tinyInteger('payment_status')->default(false)->comment('0 => Pending, 1 => Paid, 2 => Cancelled');
            $table->timestamp('delivery_at')->nullable();
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
