@extends('layouts.app')

@section('content')

    <div class="row bg-dark mb-3 mt-3 rounded">
        <div class="container">
        
            <div class="col-md-6">
                <h2 class="text-white float-left pb-3">Adicionar Produto </h2>
            </div>
            <div class="col-md-6 mt-3">
                <a class="btn btn-primary float-right mt-3" href="{{ route('projetos.index') }}" title="Voltar"> <i class="fas fa-backward "></i> Voltar </a>
            </div>
        </div>    
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ops!</strong> Houve alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('projetos.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Introdução:</strong>
                    <textarea class="form-control" style="height:50px" name="introducao" placeholder="Introdução"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Localização:</strong>
                    <input type="text" name="localizacao" class="form-control" placeholder="Localização">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Custo:</strong>
                    <input type="number" name="custo" class="form-control" placeholder="Custo">
                </div>
            </div>
            <div class="col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </div>
        </div>

    </form>
@endsection