@extends("admin_layout.index")

@section("admin_template")

@php
    $titulo = "Inclusão de uma Nova Categoria";
    $endpoint = "/categoria/novo";
    $input_nome = "";
    $input_descricao = "";
    $input_id = "";

    if(isset($categoria)){
    $titulo = "Alteração da Categoria";
    $endpoint = '/categoria/update';
    $input_nome = $categoria['nome'];
    $input_descricao = $categoria['descricao'];
    $input_id = $categoria['id'];
    }
@endphp

<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $titulo }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Categorias</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $endpoint }}">
                @csrf
                <input type="hidden" name="id" value="{{$input_id}}">
                <label class="form-label">Nome da categoria</label>
                <input class="form-control" name="nome" placeholder="Digite o nome da categoria" value="{{$input_nome}}">

                <label class="form-label">Descrição da categoria</label>
                <input class="form-control" name="descricao" placeholder="Digite a descrição da categoria" value="{{$input_descricao}}">

                <label class="form-label">Status</label>
                <select class="form-control" name='status'>
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
                </select>

                <br>
                {{-- Botões de Ação --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ url('/categoria') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
