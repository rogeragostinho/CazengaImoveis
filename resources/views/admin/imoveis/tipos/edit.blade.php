@extends('admin.layout.index')
@section('titulo', 'Imoveis')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.tipos.update', $tipo->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 form-floating">
                                <input type="text"value="{{ $tipo->nome }}" id="nome" class="form-control"
                                    name="nome" required>
                                <label class="text-muted" for="nome">Nome</label>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.tipos.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
