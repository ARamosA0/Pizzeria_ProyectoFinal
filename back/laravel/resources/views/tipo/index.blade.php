@extends('layouts.plantillabase')
@section('contenido')
    <div class="select">
        <h3>
            TIPOS
        </h3>
    </div>
    <div class="btn principal">
        <a type="button" href="tipos/create" class="btn btn-secondary m-4 yellow">Agregar tipo de pizza</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" class="green">NOMBRE</th>
                <th scope="col" class="green">IMAGEN</th>
                <th scope="col" class="green">PRECIO</th>
                <th scope="col" class="green">INGREDIENTES</th>
                <th scope="col" class="green">ACCIONES INGREDIENTES</th>
                <th scope="col" class="green">ACCIONES PIZZA</th>
                <th scope="col" class="green">RATING</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tipos as $tipo)
                <tr>
                    <th scope="row">{{$tipo->_id}}</th>
                    <td>{{$tipo->nombre}}</td>
                    <td><img src="{{$tipo->link}}" width="50"></td>
                    <td>S/. {{$tipo->precio}}</td>
                    <td >
                        @if($tipo->tipo_ingrediente()->exists() && $tipo->tipo_ingrediente[0]->ingredientes()->exists())
                            @foreach($tipo->tipo_ingrediente as $tipo_ing)
                                @foreach($tipo_ing->ingredientes as $ingrediente)
                                    {{ $ingrediente->nombre}}<br>
                                @endforeach
                            @endforeach
                        @endif
                    </td>
                    <td >
                        <form action="tipos_ingrediente/delete/{{$tipo->_id}}" method="POST">
                            <a href="tipos/{{$tipo->_id}}/agregaringrediente" type="button" id="acciones"
                               class="btn btn-secondary create">Agregar ingrediente</a>
                            @csrf
                            <button type="submit" id="acciones" class="btn btn-secondary delete">Eliminar ingrediente</button>
                        </form>
                    </td>
                    <td>
                        <form action="tipos/delete/{{$tipo->_id}}" method="POST">
                            <a href="tipos/{{$tipo->_id}}/edit" type="button" id="acciones" class="btn btn-secondary">Editar pizza</a>
                            @csrf
                            <button type="submit" id="acciones" class="btn btn-secondary delete">Eliminar pizza</button>
                        </form>
                    </td>
                    <td>
                        {{$tipo->rating}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
