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
        Schema::create('juegosComprados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idJuego');
            $table->unsignedBigInteger('idCompra');
            $table->float('precioDelMomento');
            $table->timestamps();

            $table->foreign('idJuego')
                ->references('id')->on('juegos')
                ->onDelete('cascade');

            $table->foreign('idCompra')
                ->references('id')->on('compras')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegosComprados');
    }
};
