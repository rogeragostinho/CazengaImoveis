@extends('admin.layout.index')
@section('titulo', 'Usuários')
@section('conteudo')


    <div class="container p-0 p-md-5">



        {{-- }} <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $tipo }}</li>
    </ol> --}}
        <div class="row">
            @include('components.mensagem')
        </div>
        @if (count($usuarios) > 0)
            <div class="row">
                <div class="card mb-4">
                    @if ($tipo != 'Intermediários')
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Email</th>
                                        <th>Data de cadastro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Email</th>
                                        <th>Data de cadastro</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>
                                                <a class="text-decoration-none"
                                                    href="{{ route('admin.usuarios.show', $usuario->id) }}">
                                                    {{ $usuario->name }}
                                                </a>
                                            </td>

                                            <td>
                                                @if ($usuario->tipo == 'superAdmin')
                                                    Administrador
                                                @else
                                                    {{ $usuario->tipo }}
                                                @endif

                                            </td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->created_at }}</td>
                                            <td>
                                                <div class="col-auto">
                                                    <div class="row g-1">
                                                        <div class="col-auto">
                                                            <a href="{{ route('admin.usuarios.edit', $usuario->id) }}"><button
                                                                    class="btn text-primary"><i class="fa fa-pencil fa-lg"
                                                                        aria-hidden="true"></i></button></a>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="confirmation" value="on">
                                                                <button type="submit" class="btn text-danger"><i
                                                                        class="fa fa-trash fa-lg"
                                                                        aria-hidden="true"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>


                                                </div>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="mb-4">Pendentes</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Email</th>
                                        <th>Data de cadastro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->estado == 'pendente')
                                            <tr>
                                                <td>
                                                    <a class="text-decoration-none"
                                                        href="{{ route('admin.paginaDetalhesUsuario', $usuario->id) }}">
                                                        {{ $usuario->primeiroNome }} {{ $usuario->ultimoNome }}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($usuario->tipo == 'superAdmin')
                                                        Administrador
                                                    @else
                                                        {{ $usuario->tipo }}
                                                    @endif

                                                </td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->created_at }}</td>
                                                <td>
                                                    <div class="col-auto">
                                                        <div class="row g-1">
                                                            <div class="col-auto">
                                                                <a
                                                                    href="{{ route('admin.paginaEdicaoUsuario', $usuario->id) }}"><button
                                                                        class="btn text-primary"><i
                                                                            class="fa fa-pencil fa-lg"
                                                                            aria-hidden="true"></i></button></a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <form action="{{ route('admin.usuario.excluir') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $usuario->id }}">
                                                                    <input type="hidden" name="confirmation"
                                                                        value="on">
                                                                    <button type="submit" class="btn text-danger"><i
                                                                            class="fa fa-trash fa-lg"
                                                                            aria-hidden="true"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        {{-- Ativos --}}
                        <div class="card-body">
                            <h4 class="my-4">Ativos</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Email</th>
                                        <th>Data de cadastro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->estado == 'ativo')
                                            <tr>
                                                <td>
                                                    <a class="text-decoration-none"
                                                        href="{{ route('admin.paginaDetalhesUsuario', $usuario->id) }}">
                                                        {{ $usuario->primeiroNome }} {{ $usuario->ultimoNome }}
                                                    </a>

                                                </td>
                                                <td>
                                                    @if ($usuario->tipo == 'superAdmin')
                                                        Administrador
                                                    @else
                                                        {{ $usuario->tipo }}
                                                    @endif

                                                </td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->created_at }}</td>
                                                <td>
                                                    <div class="col-auto">
                                                        <div class="row g-1">
                                                            <div class="col-auto">
                                                                <a
                                                                    href="{{ route('admin.paginaEdicaoUsuario', $usuario->id) }}"><button
                                                                        class="btn text-primary"><i
                                                                            class="fa fa-pencil fa-lg"
                                                                            aria-hidden="true"></i></button></a>
                                                            </div>
                                                            <div class="col-auto">
                                                                <form action="{{ route('admin.usuario.excluir') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $usuario->id }}">
                                                                    <input type="hidden" name="confirmation"
                                                                        value="on">
                                                                    <button type="submit" class="btn text-danger"><i
                                                                            class="fa fa-trash fa-lg"
                                                                            aria-hidden="true"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        @else
            <div class="row text-center mt-5">
                <p class="h5">Sem usuários</p>
            </div>

        @endif

    </div>
@endsection
