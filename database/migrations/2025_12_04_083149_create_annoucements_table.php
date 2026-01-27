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
        Schema::create('annoucements', function (Blueprint $table) {
            $table->id();
            $table->string("title",50);
            $table->longText("summary");
            $table->longText("description");
            $table->string("image",220)-> nullable();
            $table->enum('status',['Draft','Published','Pending Review'])->default('Draft');
            $table->foreignId("user_id")->constrained("users");
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('annoucements');
    }
};
