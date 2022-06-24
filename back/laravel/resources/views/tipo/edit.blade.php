@extends('layouts.plantillabase')
@section('contenido')
    <h2>EDITAR PIZZA</h2>
    <form action="/tipos/update/{{$edit->_id}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre de la pizza</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$edit->nombre}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Precio de la pizza</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{$edit->precio}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Link de la imagen de la pizza</label>
            <input type="text" class="form-control" id="link" name="link" value="{{$edit->link}}">
        </div>
        <button type="submit" class="btn btn-secondary">Guardar pizza</button>
    </form>
@endsection
