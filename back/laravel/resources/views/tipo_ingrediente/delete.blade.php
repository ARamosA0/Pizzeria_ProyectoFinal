@extends('layouts.plantillabase')
@section('contenido')
    <h2>ELIMINAR INGREDIENTE DE LA PIZZA</h2>
    <form action="/tipos/deleteingrediente" method="post">
        @csrf
        <div class="mb-3">
            <label> ID DE LA PIZZA</label><br>
            <input type="text" class="form-control" id="tipo_id" name="tipo_id" value="{{$id_pizza}}">
        </div>
        <div class="mb-3">
            <label class="form-label">ID DEL INGREDIENTE QUE DESEA ELIMINAR</label>
            <input type="text" class="form-control" id="ingrediente_id" name="ingrediente_id">
        </div>
        <button type="submit" class="btn btn-secondary">Eliminar ingrediente de la pizza</button>
    </form>
@endsection
