@extends('public.layout.index')

@section('conteudo')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-auto">
                <a href="{{route('imoveis.create')}}" class="a btn btn-primary">Adicionar</a>
            </div>
        </div>
        <div class="row">
            @forelse (auth()->user()->Imoveis as $imovel)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card w-100" style="width: 18rem;">
                        @if (isset($imovel->imagens[0]))
                            <img src="{{ url('storage/' . $imovel->imagens[0]->url) }}" class="img  card-img-top img-fluid"
                                alt="...">
                        @else
                            <img src="{{ asset('img/4.jfif') }}" class="img  card-img-top img-fluid" alt="...">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $imovel->tipo }} para {{ $imovel->contrato }}</h5>
                            <p class="card-text text-truncate">{{ $imovel->descricao }} </p>

                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <a href="{{ route('users.show', $imovel->id) }}" class="btn btn-primary">
                                        Detalhes</a>
                                </div>
                                <div class="col-auto">
                                    @include('components.modalConfirmacao')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Excluir
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col text-center mt-5">
                <h5>Sem imóveis para apresentar.</h5>
            </div>
            @endforelse
        </div>
    </div>
@endsection
