<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo', 'CazengaImoveis')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <script src="{{ asset('js/leaflet.js') }}"></script>

    <style>
        main {
            min-height: calc(100vh - (72px + 120px))
        }

        .img-carrousel {
            height: 600px;
            width: 100%;
        }

        .sobre {
            font-size: 1.5em;
        }

        .texto {
            font-size: 1em;
            font-weight: 500
        }

        .cartao {
            background-color: rgb(231, 234, 235)
        }

        .carousel {
            width: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: 500px;
        }

        .bg-infor {
            background-color: rgba(0, 110, 255, 0.137)
        }

        #mapa {
            min-height: 400px;
        }

        .textarea {
            width: 100%;
            /* Defina a largura como 100% para ocupar o espaço disponível */
            height: auto;
            /* Defina a altura automática */
            resize: none;
            /* Desative a capacidade de redimensionar */
            border: none;
            /* Remova a borda */
            background-color: transparent;
            /* Remova o fundo */
            outline: none;
            /* Remova o contorno ao focar */
            overflow: hidden;
            /* Oculte qualquer conteúdo excedente */
            font-family: Arial, sans-serif;
            /* Defina a fonte */
            font-size: 16px;
            /* Defina o tamanho da fonte */
            color: #333;
            /* Defina a cor do texto */
            margin: 0
        }
    </style>
</head>

<body style="background-color: @yield('body-color', '')">
    {{-- CABEÇALHO --}}
    <header>
        <div class="container-fluid bg-dark text-white">
            <div class="container">
                <div class="row justify-content-between px-5 py-1">
                    <div class="col-auto">contato@cazengaimoveis.com</div>
                    <div class="col-auto">921760220</div>
                    <div class="col-auto">957951585</div>
                </div>
            </div>
        </div>

        {{-- NAVBAR --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary py-4 " {{-- data-bs-theme="dark" --}}>
            <div class="container">
                <a class="navbar-brand text-whit h1 me-5 ms-2" style="font-size:1.7em"
                    href="{{ route('index') }}">CazengaImóveis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-dark me-auto mb-2 mb-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link fw-bol text-dark" aria-current="page"
                                href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle f-bold  text-dark" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Imoveis
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('imoveis.index') }}">Ver todos</a></li>
                                @auth
                                    <li><a class="dropdown-item" href="{{ route('imoveis.create') }}">Publicar
                                            Imóvel</a></li>
                                @endauth
                                <li><a class="dropdown-item" href="{{ route('site.sobre') }}#procurarImovel">Não
                                        encontrou o imóvel que procura?</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-bold  text-dark" aria-current="page"
                                href="{{ route('site.sobre') }}#sobre">Sobre
                                nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link f-bold text-dark " aria-current="page"
                                href="{{ route('site.sobre') }}#contactos">Contactos</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link f-bold  text-dark" aria-current="page"
                                    href="{{ route('intermediarios.create') }}">Seja
                                    um intermediário</a>
                            </li>
                        @endauth
                    </ul>

                    <ul class="navbar-nav  mb-2 mb-lg-0 ">
                        @auth
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil
                                        </a></li>
                                    <li><a class="dropdown-item" href="{{ route('users.imoveis') }}">Meus Imóveis
                                        </a></li>
                                    @if (auth()->user()->tipo == 'intermediario')
                                        <li><a class="dropdown-item" href="{{ route('users.links') }}">Links
                                            </a></li>
                                    @endif
                                    @if (auth()->user()->tipo == 'administrador')
                                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">Admin Dashboard
                                            </a></li>
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Sair</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page" href="{{ route('login') }}"><button
                                        type="button" class="btn fw-bold "
                                        style="border:none; outline:none; margin-right:-5px">Login</button></a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="nav-link active  me-0" aria-current="page" href="{{ route('register') }}"><button
                                        type="button" class="btn btn-info text-white fw-bold  me-0">Cadastrar</button></a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        {{-- FIM DA NAVBAR --}}
    </header>
    {{-- FIM DO CABEÇALHO --}}


    <main>
        {{-- <div class="container conteudo"> </div> --}}
        @yield('conteudo')

    </main>

    {{-- RODAPÉ --}}
    <footer>
        <div class="container-fluid p-5 text-white " style="background-color: #04323b">
            <div class="row justify-content-between mt-3">
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('index') }}" class="text-decoration-none text-white">
                                <h3>
                                    cazengaimoveis
                                </h3>
                            </a>
                            <p class="mt-4" style="font-size:0.9em">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, incidunt esse eaque
                                laudantium
                                provident illo aliquid eum similique. Nulla quo maiores itaque ea quibusdam id
                                voluptatem harum
                                possimus natus nemo!
                            </p>
                        </div>
                        <div class="col-12">
                            <ul class="p-0 d-flex" style="list-style: none;display:inline;">
                                <li>
                                    <a href="#" class="text-decoraion-none text-white">
                                        F
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-decoraion-none text-white">
                                        F
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-decoraion-none text-white">
                                        F
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-decoraion-none text-white">
                                        F
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-decoraion-none text-white">
                                        F
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md">
                    <div class="row justify-content-start justify-content-md-center mt-5 mt-md-0 mb-5">
                        <div class=" col-auto">
                            <h5 class="mb-4 text-start fw-bold" style="font-size:1.2em">LINKS</h6>
                                <ul class="p-0 text-start"
                                    style="list-style: none; font-size:0.9em; line-height:1.7em">
                                    <li>
                                        <a href="#" class="text-decoration-none text-white">
                                            Contatos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-decoration-none text-white">
                                            Imóveis
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-decoration-none text-white">
                                            Corretores
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-decoration-none text-white">
                                            Sobre
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-decoration-none text-white">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-decoration-none text-white">
                                            Login
                                        </a>
                                    </li>
                                </ul>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md">
                    <h6 class="fw-bold mb-4" style="font-size:1.2em">BUSCAR IMÓVEL</h6>
                    <p style="font-size: 0.9em">Digite o ID do imóvel</p>
                    <form action="" method="post">
                        @csrf
                        <input type="search" name="id" class="form-control p-2 mb-2 text-white px-3"
                            style="background-color: #04323b; border:solid 1px #0dcaf0" placeholder="ID ou Código">
                        <button type="submit" class="btn btn-lg p- text-white fw-bold btn-info"
                            style="font-size: 0.9em">BUSCAR</button>
                    </form>
                </div>

            </div>
        </div>
        </div>
    </footer>
    {{-- FIM DO RODAPÉ --}}

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('mapa')
    @stack('script')
</body>

</html>
