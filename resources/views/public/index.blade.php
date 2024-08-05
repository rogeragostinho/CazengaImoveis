@extends('public.layout.index')
@section('titulo', 'Home')
@section('conteudo')

    <div class="container">
        <div class="row">
            @include('components.mensagem')
        </div>
    </div>

    {{-- BANNER _ ULTIMOS IMOVEIS ADICIONADOS --}}
    <div class="container-fluid ">
        <div class="row bg p-0">

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="background-color: #f7f7f7">
                <div class="carousel-indicators">
                    @for ($i = 0; $i < count($imoveis); $i++)
                        @if ($i == 0)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $i }}" class="active" aria-current="true"
                                aria-label="Slide {{ $i + 1 }}"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                        @endif
                    @endfor
                </div>
                <div class="carousel-inner w-100">

                    @for ($i = 0; $i < count($imoveis); $i++)

                        @if ($i == 0)
                            <div class="carousel-item active">
                                <img src="{{ url('storage/' . $imoveis[$i]->imagens[0]->url) }}"
                                    class="d-block w-100 img-carrousel" alt="...">
                                <div class="carousel-caption d-none d-md-block w-50 mx-auto mb-5 px-5">
                                    <div class="row bg-white text-dark px-4 pt-4 pb-3 align-items-center">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-12 text-start">
                                                    <h3 class="fw-bold">{{ strtoupper($imoveis[$i]->tipo) }} -
                                                        {{ strtoupper($imoveis[$i]->contrato) }}</h3>
                                                </div>
                                                <div class="col-12 text-start">
                                                    <p><i class="fa fa-map"></i> Cazenga</p>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            @if ($imoveis[$i]->contrato == 'venda')
                                                                <p class="bg-danger text-white fw-bold py-1 px-3"
                                                                    style="font-size: 0.8em">
                                                                    PARA {{ strtoupper($imoveis[$i]->contrato) }} </p>
                                                            @else
                                                                <p class="bg-primary text-white fw-bold py-1 px-3"
                                                                    style="font-size: 0.8em">
                                                                    PARA {{ strtoupper($imoveis[$i]->contrato) }} </p>
                                                            @endif

                                                        </div>

                                                        <div class="col-auto">
                                                            <p class="fw-bold text-info" style="font-size:1.2em">
                                                                {{ number_format($imoveis[$i]->preco,2,',','.') }} Kz
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       {{--}} <div class="col-auto">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col mb">
                                                            A
                                                        </div>
                                                        <div class="col">
                                                            B
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            C
                                                        </div>
                                                        <div class="col">
                                                            D
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ url('storage/' . $imoveis[$i]->imagens[0]->url) }}"
                                    class="d-block w-100 img-carrousel" alt="...">
                                <div class="carousel-caption d-none d-md-block w-50 mx-auto mb-5 px-5">
                                    <div class="row bg-white text-dark px-4 pt-4 pb-3 align-items-center">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-12 text-start">
                                                    <h3 class="fw-bold">{{ strtoupper($imoveis[$i]->tipo) }} -
                                                        {{ strtoupper($imoveis[$i]->contrato) }}</h3>
                                                </div>
                                                <div class="col-12 text-start">
                                                    <p><i class="fa fa-map"></i> Cazenga</p>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            @if ($imoveis[$i]->contrato == 'venda')
                                                                <p class="bg-danger text-white fw-bold py-1 px-3"
                                                                    style="font-size: 0.8em">
                                                                    PARA {{ strtoupper($imoveis[$i]->contrato) }} </p>
                                                            @else
                                                                <p class="bg-primary text-white fw-bold py-1 px-3"
                                                                    style="font-size: 0.8em">
                                                                    PARA {{ strtoupper($imoveis[$i]->contrato) }} </p>
                                                            @endif

                                                        </div>

                                                        <div class="col-auto">
                                                            <p class="fw-bold text-info" style="font-size: 1.2em">
                                                                {{ number_format($imoveis[$i]->preco,2,',','.') }} Kz
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{--<div class="col-auto">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div class="row">
                                                        <div class="col mb">
                                                            A
                                                        </div>
                                                        <div class="col">
                                                            B
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col">
                                                            C
                                                        </div>
                                                        <div class="col">
                                                            D
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endfor
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
    {{-- FIM BANNER --}}

    {{-- PAINEL PESQUISA AVANÇADA --}}
    <div class="container-fluid" style="background-color: #f7f7f7">
        <div class="container pt-4 pb-5">

            <div class="row py-5">
                <div class="col-12 mb-4">
                    <h3 class="fw-bold"><span class="py-2"
                            style="border-left:solid 5px #0dcaf0; margin-right:10px"></span>QUAL IMÓVEL ESTÁ
                        PROCURANDO?</h3>
                </div>

                <div class="col-12">
                    <div class="" id="collapseExample">
                        <form action="">
                            @csrf
                            <div class="row cols-4 g-2 align-items-center">
                                <div class="col-6 col-md-4">
                                    <div class="form-floating">
                                        <select name="contrato" class="form-select" id="contrato"
                                            aria-label="Floating label select example">
                                            @if (isset($Vcontrato))
                                                @if ($Vcontrato == 'venda')
                                                    <option value="all">Todos</option>
                                                    <option value="venda" selected>Venda</option>
                                                    <option value="aluguel">Aluguel</option>
                                                @else
                                                    @if ($Vcontrato == 'aluguel')
                                                        <option value="all">Todos</option>
                                                        <option value="venda">Venda</option>
                                                        <option value="aluguel" selected>Aluguel</option>
                                                    @else
                                                        <option value="all" selected>Todos</option>
                                                        <option value="venda">Venda</option>
                                                        <option value="aluguel">Aluguel</option>
                                                    @endif
                                                @endif
                                            @else
                                                <option value="all" selected>Todos</option>
                                                <option value="venda">Venda</option>
                                                <option value="aluguel">Aluguel</option>
                                            @endif

                                        </select>
                                        <label for="contrato">Contrato</label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-floating">
                                        <select name="tipo" class="form-select" id="tipo"
                                            aria-label="Floating label select example">
                                            <option value="all" selected>Todos</option>
                                            @foreach ($tipos as $tipo)
                                                @if (isset($Vtipo))
                                                    @if ($tipo->nome == $Vtipo)
                                                        <option value="{{ $tipo->nome }}" selected>{{ $tipo->nome }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $tipo->nome }}">{{ $tipo->nome }} </option>
                                                    @endif
                                                @else
                                                    <option value="{{ $tipo->nome }}">{{ $tipo->nome }} </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="tipo">Tipo</label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-floating">
                                        <select name="nQuartos" class="form-select" id="nQuartos"
                                            aria-label="Floating label select example">
                                            <option value="all" selected>Todos</option>

                                            @for ($i = 1; $i < 6; $i++)
                                                @if (isset($nQuartos))
                                                    @if ($i == $nQuartos)
                                                        <option value="{{ $i }}" selected>{{ $i }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $i }}">{{ $i }} </option>
                                                    @endif
                                                @else
                                                    <option value="{{ $i }}">{{ $i }} </option>
                                                @endif
                                            @endfor
                                        </select>
                                        <label for="nQuartos">Nº de quartos</label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-floating">
                                        <input type="number"
                                            @if (isset($vMin)) @if ($vMin) value="{{ $vMin }}"
                                @else
                                value="0" @endif
                                        @else value="0" @endif
                                        name="vMin" class="form-control" id="vMin"
                                        placeholder="name@example.com"
                                        min="0">
                                        <label for="vMin">Preço mínimo</label>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-floating">
                                        <input type="number"
                                            @if (isset($vMax)) @if ($vMax) value="{{ $vMax }}"
                                @else
                                value="0" @endif
                                        @else value="0" @endif
                                        name="vMax" class="form-control" id="vMax"
                                        placeholder="name@example.com"
                                        min="0">
                                        <label for="vMax">Preço máximo</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <button type="button" onclick="pesquisar()"
                                        class="btn btn-lg btn-info text-white fw-bold w-100 "
                                        style="height: 100%">BUSCAR</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- FIM PAINEL PESQUISA AVANÇADA --}}

    {{-- ULTIMOS IMOVEIS --}}
    <div class="container">

        <div class="row mt-5">
            <div class="col-12 my-4">
                <div class="col-12 mb-3">
                    <h3 class="fw-bold"><span class="py-2"
                            style="border-left:solid 5px #0dcaf0; margin-right:10px"></span>ÚLTIMOS
                        IMÓVEIS
                    </h3>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            {{-- Lista dos imoveis --}}

            @if ($imoveis->count() > 0)
                @for ($i = 0; $i < $imoveis->count(); $i++)
                    {{-- IMÓVEL --}}
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card w-100" style="width: 18rem;">
                            <a href="{{ route('imoveis.show', $imoveis[$i]->id) }}" class="">
                                <img src="{{ url('storage/' . $imoveis[$i]->imagens[0]->url) }}"
                                    class="img d-block w-100 card-img-top img-fluid" alt="...">
                            </a>

                            <div class="card-body">
                                <p class="card-text text-truncate text-info fw-bold mb-2" style="font-size: 1.2em">
                                    {{ number_format($imoveis[$i]->preco,2,',','.') }} Kz
                                </p>
                                <h4 class="card-title text-truncate fw-bold">{{ $imoveis[$i]->tipo }} para
                                    {{ $imoveis[$i]->contrato }}</h4>
                                <p class="text-secondary fw-bol" style="font-size:0.8em"><i class="fa fa-map"></i>
                                    Cazenga</p>
                                @auth
                                    @if (auth()->user()->tipo == 'intermediario')
                                        <div>
                                            <div class="row justify-content-between">
                                                <div class="col-auto">
                                                    <a href="{{ route('imoveis.show', $imoveis[$i]->id) }}"
                                                        class="btn btn-primary">
                                                        Detalhes</a>
                                                </div>
                                                <div class="col-auto">
                                                    <button class="btn btn-info" id="btn{{ $imoveis[$i]->id }}"
                                                        onclick="copiarLink(this.id, '{{ route('site.paginaIntermediarioDetalhesImovel', ['id_intermediario' => auth()->user()->id, 'id_imovel' => $imoveis[$i]->id]) }}')">Copiar
                                                        link</button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('imoveis.show', $imoveis[$i]->id) }}" class="btn btn-primary">
                                            Detalhes</a>
                                    @endif
                                @else
                                    <a href="{{ route('imoveis.show', $imoveis[$i]->id) }}" class="btn btn-primary">
                                        Detalhes</a>
                                @endauth


                            </div>
                        </div>
                    </div>
                    {{-- FIM IMÓVEL --}}
                @endfor
            @else
                <div class="col text-center">
                    @if (isset($not))
                        <p>Nenhum resultado corresponde à sua pesquisa</p>
                    @else
                        <p>Sem imóveis</p>
                    @endif

                </div>
            @endif

            {{-- FIM Lista dos imoveis --}}

        </div>

    </div>
    {{-- FIM ULTIMOS IMOVEIS --}}

    <script src="{{ asset('js/pesquisaAvancada.js') }}"></script>
@endsection

@push('script')
    <script>
        console.log(window);

        function copiarLink(id, link) {
            /*console.log('ola')
            console.log(id)
            console.log(link)

            console.log('merda')*/
            //var textoElement = document.getElementById("texto");
            //var texto = textoElement.textContent;
            var texto = link;

            // Cria um elemento de input dinamicamente
            var inputElement = document.createElement("input");
            inputElement.value = texto;
            document.body.appendChild(inputElement);

            // Seleciona o conteúdo do input
            inputElement.select();

            // Copia o conteúdo selecionado para a área de transferência
            document.execCommand("copy");

            // Remove o elemento de input da página
            document.body.removeChild(inputElement);

            // Altera o texto do botão após copiar
            //this.textContent = "Texto Copiado!";

            document.querySelector(`button#${id}`).textContent = "Link Copiado!";
            document.querySelector(`button#${id}`).style.fontWeight = "bold";

            setTimeout(() => {
                document.querySelector(`button#${id}`).textContent = "Copiar link";
                document.querySelector(`button#${id}`).style.fontWeight = "normal";
            }, 3000);
        }
    </script>
@endpush
