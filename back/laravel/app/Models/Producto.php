<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Producto extends Eloquent
{
    use HasFactory;
    protected $fillable = [
        'idTipo',
        'tamano',
        'precio'
     ];
}
