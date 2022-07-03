<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Tipo;
use App\Models\TipoIngrediente;
use Illuminate\Http\Request;

class TipoIngredienteController extends Controller
{
    public function index()
    {
        $ingredientesdepizza = TipoIngrediente::with('tipos')->get();
        //dd($ingredientesdepizza);
        return view('tipo_ingrediente.index')->with('ingredientesdepizza',$ingredientesdepizza);
    }
    public function agregar($tipo_id)
    {
        //$tipo_ingrediente = TipoIngrediente::where('tipo_id',$id)->get()->toArray();
        //$tipo_ingrediente=TipoIngrediente::select('tipo_id')->get();
        //$tipo_ingrediente=TipoIngrediente::find();
        //$tipo_ingrediente = TipoIngrediente::all();
        //a partir de aca prueba
        //$tipo_ingrediente = TipoIngrediente::find($id);
        $ingredientes=Ingrediente::all();
        return view('tipo_ingrediente.agregar')->with('tipo_id', $tipo_id)->with('ingredientes', $ingredientes);
        //return view('tipo_ingrediente.agregar')->with('tipo_ingrediente', $tipo_ingrediente);
    }
    public function guardar(Request $request)
    {
        foreach($_POST['ingredientes'] as $ingredientes){
            $tipo_ingrediente = new TipoIngrediente();
            $tipo_ingrediente->tipo_id = $request->tipo_id;
            $tipo_ingrediente->ingrediente_id = $ingredientes;
            $tipo_ingrediente->save();
        }
        return redirect('/tipos');
    }

    public function delete(Request $request){
        foreach($_POST['ingredientes'] as $ingredientes){
            $buscar_relacion=TipoIngrediente::where('tipo_id', $request->tipo_id)->where('ingrediente_id', $ingredientes)->get(['_id']);
            foreach($buscar_relacion as $buscar)
            {
                $borrar=TipoIngrediente::find($buscar['_id']);
                $borrar->delete();
            }
        }
        return redirect('/tipos');
    }

    public function getTipoIngrediente()
    {
        $tipo_ingrediente = TipoIngrediente::all();
        return response()->json([
            'success'=>true,
            'content'=>$tipo_ingrediente
        ]);
    }
}
