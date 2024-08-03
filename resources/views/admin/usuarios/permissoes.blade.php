@extends('admin.layout.index')
@section('titulo', 'Permissões')
@section('conteudo')

    <h1 class="mt-4">Permissões</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $usuario->primeiroNome }} {{ $usuario->sobrenome }} </li>
    </ol>
    <div class="row">
        @include('components.mensagem')
    </div>
    <div class="row">
        @foreach ($usuario->Permissoes as $permissao)
            <form action="{{ route('admin.permissoes.atualizar') }}" method="post">

                @csrf
                <input type="hidden" name="id" value="{{ $usuario->id }}">
                <input type="hidden" name="tipo" value="{{ $permissao->tipo }}">
                <div class="col-6 mb-4">
                    <h4>{{ $permissao->tipo }} </h4>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ler" value="sim"
                            id="flexCheckDefault" @if ($permissao->ler == 'sim') checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            ler
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="criar" value="sim"
                            id="flexCheckDefault" @if ($permissao->criar == 'sim') checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            criar
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="atualizar" value="sim"
                            id="flexCheckDefault" @if ($permissao->atualizar == 'sim') checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            atualizar
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="excluir" value="sim"
                            id="flexCheckDefault" @if ($permissao->excluir == 'sim') checked @endif>
                        <label class="form-check-label" for="flexCheckDefault">
                            excluir
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                    </div>
                </div>

            </form>
        @endforeach
    </div>


@endsection
