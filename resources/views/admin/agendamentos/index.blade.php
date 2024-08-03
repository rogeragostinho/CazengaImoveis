@extends('admin.layout.index')
@section('conteudo')

    <div class="container p-0 p-md-5">

        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row bg-white py-2">
            <div class="col-auto">
                <a href="{{ route('admin.agendamentos.create') }}" class="btn btn-primary">Adicionar</a>
            </div>
        </div>

        @if (count($agendamentos) > 0)
            <div class="row bg-white mt-4 p-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>DATA</th>
                            <th>CLIENTE</th>
                            <th>IMÓVEL</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($agendamentos as $agendamento)
                            <tr>
                                <th>{{ $agendamento->id }} </th>
                                <td>{{ $agendamento->data }} </td>
                                <td>{{ $agendamento->cliente_nome }} </td>
                                <td>
                                    <a
                                        href="{{ route('admin.imoveis.show', $agendamento->imovel_id) }}">{{ $agendamento->imovel_id }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.agendamentos.show', $agendamento->id) }}"
                                        class="btn btn-primary fw-bold">DETALHES</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="row text-center mt-5">
                <p class="h5">Sem agendamentos definidos</p>
            </div>
        @endif

        {{-- <div class="row mt-4">
            {{ $visitas->links('custom.navigation') }}
        </div> --}}

    </div>

@endsection
