@extends('admin.layout.index')
@section('titulo', 'Editar Imovel')
@section('conteudo')

    <div class="container py-5">
        <div class="row">

            @include('components.mensagem')
            
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {{-- FORMULARIO --}}
                        <form action="{{ route('admin.imoveis.update', $imovel->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @for ($i = 0; $i < 5; $i++)
                                @if (isset($imovel->imagens[$i]->id))
                                    <input type="hidden" name="id_imagem{{ $i + 1 }}" value="{{ $imovel->imagens[$i]->id }}">
                                @endif
                            @endfor
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="contrato"
                                            aria-label="Floating label select example" required>
                                            <option value="venda" selected>{{ $imovel->contrato }}</option>
                                            <option value="venda">Venda</option>
                                            <option value="aluguel">aluguel</option>
                                        </select>
                                        <label class="text-muted" for="floatingSelect">Contrato<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelect" name="tipo"
                                            aria-label="Floating label select example" required>
                                            <option selected>{{ $imovel->tipo }}</option>
                                            @foreach ($tiposImoveis as $tipo)
                                                <option value="{{ $tipo->nome }}">{{ $tipo->nome }}</option>
                                            @endforeach
                                        </select>
                                        <label class="text-muted" for="floatingSelect">Tipo<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="descricao"
                                            style="height: 300px">{{ $imovel->descricao }}</textarea>
                                        <label class="text-muted" for="floatingTextarea2">Descrição</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="localizacao" value="Cazenga" class="form-control" name="localizacao"
                                            placeholder="feff" readonly>
                                        <label class="text-muted" for="localizacao">Município</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="bairro" value="{{ $imovel->bairro }}" class="form-control" name="bairro"
                                            placeholder="feff">
                                        <label class="text-muted" for="bairro"><span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="rua" value="{{ $imovel->rua }}" class="form-control" name="rua"
                                            placeholder="feff">
                                        <label class="text-muted" for="rua">Rua<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="casa_n" value="{{ $imovel->n_casa }}" class="form-control" name="n_casa"
                                            placeholder="feff">
                                        <label class="text-muted" for="casa_n">Nº casa</label>
                                    </div>
                                </div>
                        
                                {{--<div class="col-12">
                                    <div class="mb-3 form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="outro_localizacao" name="outro_localizacao"
                                            style="height: 100px">{{ $imovel->outro_localizacao }}</textarea>
                                        <label class="text-muted" for="outro_localizacao">Informação de localização adicional</label>
                                    </div>
                                </div>--}}
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="text" id="dimensao" value="{{ $imovel->dimensao }}" class="form-control"
                                            name="dimensao" placeholder="feff">
                                        <label class="text-muted" for="dimensao">Dimensao</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem1" value="" class="form-control" name="imagem1"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem1">Imagem<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem2" value="" class="form-control" name="imagem2"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem2">Imagem</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem3" value="" class="form-control" name="imagem3"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem3">Imagem</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem4" value="" class="form-control" name="imagem4"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem4">Imagem</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="mb-3 form-floating">
                                        <input type="file" id="imagem5" value="" class="form-control" name="imagem5"
                                            placeholder="feff">
                                        <label class="text-muted" for="imagem5">Imagem</label>
                                    </div>
                                </div>
                        
                        
                        
                                {{-- Imagens --}}
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" id="preco" value="{{ $imovel->preco }}" class="form-control"
                                            name="preco" placeholder="fef" required>
                                        <label class="text-muted" for="preco">Preço<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" id="nDeQuartos" value="{{ $imovel->nDeQuartos }}" class="form-control"
                                            name="n_quartos" placeholder="fef">
                                        <label class="text-muted" for="nDeQuartos">N de quartos</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" id="nomeResponsavel" value="{{ $imovel->dono_nome }}"
                                            class="form-control" name="dono_nome" placeholder="fef">
                                        <label class="text-muted" for="nomeResponsavel">Nome do responsavel<span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" id="telefone1" value="{{ $imovel->dono_telefone }}" class="form-control"
                                            name="dono_telefone" placeholder="fef" required>
                                        <label class="text-muted" for="telefone1">Telefone<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" id="telefone2" value="{{ $imovel->dono_email }}" class="form-control"
                                            name="dono_email" placeholder="fef">
                                        <label class="text-muted" for="telefone2">Email</label>
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" id="whatsapp" value="{{ $imovel->dono_whatsapp }}" class="form-control"
                                            name="dono_whatsapp" placeholder="fef">
                                        <label class="text-muted" for="whatsapp">Whatsapp</label>
                                    </div>
                                </div>
                        
                            </div>
                        
                            <div class="row ">
                                <div class="col text-end">
                                    <a href="{{ route('admin.imoveis.show', $imovel->id) }}" class="btn btn-danger">Cancelar</a>
                                    <button class="btn btn-primary" type="submit">Editar</button>
                                </div>
                        
                            </div>
                        
                        </form>
                        
                        {{-- FIM FORMULARIO --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
