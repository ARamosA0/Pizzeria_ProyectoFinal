<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Ingrediente extends Eloquent
{
    use HasFactory;
    protected $table='ingrediente';
    public function tipo(){
        return $this->belongsToMany(Tipo::class, 'tipos_ingrediente', 'ingrediente_id', 'tipo_id');
    }
}
