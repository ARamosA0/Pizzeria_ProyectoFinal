@extends('layouts.plantillabase')
@section('contenido')
    <div class="select">
        <h3>INGREDIENTES</h3>
    </div>

    <div class="btn principal">
        <a type="button" href="ingredientes/create"class="btn btn-secondary m-4 yellow">Agregar ingrediente</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" class="green">NOMBRE</th>
                <th scope="col" class="green">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
                @foreach($ingredientes as $ingrediente)
                    <tr>
                        <th scope="row">{{$ingrediente->_id}}</th>
                        <td>{{$ingrediente->nombre}}</td>
                        <td>
                            <form action="ingredientes/delete/{{$ingrediente->_id}}" method="POST">
                                <a href="ingredientes/{{$ingrediente->_id}}/edit" type="button" id="acciones" class="btn btn-secondary">Editar</a>
                                @csrf
                                <button type="submit" class="btn btn-secondary delete" id="acciones">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
