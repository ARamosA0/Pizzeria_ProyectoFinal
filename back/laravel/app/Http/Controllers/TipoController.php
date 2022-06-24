<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use App\Models\Tipo;
use App\Models\TipoIngrediente;
use Illuminate\Http\Request;
use App\Exports\TipoExport;
use Maatwebsite\Excel\Facades\Excel;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::with('tipo_ingrediente.ingredientes')->get();
        //dd($tipos);
        return view('tipo.index')->with('tipos',$tipos);
    }
    public function create()
    {
        return view('tipo.create');
    }
    public function insert(Request $request)
    {
        $tipo = new Tipo();
        $tipo->nombre = $request->nombre;
        $tipo->precio = $request->precio;
        $tipo->link = $request->link;
        $tipo->rating=0;
        $tipo->save();
        return redirect('/tipos');
    }
    public function edit($id)
    {
        $edit = Tipo::find($id);
        return view('tipo.edit')->with('edit', $edit);
    }
    public function update(Request $request,$id)
    {
        $tipo = Tipo::find($id);
        $tipo->nombre=$request->nombre;
        $tipo->precio=$request->precio;
        $tipo->link = $request->link;
        $tipo->save();
        return redirect('/tipos');
    }
    public function delete($id)
    {
        $pizza_borrar = Tipo::find($id);
        $pizza_borrar->delete();
        TipoIngrediente::where('tipo_id', $id)->delete();
        return redirect('/tipos');
    }
    public function delete_ingrediente($id_pizza){
        return view('tipo_ingrediente.delete')->with('id_pizza',$id_pizza);
    }
    public function prueba()
    {
        $tipo=Tipo::with('ingredientes')->get();
        dd($tipo);
    }
    public function export()
    {
        return Excel::download(new TipoExport, 'tipo.xlsx');
    }

}
