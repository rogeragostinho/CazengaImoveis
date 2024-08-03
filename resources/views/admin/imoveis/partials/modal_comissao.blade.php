<!-- Button trigger modal -->
<div class="modal" id="modal_comissao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Comissão</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.imoveis.comissao', $imovel->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="comissao_imobiliaria">Comissão Imobiliária(%)</label>
                        <input type="number" name="comissao_imobiliaria" id="comissao_imobiliaria"
                            class="form-control" value="{{$imovel->comissao_imobiliaria}}" min="0" max="100">
                    </div>
                    <div class="mb-3">
                        <label for="comissao_imobiliaria">Comissão Corretor(%)</label>
                        <input type="number" name="comissao_corretor" id="comissao_corretor" class="form-control" value="{{$imovel->comissao_corretor}}" min="0" max="100">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
