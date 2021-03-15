@extends('layouts.app')

@section('content')

    <div class="row bg-dark mb-3 mt-3 rounded">
        <div class="col-md-12">
            <h2 class="text-center text-white pb-3">Laravel 8 CRUD </h2>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-success" href="{{ route('projetos.create') }}" title="Criar um projeto"> 
            <i class="fas fa-plus-circle"> </i> Adicionar Novo Projeto </a>

            <a href="{{ route('projetos.index') }}" class="">
                <button class="btn btn-danger" type="button" title="Atualizar página">
                    <span class="fas fa-sync-alt"></span> Atualizar Página
                </button>
            </a>
        </div>

        <div class="col-md-6">
        
            <form action="{{ route('projetos.index') }}" method="GET" role="search">

                <div class="d-flex">

                    <button class="btn btn-info t mr-3" type="submit" title="Procurar projetos">
                        <span class="fas fa-search"></span> Buscar 
                    </button>
                    
                    <input type="text" class="form-control mr-3" name="term" placeholder="Procurar projetos" id="term">
                    
                </div>
            </form>
        
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- table-bordered table-responsive table-hover -->
    <table class="table table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col">N°</th>
                <th class="text-center" scope="col">Nome</th>
                <th class="text-center" scope="col">Introdução</th>
                <th class="text-center" scope="col">Localização</th>
                <th class="text-center" scope="col">Custo</th>
                <th class="text-center" scope="col">Criado em</th>
                <th class="text-center" scope="col">Visualizar</th>
                <th class="text-center" scope="col">Editar</th>
                <th class="text-center" scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projetos as $projeto)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $projeto -> nome }}</td>
                <td>{{ $projeto -> introducao }}</td>
                <td>{{ $projeto -> localizacao }}</td>
                <td>{{ $projeto -> custo }}</td>
                <td>{{ date_format($projeto -> created_at, 'jS M Y') }}</td>
                <td>
                    <a href="{{ route('projetos.show', $projeto -> id) }}" title="show">
                        <i class="fas fa-eye text-success fa-lg"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('projetos.edit', $projeto->id) }}">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                </td>
                <td>
                    <a style="cursor: pointer;" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('delete', $projeto->id) }}" title="Excluir Projeto">
                        <i class="fas fa-trash text-danger fa-lg"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    {!! $projetos->links() !!}

    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-9">
                        <h5 class="modal-title h3" id="exampleModalLongTitle">Perigo!</h5>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href
                , beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                }
                , complete: function() {
                    $('#loader').hide();
                }
                , error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                }
                , timeout: 8000
            })
        });

    </script>


@endsection