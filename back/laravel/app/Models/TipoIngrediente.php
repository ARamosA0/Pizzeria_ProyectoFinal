<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TipoIngrediente extends Eloquent
{
    use HasFactory;
    protected $table='tipos_ingrediente';

    public function ingredientes(){
        return $this->hasMany(Ingrediente::class,'_id','ingrediente_id');
    }
    public function tipos(){
        return $this->hasMany(Tipo::class, '_id', 'tipo_id');
    }
}
