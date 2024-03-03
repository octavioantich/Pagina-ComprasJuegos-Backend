<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Juego;

class Compra extends Model
{
    use HasFactory;

    public function juegosComprados(){
        return $this->belongsToMany(Juego::class,'juegosComprados','idCompra','idJuego')
                        ->withPivot('precioDelMomento');  
    }

    public function getPrecioTotalAttribute(){
        $precioTotal = 0;

        foreach($this->juegosComprados as $juegoComprado){
            $precioTotal += $juegoComprado->pivot->precioDelMomento;
            
        }

        return $precioTotal;
    }

}
