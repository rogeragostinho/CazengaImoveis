@extends('public.layout.index')
@section('body-color', '#ebecee')
@section('conteudo')

    @include('components.modalConfirmacao')

    <div class="container p-0 p-md-5">
        <div class="row">
            @include('components.mensagem')
        </div>

        <div class="row  justify-content-between bg-white py-2">
            <div class="col-auto">
                <div class="row g-2">
                    <div class="col-auto"><a href="{{ route('imoveis.edit', $imovel->id) }}" class="btn btn-primary">Editar</a>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div class="row bg-white p-3 mt-4">
            <div class="col-12">
                <h4><span class="fw-bold">Status: </span> {{ $imovel->status }}</h4>
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5 class="fw-bold mb-3">Dados do dono do imóvel</h5>
                        <p><span class="fw-bold">Nome: </span> {{ $imovel->dono_nome }} </p>
                        <p><span class="fw-bold">Telefone: </span> {{ $imovel->dono_telefone }} </p>
                        <p><span class="fw-bold">Whatsapp: </span> {{ $imovel->dono_whatsapp }} </p>
                        <p><span class="fw-bold">Email: </span> {{ $imovel->dono_email }} </p>
                        <p><span class="fw-bold">Morada: </span> {{ $imovel->dono_morada }} </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col">
                                <p><span class="fw-bold">Contrato: </span> {{ $imovel->contrato }} </p>
                                <p><span class="fw-bold">Preço do imóvel: </span>
                                    {{ number_format($imovel->preco, 2, ',', '.') }}
                                </p>
                                <p><span class="fw-bold">Comissão Imobiliária(%): </span>
                                    {{ $imovel->comissao_imobiliaria }} </p>
                                @php
                                    $comissao_imobiliaria = ($imovel->preco * $imovel->comissao_imobiliaria) / 100;
                                @endphp
                                <p><span class="fw-bold">Comissao Imobiliária: </span>
                                    {{ number_format($comissao_imobiliaria, 2, ',', '.') }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 my-md-5 bg-white px-3">
            <div class="col-12 mt-5 ">
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

                    </div>
                    <div id="mapa" class=" col-lg-6 me-2" style="border: solid 1px black">
                        <p>MAPA</p>
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
    