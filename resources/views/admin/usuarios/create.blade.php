@extends('admin.layout.index')
@section('titulo', 'Cadastro')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row">
            <div class="col">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{ route('admin.usuarios.store') }}" method="post">
                            @csrf

                            <div class="mb-3 form-floating">
                                <select name="tipo" id="tipo" class="form-select">
                                    <option value="intermediario" selected>Intermediário</option>
                                </select>
                                <label class="text-muted" for="tipo">tipo</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="primeiroNome" id="primeiroNome"
                                    placeholder="..." autofocus>
                                <label class="text-muted" for="primeiroNome">primeiroNome</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="sobrenome" id="ultimoNome"
                                    placeholder="...">
                                <label class="text-muted" for="ultimoNome">ultimoNome</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="...">
                                <label class="text-muted" for="email">email</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="password" class="form-control" name="password" id="senha"
                                    placeholder="...">
                                <label class="text-muted" for="senha">senha</label>
                            </div>
                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
