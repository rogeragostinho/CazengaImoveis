@extends('admin.layout.index')
@section('titulo', 'Tipos')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row mb-4 bg-white py-2">
            <div class="col-auto">
                <a href="{{ route('admin.tipos.create') }}" class="btn btn-primary">Adicionar</a>
            </div>
        </div>

        <div class="row bg-white p-2">

            @foreach ($tipos as $tipo)
                @if ($tipo->id % 2)
                    <div id="col{{ $tipo->id }}" class="col-12 py-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="fw-bold">
                                    {{ strtoupper($tipo->nome) }}
                                </span>
                            </div>
                            <div class="col">
                                <div class="row g-1 justify-content-end ">
                                    <div class="col-auto">
                                        <a href="{{ route('admin.tipos.edit', $tipo->id) }}"><button class="btn text-primary"><i
                                                    class="fa fa-pencil fa-lg" aria-hidden="true"></i></button></a>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('admin.tipos.destroy', $tipo->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $tipo->id }}">
                                            <button type="submit" class="btn text-danger"><i class="fa fa-trash fa-lg"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="col{{ $tipo->id }}" class="col-12  py-2" style="background-color: #ebecee">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="fw-bold">
                                    {{ strtoupper($tipo->nome) }}
                                </span>
                            </div>
                            <div class="col">
                                <div class="row justify-content-end g-1">
                                    <div class="col-auto">
                                        <a href="{{ route('admin.tipos.edit', $tipo->id) }}"><button class="btn text-primary"><i
                                                    class="fa fa-pencil fa-lg" aria-hidden="true"></i></button></a>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('admin.tipos.destroy', $tipo->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $tipo->id }}">
                                            <button type="submit" class="btn text-danger"><i class="fa fa-trash fa-lg"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

@endsection

@push('script')
    <script>
        function show(id) {
            document.querySelector(`div#${id}`).
        }
    </script>
@endpush
