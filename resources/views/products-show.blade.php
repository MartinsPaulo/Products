@extends('home')

@section('content')
    <div class="container mx-auto">
        
        @if(isset($success))
        <div class="alert alert-success">
            Informações do produto alteradas com sucesso!
        </div>
        @endif

        <h2>Informações do Produto</h2>
        <h5><h5>
        <div>
            <label>Nome: {{$product->name}}</label>
        </div> 
        <div>
            <label>Categoria: {{$product->category}}</label>
        </div> 
        <div>
            <label>Preço: {{$product->price}}</label>
        </div>
        <div>
            <label>Quantidade: {{$product->quantity}}</label>
        </div>
        <div>
            <label>Data de validade: {{$product->expiration}}</label>
        </div>
        <div>
            <label>Comentários: {{$product->comments}}</label>
        </div>
        <div>
            <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-personalizado"><img src="{{asset('edit.png')}}"> Alterar</a>
            <a href="javascript:history.back()" class="btn btn-primary btn-personalizado">Voltar</a>
            
            <form action="{{route('products.destroy',$product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-personalizado"><img src="{{asset('delete.png')}}"> Excluir</button>
            </form>

        </div>
    </div>
@endsection