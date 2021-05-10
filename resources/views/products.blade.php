@extends('home')

@section('content')
    <div class="container mx-auto">
        <h1>Produtos</h1>

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
            <form id="form-product" class="form" method="post" action={{route('products.store')}}>
                @csrf
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label for="name" class="col-md-6">Nome</label>
                    <input id="name" type="text" class="form-control col-md-5" name="name" autofocus  maxlength="150" required>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label>Foto</label>
                    <input type="file" name="img" id="img" class="form-control col-md-5">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label>Categoria</label>
                    <input type="text" name="category" name="category" id="category" class="form-control col-md-5" required>
                </div> 
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label>Quatidade</label>
                    <input type="text" name="quantity" type="number"  class="form-control col-md-5" required>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label>Preço</label>
                    <input type="text" name="price" type="number" class="form-control col-md-5" required>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label>Validade</label>
                    <input type="date" name="expiration" class="form-control col-md-5">
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-personalizado" type="submit">Cadastrar</button>
                    <button class="btn btn-primary btn-personalizado" onclick="pesquisar()">Pesquisar</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function pesquisar(){
            $event.preventDefault();
            document.getElementById('form-product').action = "{{route('products.search')}}";
        }
    </script>
@endsection
