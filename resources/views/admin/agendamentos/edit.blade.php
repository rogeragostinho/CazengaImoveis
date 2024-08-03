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
                                EDITAR AGENDAMENTO
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.agendamentos.update', $agendamento->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="data">Data:</label>
                                        <input type="date" name="data" id="data" class="form-control" value="{{$agendamento->data}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nome">Nome:</label>
                                        <input type="text" name="cliente_nome" id="nome" class="form-control" required value="{{$agendamento->cliente_nome}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefone">Telefone:</label>
                                        <input type="text" name="cliente_telefone" id="telefone" class="form-control" required value="{{$agendamento->cliente_telefone}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" name="cliente_email" id="email" class="form-control" value="{{$agendamento->cliente_email}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="morada">Morada: </label>
                                        <input type="text" name="cliente_morada" id="morada" class="form-control" value="{{$agendamento->cliente_morada}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="imovel">Id do imóvel: </label>
                                        <input type="number" name="imovel_id" id="imovel" class="form-control" value="{{$agendamento->imovel_id}}">
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
