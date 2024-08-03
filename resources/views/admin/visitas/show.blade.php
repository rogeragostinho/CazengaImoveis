@extends('admin.layout.index')
@section('conteudo')

@include('visitas.partials.modal_cliente')

    <div class="container p-0 p-md-5">

        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row bg-white py-2 justify-content-end">
            <div class="col-auto">
                <a href="{{ route('admin.visitas.edit', $visita->id) }}" class="btn btn-primary fw-bold">
                    EDITAR</a>
            </div>
            <div class="col-auto">
                <form action="{{ route('admin.visitas.destroy', $visita->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger fw-bold">ELIMINAR</button>
                </form>
            </div>
        </div>

        <div class="row bg-white p-3 my-4">
            <div class="col">
                <p><span class="fw-bold">Status: </span>{{ $visita->status }}</p>
                <p><span class="fw-bold">Data: </span>{{ $visita->data }}</p>
                <p><span class="fw-bold">Hora início: </span>{{ $visita->hora_inicio }}</p>
                <p><span class="fw-bold">Hora fim: </span>{{ $visita->hora_fim }}</p>
                <p><span class="fw-bold">Imóvel: </span>
                    @if ($visita->imovel_id)
                        <a href="{{ route('admin.imoveis.show', $visita->imovel_id) }}">{{ $visita->imovel_id }}</a>
                    @endif
                </p>
            </div>
            <div class="col">
                <div class="row">
                    <h5 class="fw-bold">DADOS CLIENTE</h5>
                    <hr>
                    <div class="col">
                        <p><span class="fw-bold">Nome: </span>{{ $visita->cliente_nome }}</p>
                        <p><span class="fw-bold">Telefone: </span>{{ $visita->cliente_telefone }}</p>
                        <p><span class="fw-bold">Email: </span>{{ $visita->cliente_email }}</p>
                        <p><span class="fw-bold">Morada: </span>{{ $visita->cliente_morada }}</p>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_cliente">
                            Cliente
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
