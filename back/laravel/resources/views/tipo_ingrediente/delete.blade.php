@extends('layouts.plantillabase')
@section('contenido')
    <h2>ELIMINAR INGREDIENTE DE LA PIZZA</h2>
    <form action="/tipos/deleteingrediente" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID DE LA PIZZA</label><br>
            <input type="text" class="form-control" id="tipo_id" name="tipo_id" value="{{$id_pizza}}">
        </div>
        <div class="mb-3">
            <label class="form-label">INGREDIENTE QUE DESEA ELIMINAR</label><br>
            @foreach($array as $ingredientes)
                <input type="checkbox" id="ingrediente_id" name="ingredientes[]" value={{$ingredientes->_id}}>
                <label for="ingrediente_id">{{$ingredientes->nombre}}</label><br>
            @endforeach
        </div>
        <button type="submit" name="enviar" value="enviar" class="btn btn-secondary">Eliminar ingrediente de la pizza</button>
    </form>
@endsection
