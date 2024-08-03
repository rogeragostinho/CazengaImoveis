@extends('admin.layout.index')
@section('conteudo')

    <div class="container p-0 p-md-5">

        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row bg-white py-2">
            <div class="col-auto">
                <a href="{{ route('admin.visitas.create') }}" class="btn btn-primary">Adicionar</a>
            </div>
        </div>

        @if (count($visitas) > 0)
            <div class="row bg-white mt-4 p-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>STATUS</th>
                            <th>DATA</th>
                            {{--<th>DATA FIM</th>--}}
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($visitas as $visita)
                            <tr>
                                <th>{{ $visita->id }} </th>
                                <td>{{ $visita->status }} </td>
                                <td>{{ $visita->data_inicio }} </td>
                                {{--<td>{{ $visita->data_fim }} </td>--}}
                                <td>
                                    <div>
                                        <div class="row g-1">
                                            <div class="col-auto">
                                                <a href="{{ route('admin.visitas.edit', $visita->id) }}"
                                                    class="btn btn-primary fw-bold">
                                                    EDITAR</a>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{ route('admin.visitas.destroy', $visita->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger fw-bold">ELIMINAR</button>
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
            <div class="row text-center mt-5">
                <p class="h5">Sem horários definidos</p>
            </div>
        @endif

        {{-- <div class="row mt-4">
            {{ $visitas->links('custom.navigation') }}
        </div> --}}

    </div>

@endsection
