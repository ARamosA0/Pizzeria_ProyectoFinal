@extends('layouts.plantillabase')
@section('contenido')
    <h2>AGREGAR INGREDIENTE</h2>
    <form action="/ingredientes/insert" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre del ingrediente</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <button type="submit" class="btn btn-secondary yellow">Guardar ingrediente</button>
    </form>
@endsection
