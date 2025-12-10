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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            $table->string('address1')->nullable();   
            $table->string('address2')->nullable();   
            $table->string('address3')->nullable();   

            $table->string('postcode')->nullable();   
            $table->string('city')->nullable();      
            $table->string('state')->nullable();     
            $table->string('country')->default('Malaysia'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
