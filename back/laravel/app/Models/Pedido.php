<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Eloquent
{
    use HasFactory;
    protected $fillable = [
        'idProducto',
        'idUsuario',
        'costoTotal',
     ];
}
