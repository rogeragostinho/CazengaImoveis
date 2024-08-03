@extends('admin.layout.index')
@section('conteudo')
    <div class="container p-0 p-md-5">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <div class="row">
                    <div class="col">
                        @include('components.mensagem')
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                EDITAR HORÁRIO
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.visitas.update', $visita->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="data">Data:</label>
                                        <input type="date" name="data_inicio" id="data" class="form-control" value="{{$visita->data_inicio}}">
                                    </div>
                                    {{--<div class="mb-3">
                                        <label for="data">Data fim:</label>
                                        <input type="date" name="data_fim" id="data" class="form-control" value="{{$visita->data_fim}}">
                                    </div>--}}
                                    <div class="mb-3">
                                        <label for="status">Status:</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="{{$visita->status}}" selected>{{$visita->status}}</option>
                                            <option value="disponivel">Disponível</option>
                                            <option value="agendado">Agendado</option>
                                            <option value="cancelado">Cancelado</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary fw-bold">CRIAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
