<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simple-datatable.min.css') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <script src="{{ asset('js/leaflet.js') }}"></script>
    {{-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> --}}
    <style>
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

<body class="sb-nav-fixed" style="background-color: #ebecee">
    {{-- NAVBAR --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('index')}}">CazengaImóveis</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Pesquisar por..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form> --}}
        <!-- Navbar-->
        <ul class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></ul>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user fa-fw"></i>
                    {{ auth()->user()->name }} </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" id="dropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                    {{-- <li><a class="dropdown-item" href="#!">Registro de atividade</a></li> --}}
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    {{-- FIM NAVBAR --}}

    {{-- barra lateral --}}
    <div id="layoutSidenav">
        {{-- BARRA LATERAL --}}
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="{{ route('admin.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Usuários
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.usuarios.index') }}">Todos</a>
                                <a class="nav-link" href="{{ route('admin.usuarios.intermediarios') }}">Intermediários</a>
                                <a class="nav-link" href="{{ route('admin.usuarios.create') }}">Adicionar</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Imóveis
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.imoveis.index') }}">Imoveis</a>
                                <a class="nav-link" href="{{ route('admin.tipos.index') }}">Tipos</a>
                            </nav>
                        </div>
                        {{-- <div class="sb-sidenav-menu-heading">Addons</div> --}}
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Agendamentos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('admin.agendamentos.index') }}">Agendamentos</a>
                                <a class="nav-link" href="{{ route('admin.visitas.index') }}">Horários</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('admin.mensagens.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Mensagens
                        </a>
                        <a class="nav-link" href="{{ route('admin.movimentos.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Movimentos
                        </a>
                        <a class="nav-link" href="{{ route('admin.configuracoes.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                            Configurações
                        </a>
                    </div>
                </div>
                {{-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div> --}}
            </nav>
        </div>
        {{-- FIM BARRA LATERAL --}}

        {{-- CONTEUDO --}}
        <div id="layoutSidenav_content">
            <main>
                @yield('conteudo')
            </main>
        </div>
        {{-- FIM CONTEUDO --}}

    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Chart.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }} "></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }} "></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }} "></script>
    <script src="{{ asset('js/simple-datatable.min.js') }} "></script>

    <script src="{{ asset('js/datatables-simple-demo.js') }} "></script>
    @stack('script')
    @stack('graficos')
    @stack('mapa')
</body>

</html>
