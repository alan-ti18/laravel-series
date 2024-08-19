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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number');
            // $table->unsignedBigInteger('series_id');
            // $table->foreign('series_id')->references('id')->on('series');
            $table->foreignId('series_id')->constrained('series') // esta linha substitui estas duas de cima.
                ->onDelete('cascade'); // quando a serie for excluída, o relacionamento com os episódios também será excluído.
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
