<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tipo extends Eloquent
{
    use HasFactory;
    protected $table='tipo';
    public function ingrediente(){
        return $this->belongsToMany(Ingrediente::class, 'tipos_ingrediente', 'tipo_id', 'ingrediente_id');
    }
    public function tipo_ingrediente(){
        return $this->hasMany(TipoIngrediente::class, 'tipo_id','_id');
    }
}
