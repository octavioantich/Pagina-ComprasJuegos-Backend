<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Juego;

class Categoria extends Model
{
    use HasFactory;

    public function juegos(){
        return $this->belongsToMany(Juego::class,'categorizados','idCategoria','idJuego');   
    }
}
