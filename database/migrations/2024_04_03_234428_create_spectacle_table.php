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
    Schema::create('spectacles', function (Blueprint $table) { 
        $table->id();
        $table->unsignedBigInteger('idpiece');
        $table->date('datespectacle');
        $table->unsignedBigInteger('idsalle');
        $table->foreign('idpiece')->references('id')->on('pieces')->onDelete('restrict');
        $table->foreign('idsalle')->references('id')->on('salles')->onDelete('restrict');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spectacle');
    }
};
