@extends('layouts.plantillabase')
@section('contenido')
    INGREDIENTES

    <a type="button" href="ingredientes/create"class="btn btn-secondary m-4">Agregar ingrediente</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre del ingrediente</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($ingredientes as $ingrediente)
                    <tr>
                        <th scope="row">{{$ingrediente->_id}}</th>
                        <td>{{$ingrediente->nombre}}</td>
                        <td>
                            <form action="ingredientes/delete/{{$ingrediente->_id}}" method="POST">
                                <a href="ingredientes/{{$ingrediente->_id}}/edit" type="button" class="btn btn-secondary">Editar</a>
                                @csrf
                                <button type="submit" class="btn btn-secondary">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
