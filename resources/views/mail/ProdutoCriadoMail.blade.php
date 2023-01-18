@component('mail::message')
# Um Novo Produto Acaba de Chegar!

- Produto:{{$nomeProduto}}
- Cor:{{$corProduto}}
- R${{$valorProduto}}

@component('mail::button',['url' => route('buscar.produtoId',$idProduto)])
    Confira!
@endcomponent
@endcomponent
