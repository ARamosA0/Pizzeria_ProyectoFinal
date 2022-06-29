<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Producto extends Eloquent
{
    use HasFactory;
    protected $table = 'producto'; 

    public function tipo(){
        return $this->hasMany(TipoIngrediente::class,'_id','ingrediente_id');
    }

    
    public function pedido(){
        return $this->belongsToMany(Pedido::class, 'pedido', 'pedido_id');
    }

}
