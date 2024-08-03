@extends('admin.layout.index')
@section('titulo', 'Mensagens')
@section('conteudo')

    <div class="container p-0 p-md-5">

        <div class="row">
            @include('components.mensagem')
        </div>


        @if (count($mensagens) > 0)
            <div class="row">
                <div class="card">

                    <div class="card-body">
                        <table id="datatablesSimple">

                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>email</th>
                                    <th>Assunto</th>
                                    <th>conteudo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>email</th>
                                    <th>Assunto</th>
                                    <th>conteudo</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($mensagens as $mensagem)
                                    <tr>
                                        <td>{{ $mensagem->id }} </td>
                                        <td>{{ $mensagem->email }}
                                        </td>
                                        <td><a href="{{ route('admin.mensagens.show', $mensagem->id) }}">{{ $mensagem->assunto }}
                                            </a>
                                        </td>
                                        <td>{{ Str::limit($mensagem->conteudo, 20) }} </td>
                                        <td>
                                            <form action="{{ route('admin.mensagens.destroy', $mensagem->id) }}" method="post">
                                                @csrf
                                                @method('DELETe')
                                                <input type="hidden" name="id" value="{{ $mensagem->id }}">
                                                <button type="submit" class="btn text-danger"><i class="fa fa-trash fa-lg"
                                                        aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="row text-center mt-5">
                <p class="h5">Sem mensagens</p>
            </div>

        @endif

    </div>


@endsection
