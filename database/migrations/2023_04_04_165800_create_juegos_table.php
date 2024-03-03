<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('juegos', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('descripcion')->nullable();
        $table->string('imagenUrl')->nullable();
        $table->float('precio');
        $table->unsignedBigInteger('idDesarrollador');
       
        $table->foreign('idDesarrollador')
            ->references('id')
            ->on('desarrolladores')
            ->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('juegos');
}

};
