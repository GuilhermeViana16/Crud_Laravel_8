{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('projetos.destroy', $projeto->id) }}" method="post">

    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h4 class="text-center">Tem certeza de que deseja excluir {{ $projeto-> nome }} ?</h4>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Sim, Excluir Projeto</button>
    </div>

</form>