@extends("admin_layout.index")

@section("admin_template")

@php
    // Configurações de título e endpoint para inserção ou alteração
    $titulo = isset($categoria) ? "Alteração da Categoria" : "Inclusão de uma Nova Categoria";
    $endpoint = isset($categoria) ? url('/categoria/update') : url('/categoria/novo');
    $input_nome = isset($categoria) ? $categoria['cat_nome'] : old('cat_nomes');
    $input_descricao = isset($categoria) ? $categoria['cat_descricao'] : old('cat_descricao');
    $input_id = isset($categoria) ? $categoria['id'] : old('id'); // Novo ID para criação ou existente para edição
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
                    <label for="cat_nome">Nome da Categoria</label>
                    <input type="text" 
                        class="form-control @error('cat_nomes') is-invalid @enderror" 
                        id="cat_nome" 
                        name="cat_nomes" 
                        placeholder="Digite o nome da categoria"
                        value="{{ $input_nome }}">
                    @error('cat_nomes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Descrição da Categoria --}}
                <div class="form-group mb-3">
                    <label for="cat_descricao">Descrição</label>
                    <textarea class="form-control @error('cat_descricao') is-invalid @enderror"
                        id="cat_descricao" 
                        name="cat_descricao" 
                        placeholder="Digite a descrição (opcional)">{{ $input_descricao }}</textarea>
                    @error('cat_descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

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
