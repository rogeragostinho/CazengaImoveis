@extends('admin.layout.index')
@section('titulo', 'Imoveis')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row bg-white py-2">
            <div class="col-auto">
                <a href="{{ route('admin.imoveis.create') }}" class="btn btn-primary">Adicionar</a>
            </div>
            <div class="col">
                <div class="row justify-content-end">
                    <div class="col-auto"><a href="{{ route('admin.imoveis.index') }}" class="btn btn-primary">Todos</a></div>
                    <div class="col-auto"><a href="{{ route('admin.imoveis.ativos') }}" class="btn btn-primary">Ativos</a></div>
                    <div class="col-auto"><a href="{{ route('admin.imoveis.pendentes') }}" class="btn btn-primary">Pendentes</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $estado }}</li>
    </ol> --}}

        @if (count($imoveis) > 0)
            <div class="row bg-white mt-4 p-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nº</th>
                            <th>STATUS</th>
                            <th>CONTRATO</th>
                            <th>TIPO</th>
                            <th>DATA</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($imoveis as $imovel)
                            <tr>
                                <td>
                                    @if (isset($imovel->imagens[0]))
                                        <img src="{{ url('storage/' . $imovel->imagens[0]->url) }}" class="img-fluid"
                                            alt="..." width = "35">
                                    @else
                                        <img src="{{ asset('img/4.jfif') }}" class=" img-fluid" alt="...">
                                    @endif
                                </td>
                                <td>{{ $imovel->id }} </td>
                                <td>{{ $imovel->status }} </td>
                                <td>{{ $imovel->contrato }} </td>
                                <td>{{ $imovel->tipo }} </td>
                                <td>{{ $imovel->created_at }} </td>
                                <td>
                                    <a href="{{ route('admin.imoveis.show', $imovel->id) }}" class="btn btn-primary">
                                        Detalhes</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="row text-center mt-5">
                <p class="h5">Sem imóveis</p>
            </div>
        @endif

        <div class="row mt-4">
            {{ $imoveis->links('custom.navigation') }}
        </div>
    </div>

@endsection
