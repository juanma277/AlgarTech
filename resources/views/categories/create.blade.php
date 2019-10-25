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
                <div class="card-header">Crear Categoría</div>
                <div class="card-body">
                <form action="{{ url('categories') }}" method="POST">
                    <div class="form-group">
                        <label for="nameCategorie">Nombre Categoría</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        {{ csrf_field() }}
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Crear</button>
                        <a href="{{url('categories')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
