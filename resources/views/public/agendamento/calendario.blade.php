@extends('public.layout.index')
{{-- @section('body-color', '#ebecee') --}}

@section('conteudo')
    <div class="container py-5">
        <div class="row">
            @include('components.mensagem')
        </div>
        <div class="row mb-5">
            <div class="col">
                <h5>
                    Caso não encontre nenhuma data disponível para visita no calendário,envie uma mensagem para nós.
                    <span>
                        <a href="{{ route('site.sobre') }}#contactos">Clicando aqui</a>
                    </span>
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <button id="merda" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">

    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Dados Agendamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('agendar') }}" method="post">
                    @csrf
                    @if (isset($user_id) && $user_id)
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                    @endif
                    <input type="hidden" name="imovel_id" value="{{ $imovel_id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="data">Data escolhida:</label>
                            <input type="date" class="form-control" name="data" id="data" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nome">Nome:</label>
                            <input type="text" name="cliente_nome" id="nome" class="form-control" require>
                        </div>
                        <div class="mb-3">
                            <label for="telefone">Telefone:</label>
                            <input type="text" name="cliente_telefone" id="telefone" class="form-control" require>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="cliente_email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="morada">Morada: </label>
                            <input type="text" name="cliente_morada" id="morada" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" type="button" class="btn btn-primary">Agendar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script src="{{ asset('fullcalendar-6.1.15/dist/index.global.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var eventos = {!! json_encode($eventos) !!};

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: eventos,
                editable: 0, // Se desejar permitir edição de eventos
                selectable: true, // Se desejar permitir seleção de datas
                select: function(info) {
                    // Callback ao selecionar uma data
                    console.log('Data selecionada:', info.startStr);
                    // Aqui você pode adicionar lógica para manipular a seleção da data
                },
                eventClick: function(info) {
                    // Callback ao clicar em um evento
                    //alert('Título do evento: ' + info.event.title);
                    //alert('Título do evento: ' + info.event.chave);
                    //console.log('Informações completas do evento:', info.event);
                    document.querySelector("button#merda").click()
                    document.querySelector("input#data").value = info.event.startStr
                }
            });
            //calendar.addEvent(novoEvento);
            calendar.render();
        });
    </script>
@endpush
