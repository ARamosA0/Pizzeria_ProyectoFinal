<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductoExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Producto;
use App\Models\Ingrediente;
use App\Models\Tipo;
use App\Models\TipoIngrediente;

class ProductoController extends Controller
{

    public function getProductos()
    {
        $productos = Producto::all();
        return response()->json([
            'success'=>true,
            'content'=>$productos
        ]);
    }

    public function postProductos()
    {
        $productos = new Producto();
        $producto->
        $producto->tamano = $request->tamano;
        $producto->precio = $request->precio;
    }

    public function export() 
    {
        return Excel::download(new ProductoExport, 'producto.xlsx');
    }
}
