<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Desarrollador;

class Juego extends Model
{
    use HasFactory;

    public function categorias(){
        return $this->belongsToMany(Categoria::class,'categorizados','idJuego','idCategoria');   
    }

    public static function todasCategorias() {
        return Categoria::all();
    }

    public function desarrollador()
    {
        return $this->belongsTo(Desarrollador::class, 'idDesarrollador', 'id');
    }

}
