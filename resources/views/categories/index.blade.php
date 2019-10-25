@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mantenimiento de Categorias
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{url('categories/create')}}" role="button">Crear</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $categorie)
                            <tr>
                                <th scope="row">{{ $categorie->id }}</th>
                                <td>{{ $categorie->name }}</td>
                                <td>
                                    <a href="{{url('categories/'.$categorie->id. '/edit')}}">Editar</a>
                                    <a href="{{url('categories/'.$categorie->id)}}">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
