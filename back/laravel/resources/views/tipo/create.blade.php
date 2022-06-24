@extends('layouts.plantillabase')
@section('contenido')
    <h2>NUEVA PIZZA</h2>
    <form action="/tipos/insert" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre de la pizza</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Precio de la pizza</label>
            <input type="text" class="form-control" id="precio" name="precio">
        </div>
        <div class="mb-3">
            <label class="form-label">Link de la imagen de la pizza</label>
            <input type="text" class="form-control" id="link" name="link">
        </div>
        <button type="submit" class="btn btn-secondary yellow">Guardar pizza</button>
    </form>
@endsection
