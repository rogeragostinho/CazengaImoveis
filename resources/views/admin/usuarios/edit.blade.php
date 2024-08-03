@extends('admin.layout.index')
@section('titulo', 'Cadastro')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row">
            <div class="col">
                <div class="card mt-4">
                    <div class="card-body">
                        <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 form-floating">
                                <select name="tipo" id="tipo" class="form-select">
                                    @if ($usuario->tipo == 'superAdmin')
                                        <option value="{{ $usuario->tipo }}" selected>Administrador </option>
                                        <option value="intermediario">Intermediario</option>
                                    @else
                                        <option value="{{ $usuario->tipo }}" selected>Intermediario</option>
                                        <option value="superAdmin">Administrador</option>
                                    @endif
                                </select>
                                <label class="text-muted" for="tipo">tipo</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="primeiroNome" id="primeiroNome"
                                    value="{{ $usuario->primeiroNome }}" placeholder="...">
                                <label class="text-muted" for="primeiroNome">primeiroNome</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" name="sobrenome" id="ultimoNome"
                                    value="{{ $usuario->sobrenome }}" placeholder="...">
                                <label class="text-muted" for="ultimoNome">ultimoNome</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $usuario->email }}" placeholder="...">
                                <label class="text-muted" for="email">email</label>
                            </div>

                            <div class="col text-end">
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
