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
        Schema::create('categorizados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idJuego');
            $table->unsignedBigInteger('idCategoria');
            $table->timestamps();

            $table->foreign('idJuego')
                ->references('id')->on('juegos')
                ->onDelete('cascade');
                
            $table->foreign('idCategoria')
                ->references('id')->on('categorias')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorizados');
    }
};
