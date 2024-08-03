@if ($mensagem = Session::get('sucesso'))
    <div class="alert alert-success" role="alert">
        {{ $mensagem }}
    </div>
@endif

@if ($mensagem = Session::get('erro'))
    <div class="alert alert-danger" role="alert">
        {{ $mensagem }}
    </div>
@endif

@if ($mensagem = Session::get('aviso'))
    <div class="alert alert-warning" role="alert">
        {{ $mensagem }}
    </div>
@endif

@if ($mensagem = Session::get('email'))
    <div class="alert alert-success" role="alert">
        {{ $mensagem }}
    </div>
@endif

@if ($mensagem = Session::get('status'))
    <div class="alert alert-success" role="alert">
        {{ $mensagem }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p class="m-0">{{ $error }}</p>
        @endforeach
    </div>
@endif
