@extends('layouts.app')

@section('content')

        <div class="row bg-dark mb-3 mt-3 rounded">
            <div class="container">
            
                <div class="col-md-6">
                    <h2 class="text-white float-left pb-3">Editar Produto </h2>
                </div>
                <div class="col-md-6 mt-3">
                    <a class="btn btn-primary float-right mt-3" href="{{ route('projetos.index') }}" title="Voltar"> <i class="fas fa-backward "></i> Voltar </a>
                </div>
            </div>    
        </div>


    <div class="container">

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

        <form class="ml-3 mr-3" action="{{ route('projetos.update', $projeto -> id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="nome" value="{{ $projeto -> nome }}" class="form-control" placeholder="Nome">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Introdução:</strong>
                        <textarea class="form-control" style="height:50px" name="introducao"
                            placeholder="Introdução">{{ $projeto -> introducao }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Localização:</strong>
                        <input type="text" name="localizacao" class="form-control" placeholder="{{ $projeto -> localizacao }}"
                            value="{{ $projeto -> localizacao }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Custo:</strong>
                        <input type="number" name="custo" class="form-control" placeholder="{{ $projeto -> custo }}"
                            value="{{ $projeto -> custo }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success w-100">Atualizar Projeto</button>
                </div>
            </div>

        </form>
    </div>
@endsection