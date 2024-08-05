@extends('public.layout.index')
@section('titulo', 'Cadastrar Imovel')
@section('conteudo')

    <div class="container py-5">
        <div class="row">
            @include('components.mensagem')
            <div class="col">
                <h1 class="mb-4 text-muted">Cadastro de imóvel</h1>
                <div class="card">
                    <div class="card-body">
                        {{-- FORMULARIO --}}
                        <form action="{{ route('imoveis.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="status" value="pendente">
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="contrato"
                                            aria-label="Floating label select example" required autofocus>
                                            <option selected>Selecione</option>
                                            <option value="venda">Venda</option>
                                            <option value="aluguel">Aluguel</option>
                                        </select>
                                        <label class="text-muted" for="floatingSelect">Contrato<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="tipo"
                                            aria-label="Floating label select example">
                                            <option selected>Escolha uma opcao</option>

                                            @foreach ($tipos as $tipo)
                                                <option value="{{ $tipo->nome }}">{{ $tipo->nome }}</option>
                                            @endforeach
                                            <option value="">outro</option>

                                            {{-- <optgroup label="Residencial">
                                        <option value="casa">Casa</option>
                                        <option value="apartamento">Apartamento</option>
                                    </optgroup>
                                    <optgroup label="Comercial">
                                        <option value="loja">Loja</option>
                                        <option value="escritorio">Escritório</option>
                                        <option value="restaurante">Restaurante</option>
                                        <option value="hotel">Hotél</option>
                                    </optgroup>
                                    <optgroup label="Industrial">
                                        <option value="fabrica">Fábrica</option>
                                        <option value="armazem">Armazém</option>
                                        <option value="galpao">Galpão</option>
                                    </optgroup>
                                    <optgroup label="Outro">
                                        <option value="terreno">Terreno</option>
                                        <option value="outro">outro</option>
                                    </optgroup> --}}
                                        </select>
                                        <label class="text-muted" for="floatingSelect">Tipo<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="descricao"
                                            style="height: 250px"></textarea>
                                        <label class="text-muted" for="floatingTextarea2">Descrição</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="localizacao" value="Cazenga" class="form-control"
                                            name="localizacao" placeholder="feff" readonly>
                                        <label class="text-muted" for="localizacao">Município</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="bairro" class="form-control" name="bairro"
                                            placeholder="feff">
                                        <label class="text-muted" for="bairro">Bairro<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="rua" class="form-control" name="rua"
                                            placeholder="feff">
                                        <label class="text-muted" for="rua">Rua<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="casa_n" class="form-control" name="n_casa"
                                            placeholder="feff">
                                        <label class="text-muted" for="casa_n">Nº casa</label>
                                    </div>
                                </div>

                                {{--<div class="col-12">
                                    <div class="mb-3 form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="outro_localizacao" name="outro_localizacao"
                                            style="height: 100px"></textarea>
                                        <label class="text-muted" for="outro_localizacao">Informação de localização
                                            adicional</label>
                                    </div>
                                </div>--}}

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="dimensao" class="form-control" name="dimensao"
                                            placeholder="feff">
                                        <label class="text-muted" for="dimensao">Dimensao</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem1" class="form-control" name="imagem1"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem1">Imagem<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem2" class="form-control" name="imagem2"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem2">Imagem</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem3" class="form-control" name="imagem3"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem3">Imagem</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem4" class="form-control" name="imagem4"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem4">Imagem</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem5" class="form-control" name="imagem5"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem5">Imagem</label>
                                    </div>
                                </div>

                                {{-- Imagens --}}

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" id="preco" class="form-control" name="preco"
                                            placeholder="fef">
                                        <label class="text-muted" for="preco">Preço<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" id="nDeQuartos" class="form-control" name="n_quartos"
                                            placeholder="fef">
                                        <label class="text-muted" for="nDeQuartos">N de quartos</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" id="nomeResponsavel" class="form-control"
                                            name="dono_nome" placeholder="fef">
                                        <label class="text-muted" for="nomeResponsavel">Nome do responsavel<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" id="telefone1" class="form-control" name="dono_telefone"
                                            placeholder="fef">
                                        <label class="text-muted" for="telefone1">Telefone<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" id="telefone2" class="form-control" name="dono_email"
                                            placeholder="fef">
                                        <label class="text-muted" for="telefone2">Email</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" id="whatsapp" class="form-control" name="dono_whatsapp"
                                            placeholder="fef">
                                        <label class="text-muted" for="whatsapp">Whatsapp</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col text-end">
                                    <a href="{{ route('index') }}" class="btn btn-secondary">Cancelar</a>
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                                </div>

                            </div>

                        </form>
                        {{-- FIM DO FORMULARIO --}}

                    </div>
                </div>

                <p class="text-danger mt-4 ">
                    OBS.: Este imóvel ficará em revisão até ser aprovado e poder ser apresentado no site
                </p>
            </div>
        </div>
    </div>

@endsection
