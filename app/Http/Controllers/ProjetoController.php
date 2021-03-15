<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Exibe uma lista do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::latest() -> paginate(5);

        return view( 'projetos.index', compact( 'projetos' ))
            ->with( 'i', ( request() -> input( 'page', 1) - 1) * 5);
    }

    /**
     * Mostra o formulário de criação de um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'projetos.create' );
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'nome' => 'required',
            'introducao' => 'required',
            'localizacao' => 'required',
            'custo' => 'required'
        ]);

        Projeto::create( $request->all() );

        return redirect() -> route( 'projetos.index' )
            -> with('success', 'Projeto criado com sucesso!');
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        return view( 'projetos.show', compact( 'projeto' ));
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Projeto $projeto)
    {
        return view('projetos.edit', compact('projeto'));
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projeto $projeto)
    {
        $request -> validate([
            'nome' => 'required',
            'introducao' => 'required',
            'localizacao' => 'required',
            'custo' => 'required'
        ]);
        $projeto ->update( $request->all() );

        return redirect() -> route( 'projetos.index' )
            -> with( 'success', 'Projeto atualizado com sucesso!' );
    }

    /**
     * Remova o recurso especificado do armazenamento.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projeto $projeto)
    {
        $projeto -> delete();

        return redirect() -> route('projetos.index')
            -> with('success', 'Projeto deletado com sucesso!');
    }

    /**
     * Retorna a visão delete em nosso diretório de projetos junto com o id do item.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $projeto = Projeto::find($id);

        return view('projetos.delete', compact('projeto'));
    }
}
