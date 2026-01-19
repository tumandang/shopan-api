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

            $table->foreignId('request_id')
                ->constrained('requests')
                ->onDelete('cascade');

            $table->string('payment_provider')->default('stripe');
            $table->string('payment_intent_id')->unique();
            $table->string('checkout_session_id')->unique();

            $table->decimal('amount_myr', 10, 2);

            $table->enum('status', [
                'pending_payment',   
                'paid',             
                'processing',        
                'shipped',          
                'completed',         
                'refunded',          
                'cancelled'         
            ])->default('pending_payment');

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
