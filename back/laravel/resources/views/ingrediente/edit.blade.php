@extends('layouts.plantillabase')
@section('contenido')
    <h2>MODIFICAR INGREDIENTE</h2>
    <form action="/ingredientes/update/{{$ingrediente->_id}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre del ingrediente</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$ingrediente->nombre}}">
        </div>
        <button type="submit" class="btn btn-secondary">Guardar ingrediente</button>
    </form>
@endsection
