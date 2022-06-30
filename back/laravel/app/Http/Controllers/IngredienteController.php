<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingrediente;
use App\Exports\IngredientesExport;
use Maatwebsite\Excel\Facades\Excel;

class IngredienteController extends Controller
{
    //
    public function index()
    {
        $ingredientes = Ingrediente::All();
        return view('ingrediente.index')->with('ingredientes',$ingredientes);
    }
    public function create()
    {
        return view('ingrediente.create');
    }
    public function insert(Request $request)
    {
        //dd($request);
        $ingrediente = new Ingrediente();
        $ingrediente->nombre = $request->nombre;
        $ingrediente->save();
        return redirect('/ingredientes');
    }
    public function edit($id)
    {
        $ingrediente = Ingrediente::find($id);
        return view('ingrediente.edit')->with('ingrediente', $ingrediente);
    }
    public function update(Request $request,$id)
    {
        $ingrediente = Ingrediente::find($id);
        $ingrediente->nombre=$request->nombre;
        $ingrediente->save();
        return redirect('/ingredientes');
    }

    public function delete($id)
    {
        $ingrediente = Ingrediente::find($id);
        $ingrediente->delete();
        return redirect('/ingredientes');
    }

    public function export()
    {
        return Excel::download(new IngredientesExport, 'ingredientes.xlsx');
    }
    public function prueba()
    {
        $ingrediente=Ingrediente::with('tipo')->get();
        dd($ingrediente);
    }
    public function json()
    {
        $ingredientes= Ingrediente::all();
        return response()->json([
            'success'=>true,
            'ingredientes'=>$ingredientes
        ]);
        
    }
}
