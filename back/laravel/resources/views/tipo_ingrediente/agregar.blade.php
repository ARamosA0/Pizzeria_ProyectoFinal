@extends('layouts.plantillabase')
@section('contenido')
    <h2>AGREGAR INGREDIENTE A LA PIZZA</h2>
    <form action="/tipos/insertingrediente" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID DE LA PIZZA</label>
            <input type="text" class="form-control" id="tipo_id" name="tipo_id">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID DEL INGREDIENTE</label>
            <input type="text" class="form-control" id="ingrediente_id" name="ingrediente_id">
        </div>
        <button type="submit" class="btn btn-secondary">Guardar ingrediente</button>
    </form>
@endsection
