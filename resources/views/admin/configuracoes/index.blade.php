@extends('admin.layout.index')
@section('titulo', 'Configuracoes')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{ route('admin.configuracoes.update', $configuracao->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="nome"
                                    value="{{ $configuracao->nome }}">
                                <label for="nome">Nome</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="telefone1" id="telefone1" class="form-control"
                                    placeholder="telefone1" value="{{ $configuracao->telefone1 }}">
                                <label for="telefone1">Telefone1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="telefone2" id="telefone2" class="form-control"
                                    placeholder="telefone2" value="{{ $configuracao->telefone2 }}">
                                <label for="telefone2">Telefone2</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control"
                                    placeholder="whatsapp" value="{{ $configuracao->whatsapp }}">
                                <label for="whatsapp">Whatsapp</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="facebook" id="facebook" class="form-control"
                                    placeholder="facebook" value="{{ $configuracao->facebook }}">
                                <label for="facebook">Facebook</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="instagram" id="instagram" class="form-control"
                                    placeholder="instagram" value="{{ $configuracao->instagram }}">
                                <label for="instagram">Instagram</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="sobre" id="sobre" class="form-control" style="height: 150px" placeholder="...">{{ $configuracao->sobre }}</textarea>
                                <label for="sobre">Sobre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="missao" id="missao" class="form-control" style="height: 150px" placeholder="...">{{ $configuracao->missao }}</textarea>
                                <label for="missao">Missao</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="visao" id="visao" class="form-control" style="height: 150px" placeholder="...">{{ $configuracao->visao }}</textarea>
                                <label for="visao">Visao</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea name="valores" id="valores" class="form-control" style="height: 150px" placeholder="...">{{ $configuracao->valores }}</textarea>
                                <label for="valores">Valores</label>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
