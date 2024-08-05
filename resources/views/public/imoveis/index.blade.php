@extends('public.layout.index')
@section('titulo', 'Home')
@section('conteudo')

    <div class="container">
        <div class="row">
            @include('components.mensagem')
        </div>
    </div>

    

    {{-- IMOVEIS --}}
    <div class="container">

        <div class="row mt-5">
            <div class="col-12 my-4">
                <div class="col-12 mb-3">
                    <h3 class="fw-bold"><span class="py-2"
                            style="border-left:solid 5px #0dcaf0; margin-right:10px"></span>
                        IMÓVEIS ENCONTRADOS
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
    {{-- FIM IMOVEIS --}}

    <div class="container">
        <div class="row my-3">
            {{-- Paginação --}}
            {{ $imoveis->links('custom.navigation') }}
        </div>
    </div>

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
