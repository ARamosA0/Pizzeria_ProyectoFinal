@extends('layouts.plantillabase')
@section('contenido')
    TIPOS
    <a type="button" href="tipos/create"class="btn btn-secondary m-4">Agregar tipo de pizza</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre de la pizza</th>
                <th scope="col">Ingredientes</th>
                <th scope="col">Acciones de los ingredientes</th>
                <th scope="col">HOLAAA</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ingredientesdepizza as $ingredientes)
                <tr>
                    <th scope="row">{{$ingredientes->_id}}</th>
                    <td>{{$ingredientes->tipos[0]->nombre}}</td>
                    <td>{{$ingredientes->ingrediente_id}}</td>
                    <td>
                        <form>
                            <a href="tipos/{{$ingredientes->tipo_id}}/agregaringrediente" type="button" class="btn btn-secondary">Agregar ingrediente</a>
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
