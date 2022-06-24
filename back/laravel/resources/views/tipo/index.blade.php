@extends('layouts.plantillabase')
@section('contenido')
    TIPOS
    <a type="button" href="tipos/create" class="btn btn-secondary m-4">Agregar tipo de pizza</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre de la pizza</th>
                <th scope="col">Ingredientes</th>
                <th scope="col">Acciones de los ingredientes</th>
                <th scope="col">Acciones de la pizza</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tipos as $tipo)
                <tr>
                    <th scope="row">{{$tipo->_id}}</th>
                    <td>{{$tipo->nombre}}</td>
                    <td>
                        @if($tipo->tipo_ingrediente()->exists() && $tipo->tipo_ingrediente[0]->ingredientes()->exists())
                            @foreach($tipo->tipo_ingrediente as $tipo_ing)
                                @foreach($tipo_ing->ingredientes as $ingrediente)
                                    {{ $ingrediente->nombre}}<br>
                                @endforeach
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <form action="tipos_ingrediente/delete/{{$tipo->_id}}" method="POST">
                            <a href="tipos/{{$tipo->_id}}/agregaringrediente" type="button"
                               class="btn btn-secondary">Agregar ingrediente</a>
                            @csrf
                            <button type="submit" class="btn btn-secondary">Eliminar ingrediente</button>
                        </form>
                    </td>
                    <td>
                        <form action="tipos/delete/{{$tipo->_id}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Eliminar pizza</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
