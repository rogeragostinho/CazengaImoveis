@extends('admin.layout.index')
@section('conteudo')
    <div class="container p-0 p-md-5">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <div class="row">
                    <div class="col">
                        @include('components.mensagem')
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                CRIAR AGENDAMENTO
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.agendamentos.store') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="data">Data:</label>
                                        <input type="date" name="data" id="data" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nome">Nome:</label>
                                        <input type="text" name="cliente_nome" id="nome" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefone">Telefone:</label>
                                        <input type="text" name="cliente_telefone" id="telefone" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" name="cliente_email" id="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="morada">Morada: </label>
                                        <input type="text" name="cliente_morada" id="morada" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="imovel">Id do imóvel: </label>
                                        <input type="number" name="imovel_id" id="imovel" class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary fw-bold">CRIAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
