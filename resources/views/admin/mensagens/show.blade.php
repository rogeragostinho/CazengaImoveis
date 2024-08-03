@extends('admin.layout.index')
@section('titulo', 'Mensagem')
@section('conteudo')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row justify-content-between mt-4 bg-white py-2">
            <div class="col">
                <h6>Email: {{ $mensagem->email }} </h6>
            </div>
            <div class="col-auto">
                <form action="{{ route('admin.mensagens.destroy', $mensagem->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $mensagem->id }}">
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>

        <div class="row my-3 bg-white py-3">
            <h2>Assunto: {{ $mensagem->assunto }}</h2>
        </div>
        
        <div class="row bg-white py-3">
            <h5>Conteudo:</h5>
            <p>{{ $mensagem->conteudo }} </p>
        </div>
    </div>

@endsection
