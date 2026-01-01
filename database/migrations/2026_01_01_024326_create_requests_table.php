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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('product_url');
            $table->string('product_name');
            $table->string('market_name');
            $table->integer('quantity');
            $table->decimal('product_price',10,2);
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('model')->nullable();
            $table->string('product_image')->nullable();
            $table->longText('customer_notes')->nullable();
            $table->enum('status', ['new', 'quoted', 'pending_payment', 'paid', 'processing', 'completed', 'cancelled'])->default('new');
            $table->longText('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
