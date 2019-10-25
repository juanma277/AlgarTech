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
                <div class="card-header">Editar Producto</div>
                <div class="card-body">
                <form action="{{ url('products/'.$product->id)}}" method="POST">
                    <div class="form-group">
                        <label for="nameCategorie">Categoría</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}"
                            <?php if($categorie->id === $product->id) echo "selected='selected'" ?>  
                            >{{$categorie->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Nombre Producto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="nameCategorie">Cantidad</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}" required>
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </div>
                
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success">Editar</button>
                        <a href="{{url('products')}}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
