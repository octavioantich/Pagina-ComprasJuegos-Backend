<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Juego;

class Desarrollador extends Model
{
    use HasFactory;

    protected $table = 'desarrolladores';
    
    public function juegosDesarrollados()
    {
        return $this->hasMany(Juego::class, 'idDesarrollador');
    }

}
