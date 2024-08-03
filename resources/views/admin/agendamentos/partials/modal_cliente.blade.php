<!-- Button trigger modal -->
<div class="modal" id="modal_cliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('visitas.cliente', $visita->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nome">Nome:</label>
                        <input type="text" name="cliente_nome" id="nome" class="form-control"
                            value="{{ $visita->cliente_nome }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="cliente_telefone" id="telefone" class="form-control"
                            value="{{ $visita->cliente_telefone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="cliente_email" id="email" class="form-control"
                            value="{{ $visita->cliente_email }}">
                    </div>
                    <div class="mb-3">
                        <label for="morada">Morada: </label>
                        <input type="text" name="cliente_morada" id="morada" class="form-control"
                            value="{{ $visita->cliente_morada }}">
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
