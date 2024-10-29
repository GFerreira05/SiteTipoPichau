@extends("admin_layout.index")

@section("admin_template")

@php
    $titulo = "Inclusão de um Novo Pais";;
    $endpoint = "/paises/novo";
    $input_nome = "";
    $input_id = "";

    if(isset($paises)){
    $titulo = "Alteração do Pais";
    $endpoint = "/paises/update";
    $input_nome = $paises['nome'];
    $input_id = $paises['id'];
    }
@endphp

<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $titulo }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Paises</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $endpoint }}">
                @csrf

                {{-- Campo de ID (visível apenas para edição) --}}
                @if(isset($categoria))
                    <div class="form-group mb-3">
                        <label for="id">ID</label>
                        <input type="text"
                            class="form-control"
                            id="id"
                            name="id"
                            readonly
                            value="{{ $input_id }}">
                    </div>
                @endif

                {{-- Nome da Categoria --}}
                <div class="form-group mb-3">
                    <label for="nome">Nome do Pais</label>
                    <input type="text"
                        class="form-control @error('nome') is-invalid @enderror"
                        id="nome"
                        name="nome"
                        placeholder="Digite o nome do Pais"
                        value="{{ $input_nome }}">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <br>

                {{-- Botões de Ação --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ url('/paises') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
