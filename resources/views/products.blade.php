@extends('home')

@section('content')
    <div class="container">
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

        <form id="form-product" class="form" method="post" action={{route('products.store')}}>
            @csrf
            <div class="col-lg-6 col-md-8 col-sm-12">
                <label for="name">Nome</label>
                <input id="name" type="text" class="form-control" name="name" autofocus  maxlength="150" required>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <label>Foto</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <label class="col-form-label" for="id_category">Categoria</label>
                <select id="id_category" class="form-control" name="id_category">
                    <option name="id_category" value=""  style="font-style: italic;">Selecione</option>
                    @foreach ($categories as $category)
                        <option name="id_category" value="{{ $category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <label>Quatidade</label>
                <input name="quantity" type="number"  class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <label>Preço</label>
                <input  name="price" type="number" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <label>Validade</label>
                <input type="date" name="expiration" class="form-control">
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <button class="btn btn-primary btn-personalizado" type="submit">Cadastrar</button>
            </div>
        </form>

        <br>

        <table id="products-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Validade</th>
                    <th>Alterar</th>
                </tr>
            </thead>
        </table>
    </div>
    <script defer>
        $(function() {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('products.list')}}",
                columns: [
                    {data: "name", name: "name",},
                    {data: "category.name", name: "category.name",},
                    {data: "price", name: "price",},
                    {data: "quantity", name: "quantity",},
                    {data: "expiration", name: "expiration",},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    //{data: 'action', name: 'details', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
