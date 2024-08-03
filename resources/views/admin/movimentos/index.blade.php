@extends('admin.layout.index')
@section('titulo', 'Movimentos')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>
        @if (count($movimentos) > 0)
            <div class="row">
                <div class="col">
                    <div class="card">

                        <div class="card-body">
                            <table id="datatablesSimple">

                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Usuário</th>
                                        <th>Descricão</th>
                                        <th>Data</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Usuário</th>
                                        <th>Descricão</th>
                                        <th>Data</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($movimentos as $movimento)
                                        <tr>
                                            <td>{{ $movimento->id }} </td>
                                            <td>{{ $movimento->Usuario->primeiroNome }} {{ $movimento->Usuario->sobrenome }}
                                            </td>
                                            <td>{{ $movimento->descricao }} </td>
                                            <td>{{ $movimento->created_at }} </td>
                                            <td>
                                                <form action="{{ route('admin.movimentos.destroy', $movimento->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $movimento->id }}">
                                                    <button type="submit" class="btn text-danger"><i
                                                            class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row text-center mt-5">
                <p class="h5">Sem movimentos</p>
            </div>

        @endif

    </div>


@endsection
