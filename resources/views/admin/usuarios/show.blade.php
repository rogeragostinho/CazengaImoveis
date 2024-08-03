@extends('admin.layout.index')
@section('titulo', 'Detalhes')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row justify-content-end align-items-center">
            <div class="col-auto mb-3">
                @if ($usuario->estado == 'ativo')
                    <form action="{{ route('admin.usuarios.desativar') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $usuario->id }}">
                        <button type="submit" class="btn btn-primary">Desativar conta</button>
                    </form>
                @else
                    <form action="{{ route('admin.usuarios.ativar') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $usuario->id }}">
                        <button type="submit" class="btn btn-primary">Ativar conta</button>
                    </form>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-body">
                        <p class="h4 font-weight-normal"><span class="fw-bold">Nome: </span>{{ $usuario->name }}</p>
                        <p class=""><span class="fw-bold">Tipo: </span>{{ $usuario->tipo }}</p>
                        <p class=""><span class="fw-bold">Estado: </span>{{ $usuario->estado }}</p>
                        <p class=""><span class="fw-bold">Email: </span>{{ $usuario->email }}</p>
                        <p class=""><span class="fw-bold">Telefone: </span>{{ $usuario->telefone }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
