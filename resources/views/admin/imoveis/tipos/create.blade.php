@extends('admin.layout.index')
@section('titulo', 'Tipo de imóvel')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.tipos.store') }}" method="post">
                            @csrf
                            <div class="mb-3 form-floating">
                                <input type="text" id="nome" class="form-control" name="nome" placeholder=".."
                                    required>
                                <label class="text-muted" for="nome">Nome</label>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('admin.tipos.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
