
@extends('home')

@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <h2>Alterar Informações do Produto</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <form id="form-product" class="form" method="post" action={{route('products.update',$product->id)}}>
            @method('PUT')
            @csrf
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="name" class="col-md-6">Nome</label>
                <input id="name" type="text" class="form-control col-md-12" name="name" autofocus  maxlength="150" required value="{{$product->name}}">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label>Foto</label>
                <input type="file" name="img" id="img" class="form-control col-md-12">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label class="col-form-label" for="id_category">Categoria</label>
                <select id="id_category" class="form-control col-md-12" name="id_category"> 
                    @foreach ($categories as $category)
                        <option name="id_category" value="{{$category->id}}" @if($category->id === $product->id_category) selected   @endif>{{ $category->name}}</option>
                    @endforeach
                    @if($product->category->active===0)
                    <option name="id_category" value="{{$product->category->id}}" selected>{{$product->category->name}}</option>
                    @endif
                </select>      
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label>Quatidade</label>
                <input type="text" name="quantity" type="number"  class="form-control col-md-12" required value="{{$product->quantity}}">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label>Preço</label>
                <input type="text" name="price" type="number" class="form-control col-md-12" required value="{{$product->price}}">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label>Validade</label>
                <input type="date" name="expiration" class="form-control col-md-12" value="{{$product->expiration}}"> 
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button class="btn btn-success btn-personalizado" type="submit">Alterar</button>
                <a href="javascript:history.back()" class="btn btn-primary btn-personalizado">Voltar</a>
            </div>
        </form>
    </div>
</div>

@endsection