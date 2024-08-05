@extends('public.layout.index')
@section('body-color', '#ebecee')
@section('conteudo')
    <div class="container py-4">
        @if (count(auth()->user()->Agendas))
            <div class="row bg-white p-3">
                <h5 class="mb-4 mt-3">DESEMPENHO DOS LINKS</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>DATA</th>
                            <th>IMÓVEL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->Agendas as $agenda)
                            <tr>
                                <td>{{ $agenda->data }} </td>
                                <td>
                                    <a href="{{ route('imoveis.show', $agenda->imovel_id) }}">{{ $agenda->imovel_id }} </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @else
        <div class="row">
            <h5>Sem agendamentos por meio dos seus links</h5>
        </div>
        @endif

    </div>
@endsection
