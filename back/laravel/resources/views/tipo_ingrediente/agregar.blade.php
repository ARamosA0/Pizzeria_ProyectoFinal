@extends('layouts.plantillabase')
@section('contenido')
    <h2>AGREGAR INGREDIENTE A LA PIZZA</h2>
    <form action="/tipos/insertingrediente" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label"> ID DE LA PIZZA</label><br>
            <input type="text" class="form-control" id="tipo_id" name="tipo_id" value="{{$tipo_id}}">
        </div>
        <div class="mb-3">
            <label class="form-label">INGREDIENTES PARA AGREGAR</label><br>
            @foreach($ingredientes as $ingrediente)
                <input type="checkbox" id="ingrediente_id" name="ingredientes[]" value={{$ingrediente->_id}}>
                <label for="ingrediente_id">{{$ingrediente->nombre}}</label><br>
            @endforeach
        </div>
        <button type="submit" name="enviar" value="enviar" class="btn btn-secondary">Guardar ingrediente</button>
    </form>
@endsection
