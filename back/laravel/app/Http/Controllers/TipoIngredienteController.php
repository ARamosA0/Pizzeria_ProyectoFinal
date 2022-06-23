<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\TipoIngrediente;
use Illuminate\Http\Request;

class TipoIngredienteController extends Controller
{
    public function index()
    {
        //$ingredientesdepizza=TipoIngrediente::find($ingredientes, ['ingrediente_id']);
        //$ingredientesdepizza = TipoIngrediente::with('tipo_id:nombre')->get();
        //$ingredientesdepizza = TipoIngrediente::where('tipo_id', '62afa809e21e0000de003f86')->get();
        //$ingredientesdepizza = TipoIngrediente::all();
        $ingredientesdepizza = TipoIngrediente::with('tipos')->get();
        //dd($ingredientesdepizza);
        return view('tipo_ingrediente.index')->with('ingredientesdepizza',$ingredientesdepizza);
    }
    public function agregar($id)
    {
        //$tipo_ingrediente = TipoIngrediente::where('tipo_id',$id)->get()->toArray();
        //$tipo_ingrediente=TipoIngrediente::select('tipo_id')->get();
        //$tipo_ingrediente=TipoIngrediente::find();
        //$tipo_ingrediente = TipoIngrediente::all();
        //a partir de aca prueba
        //$tipo_ingrediente = TipoIngrediente::find($id);
        return view('tipo_ingrediente.agregar');
        //return view('tipo_ingrediente.agregar')->with('tipo_ingrediente', $tipo_ingrediente);
    }
    public function guardar(Request $request)
    {
        $tipo_ingrediente = new TipoIngrediente();
        $tipo_ingrediente->tipo_id= $request->tipo_id;
        $tipo_ingrediente->ingrediente_id=$request->ingrediente_id;
        $tipo_ingrediente->save();
        return redirect('/tipos');
    }
}