@extends('public.layout.index')
@section('titulo', 'Sobre')
@section('conteudo')

    <div class="container py-4">

        <div id="sobre" class="row py-4">
            <div class="container">
                <div class="col">
                    <h1>Sobre</h1>
                    <p class="sobre">
                        {{ $config->sobre }}

                    </p>
                </div>
            </div>
        </div>

        <div class="row bg-primary-subtl mb-5">

            <div class="col-xl-4 me-1  py-3 cartao bg-secondary-subtl bg-gradient mb-3 mb-xl-0">
                <div class="row align-items-center justify-content-center">
                    <div class="row justify-content-center align-items-center gx-2">
                        <div class="col-auto">
                            <i class="fas fa-compass text-danger" style="width:32px; height:32px;"></i>
                        </div>
                        <div class="col-auto">
                            <h1 class=" text-danger">Missão</h1>
                        </div>


                    </div>
                    <div class="row text-center" text-center>

                        <p class="texto me-3">{{ $config->missao }} </p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 me-1 py-3  cartao bg-secondary-subtl mb-3 mb-xl-0">
                <div class="row align-items-center justify-content-center">
                    <div class="row justify-content-center align-items-center gx-2">
                        <div class="col-auto ">
                            <i class="fas fa-binoculars text-primary" style="width:32px; height:32px;"></i>
                        </div>
                        <div class="col-auto">
                            <h1 class="text-primary"> Visão</h1>
                        </div>


                    </div>

                    <div class="row text-center">

                        <p class="texto">{{ $config->visao }} </p>
                    </div>

                </div>
            </div>

            <div class="col  py-3  cartao  bg-secondary-subtl mb-3 mb-xl-0">
                <div class="row align-items-center justify-content-center">
                    <div class="row justify-content-center align-items-center gx-2">
                        <div class="col-auto">
                            <i class="fas fa-heart text-success" style="width:32px; height:32px;"></i>
                        </div>
                        <div class="col-auto">
                            <h1 class="text-success">Valores</h1>
                        </div>


                    </div>
                    <div class="row text-center">

                        <p class="texto me-3">{{ $config->valores }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="contactos" class="row">
            <h1>Contactos</h1>
            <p class="texto">
                Estamos sempre disponíveis para ajudá-lo com suas necessidades imobiliárias. Entre em contato conosco
                através dos seguintes meios:
            </p>
            <div class="col-12 mb-2">
                <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                        <i class="fa-brands fa-facebook text-primary" style="width: 24px; height:24px"></i>
                    </div>
                    <div class="col-auto">
                        <h4>{{ $config->facebook }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                        <i class="fa-solid fa-phone text-primary" style="width: 24px; height:24px"></i>
                    </div>
                    <div class="col-auto">
                        <h4>{{ $config->telefone1 }}/ {{ $config->telefone2 }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                        <i class="fa-brands fa-square-whatsapp text-success" style="width: 24px; height:24px"></i>
                    </div>
                    <div class="col-auto">
                        <h4>{{ $config->whatsapp }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-12  mb-2">
                <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                        <i class="fa-brands fa-square-instagram text-primary" style="width: 24px; height:24px"></i>
                    </div>
                    <div class="col-auto">
                        <h4>{{ $config->instagram }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-12  mb-2">
                <div class="row gx-1 align-items-center">
                    <div class="col-auto">
                        <i class="fa-solid fa-envelope text-danger" style="width: 24px; height:24px"></i>
                    </div>
                    <div class="col-auto">
                        <h4>cazengaimoveis@gmail.com</h4>
                    </div>
                </div>
            </div>

            <div class="col-12  mb-2">
                <div class="row gx-1 align-items-center">
                    <div class="col-auto">
                        <i class="fa-solid fa-location-dot text-danger" style="width: 24px; height:24px"></i>
                    </div>
                    <div class="col-auto">
                        <h4>Rua Principal, Bairro Central, Cazenga, Angola</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">

            <div id="procurarImovel" class="row mb-5">
                @include('components.mensagem')
                <div class="col-12">
                    <p>
                        Você também pode preencher o formulário abaixo para nos enviar uma mensagem diretamente. Nossa
                        equipe
                        terá
                        prazer em ajudá-lo a encontrar o imóvel perfeito para você.
                    </p>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('mensagens.store') }}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="email" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="assunto" id="assunto" class="form-control"
                                        placeholder="assunto" required>
                                    <label for="assunto">Assunto</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea type="text" name="conteudo" id="conteudo" class="form-control" placeholder="conteudo"
                                        style="height: 200px" required></textarea>
                                    <label for="conteudo">Conteudo</label>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
    </div>


@endsection
