@extends('home')

@section('content')
    <div class="container mx-auto">

        @if(isset($success))
        <div class="alert alert-success">
            Informações do produto alteradas com sucesso!
        </div>
        @endif

        <h2>Informações do Produto</h2>
        <h5></h5>
        <div>
            <label>Nome: {{$product->name}}</label>
        </div>
        <div>
            <label>Categoria: {{$product->category->name}}</label>
        </div>
        <div>
            <label>Preço: {{$product->price}}</label>
        </div>
        <div>
            <label>Quantidade: {{$product->quantity}}</label>
        </div>
        <div>
            <label>Data de validade: {{$product->expiration->format('d/m/Y')}}</label>
        </div>
        <div>
            <label>Comentários: {{$product->comments}}</label>
        </div>
        <div style="display: inline">
            <form action="{{route('products.destroy',$product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary btn-personalizado"><img src="{{asset('edit.png')}}" alt="edit"> Alterar</a>
                <a href="javascript:history.back()" class="btn btn-primary btn-personalizado">Voltar</a>
                <a type="button" class="btn btn-danger btn-personalizado" data-toggle="modal" data-target="#modalDelete" data-id_delete="{{$product->id}}" style="color:white !important;"><img src="{{asset('delete.png')}}" alt="delete">Excluir</a>
                @include('general/modal-delete')
            </form>
        </div>
    </div>


    <script defer>
        //delete script
        $('#modalDelete').on('show.bs.modal', function (event) {
            console.log("show event");
            let button = $(event.relatedTarget)

            let id_delete = button.data('id_delete')
            let modal = $(this)

            modal.find('.modal-body #id_delete').val(id_delete);
        });
    </script>

@endsection



