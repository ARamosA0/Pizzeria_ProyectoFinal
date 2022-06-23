@extends('layouts.plantillabase')
@section('contenido')
    <h2>NUEVA PIZZA</h2>
    <form action="/tipos/insert" method="post">
        @csrf
        <div class="mb-3">
            <label
                class="form-label">Nombre de la pizzaaaaaaaaaaaaaaaaaaaaaaaaa</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <button type="submit" class="btn btn-secondary">Guardar pizza</button>
    </form>
@endsection
