@extends('layouts.app')


@section('content')

    <div class="row bg-dark mb-3 mt-3 rounded">
        <div class="container">
        
            <div class="col-md-6">
                <h2 class="text-white float-left pb-3">Visualizar Produto: {{ $projeto -> nome }} </h2>
            </div>
            <div class="col-md-6 mt-3">
                <a class="btn btn-primary float-right mt-3" href="{{ route('projetos.index') }}" title="Voltar"> <i class="fas fa-backward "></i> Voltar </a>
            </div>
        </div>    
    </div>

    <div class="row">

        <div class="container">
        
            <ul class="list-group ml-3 mr-3">
                <li class="list-group-item"><h4><strong>Nome: </strong>{{ $projeto -> nome }}</h4></li>
                <li class="list-group-item"><h4><strong>Introdução: </strong>{{ $projeto -> introducao }}</h4></li>
                <li class="list-group-item"><h4><strong>Localização: </strong>{{ $projeto -> localizacao }}</h4></li>
                <li class="list-group-item"><h4><strong>Custo: </strong>{{ $projeto -> custo }}</h4></li>
                <li class="list-group-item"><h4><strong>Criado em: </strong>{{ date_format($projeto -> created_at, 'jS M Y') }}</h4></li>
            </ul>
        
        </div>

    </div>
@endsection