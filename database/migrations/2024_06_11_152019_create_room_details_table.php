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
        Schema::create('room_details', function (Blueprint $table) {
            $table->id();
            
            // Kolom foreign key harus menggunakan tipe unsignedBigInteger
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('material_id')->nullable(); 
            $table->unsignedBigInteger('tool_id')->nullable(); 
            
            // Kolom stok
            $table->integer('total_stocks')->default(0); 
            $table->integer('current_stocks')->default(0); 
            $table->timestamps();
            
            // Definisi foreign key
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_details');
    }
};