<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductoExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    public function export() 
    {
        return Excel::download(new ProductoExport, 'producto.xlsx');
    }
}
