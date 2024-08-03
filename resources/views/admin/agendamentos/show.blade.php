@extends('admin.layout.index')
@section('conteudo')

    <div class="container p-0 p-md-5">

        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row bg-white py-2 justify-content-end">
            <div class="col-auto">
                <a href="{{ route('admin.agendamentos.edit', $agendamento->id) }}" class="btn btn-primary fw-bold">
                    EDITAR</a>
            </div>
            <div class="col-auto">
                <form action="{{ route('admin.agendamentos.destroy', $agendamento->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-bold">ELIMINAR</button>
                </form>
            </div>
        </div>

        <div class="row bg-white p-3 my-4">
            <div class="col">
                <p><span class="fw-bold">Data: </span>{{ $agendamento->data }}</p>
                <p><span class="fw-bold">Imóvel: </span>
                    @if ($agendamento->imovel_id)
                        <a href="{{ route('admin.imoveis.show', $agendamento->imovel_id) }}">{{ $agendamento->imovel_id }}</a>
                    @endif
                </p>
            </div>
            <div class="col">
                <div class="row">
                    <h5 class="fw-bold">DADOS CLIENTE</h5>
                    <hr>
                    <div class="col">
                        <p><span class="fw-bold">Nome: </span>{{ $agendamento->cliente_nome }}</p>
                        <p><span class="fw-bold">Telefone: </span>{{ $agendamento->cliente_telefone }}</p>
                        <p><span class="fw-bold">Email: </span>{{ $agendamento->cliente_email }}</p>
                        <p><span class="fw-bold">Morada: </span>{{ $agendamento->cliente_morada }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
