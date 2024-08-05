@extends('public.layout.index')
@section('titulo', 'Seja um intermediário')
@section('conteudo')

    <div class="container py-5">
        <div class="row justify-content-center">

            @include('components.mensagem')
            
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-primary my-4 ">
                            Preencha por favor o seguinte formulário, e entraremos em contacto consigo o mais rápidamente
                            possivel.
                        </h6>
                        <form action="{{ route('intermediarios.store') }}" method="post">
                            @csrf
                            <div class="col mb-3">
                                <label for="" class="form-label">Nome</label><br>
                                <input type="text" class="form-control" name="name" id="" autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Email</label><br>
                                <input type="email" class="form-control" name="email" id="">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Telefone</label><br>
                                <input type="text" class="form-control" name="telefone" id="">
                            </div>

                            <!--<div class="mb-3">
                                <label for="" class="form-label">Senha</label><br>
                                <input type="text" class="form-control" name="password" id="">
                            </div>-->

                            <div class="mb-3">
                                <label for="" class="form-label">Comentário</label><br>
                                <textarea name="descricao" class="form-control" id="" rows="3"></textarea>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
