@extends('public.layout.index')
@section('titulo', 'Detalhes')
{{-- @section('body-color', '#ebecee') --}}
@section('conteudo')

    <!-- Modal -->
    <div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Taxa de Visita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Será cobrada uma taxa de 1500 Kz pela visita ao imóvel.
                </div>
                <form action="{{ route('calendario') }}" method="post">
                    @csrf
                    <input type="hidden" name="imovel_id" value="{{ $imovel->id }}">
                    @if (isset($id_intermediario))
                        <input type="hidden" name="user_id" value="{{ $id_intermediario }}">
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <row class="mt-4">
            @include('components.mensagem')
        </row>
        @auth
            @if (auth()->user()->tipo == 'intermediario')
                <div class="row justify-content-end mt-4 ">
                    <div class="col-auto">
                        <button class="btn btn-info" id="btn{{ $imovel->id }}"
                            onclick="copiarLink(this.id, '{{ route('site.paginaIntermediarioDetalhesImovel', ['id_intermediario' => auth()->user()->id, 'id_imovel' => $imovel->id]) }}')">Copiar
                            link</button>
                    </div>
                </div>
            @endif
        @endauth
    </div>

    <div class="container">
        <div class="row my-4 mx-2 my-md-5 mx-md-0 px-3" style="box-shadow: 0 0 5px; border-radius:5px">
            <div class="col-12 mt-4 ">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i >= 1)
                                @if (!empty($imovel->imagens[$i]))
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{ $i }}"
                                        aria-label="Slide {{ $i + 1 }}"></button>
                                @endif
                            @endif

                        @endfor

                    </div>
                    <div class="carousel-inner">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i == 0)
                                <div class="carousel-item active">
                                    <div class="swiper-slide"><img src="{{ url('storage/' . $imovel->imagens[$i]->url) }}"
                                            alt="Imagem 1"></div>
                                </div>
                            @else
                                @if (!empty($imovel->imagens[$i]))
                                    <div class="carousel-item">
                                        <div class="swiper-slide"><img
                                                src="{{ url('storage/' . $imovel->imagens[$i]->url) }}" alt="Imagem 1">
                                        </div>
                                    </div>
                                @endif
                            @endif

                        @endfor

                    </div>


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 px-x p-m-0 mt-3 mt-lg-4 justify-content-between mb-5">
                <div class="row">
                    <div class="col mb-4 mb-lg-0">
                        <h1 class="">{{ $imovel->tipo }} para {{ $imovel->contrato }} no Cazenga</h1>
                        <h4 class="my-4 fw-bold">Preço: <span class="text-info">
                                {{ number_format($imovel->preco, 2, ',', '.') }} Kz</span> </h4>
                        <p><span class="fw-bold">Localizacao:</span> {{ $imovel->casa_n }}, {{ $imovel->rua }},
                            {{ $imovel->bairro }},
                            Cazenga</p>
                        @if (!empty($imovel->dimensao))
                            <p><span class="fw-bold">Dimensao:</span> {{ $imovel->dimensao }}</p>
                        @endif

                        @if (!empty($imovel->descricao))
                            <div class="col-12">
                                <span class="fw-bold ">Descricao:</span>
                                <textarea name="" id="meuTextarea" class="textarea" readonly>{{ $imovel->descricao }}
            </textarea>
                            </div>
                        @endif
                        @if (!empty($imovel->nDeQuartos))
                            <p><span class="fw-bold">Nº de quartos:</span> {{ $imovel->nDeQuartos }}</p>
                        @endif
                        <hr>

                        <p><span class="fw-bold">Telefone: </span> <span
                                class="text-primary fw-bold">{{ $site->telefone1 }}</span></p>
                        @if (!empty($imovel->whatsapp))
                            <p><span class="fw-bold">Whatsapp:</span><span
                                    class="text-primary fw-bold">{{ $imovel->whatsapp }}
                                </span> </p>
                        @endif
                        <button type="button" class="btn btn-primary btn-lg fw-bold" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle">AGENDAR VISITA</button>
                    </div>
                    <div id="mapa" class=" col-lg-6 me-2" style="border: solid 1px black">
                        <p>MAPA</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('mapa')
    <script>
        var map = L.map('mapa').setView([-8.834068387545921, 13.294777574585988],
            13); // Coordenadas de Angola e zoom inicial

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        marker = L.marker([-8.834068387545921, 13.294777574585988]).addTo(map); // Coordenadas da localização da entidade

        function geocodeAndAddMarker(address) {
            // Requisição para a API de geocodificação do OpenStreetMap (Nominatim)
            fetch(`https://nominatim.openstreetmap.org/search?q=${address}&format=json`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        // Coordenadas da localização encontrada
                        var lat = parseFloat(data[0].lat);
                        var lon = parseFloat(data[0].lon);
                        // Adiciona marcador no mapa
                        L.marker([lat, lon]).addTo(map).bindPopup(address).openPopup();

                        // Ajusta o centro do mapa para a nova localização
                        map.setView([lat, lon], 15); // Ajuste o zoom conforme necessário
                    } else {
                        console.error('Nenhuma localização encontrada para o endereço: ' + address);
                    }
                })
                .catch(error => console.error('Erro ao geocodificar o endereço:', error));
        }

        // Chamada da função com o endereço da sua entidade
        var rua = '{{ $imovel->rua }}'
        var bairro = '{{ $imovel->bairro }}'
        var endereco = `${rua},${bairro},Cazenga`; // Endereço da sua entidade
        geocodeAndAddMarker(endereco);

        // Ajustar a altura do textarea conforme o conteúdo
        function ajustarAlturaTextarea() {
            const textarea = document.getElementById('meuTextarea');
            textarea.style.height = 'auto'; // Redefinir a altura para automático
            textarea.style.height = `${textarea.scrollHeight}px`; // Definir a altura com base no scrollHeight
        }

        // Chamar a função de ajuste de altura quando a página carregar e quando o conteúdo do textarea mudar
        window.onload = ajustarAlturaTextarea;
        document.getElementById('meuTextarea').addEventListener('input', ajustarAlturaTextarea);
    </script>
@endpush
@push('script')
    <script>
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
