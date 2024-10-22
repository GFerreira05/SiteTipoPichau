@extends("admin_layout.index")

@section("admin_template")

@php
    // Configurações de título e endpoint para inserção ou alteração
    $titulo = isset($usuarios) ? "Alteração do Usuarios" : "Inclusão de um Novo Usuarios";
    $endpoint = isset($usuarios) ? url('/usuarios/update') : url('/usuarios/novo');
    $input_nome = isset($usuarios) ? $usuarios['nome'] : old('nome');
    $input_email = isset($usuarios) ? $usuarios['email'] : old('email');
    $input_senha = isset($usuarios) ? $usuarios['senha'] : old('senha');
    $input_telefone = isset($usuarios) ? $usuarios['telefone'] : old('telefone');
    $input_tipo_usuario = isset($usuarios) ? $usuarios['tipo_usuario'] : old('tipo_usuario');
    $input_id = isset($usuarios) ? $usuarios['id'] : old('id'); // Novo ID para criação ou existente para edição
@endphp

<div class="container-fluid px-4">
    <h1 class="mt-4">{{ $titulo }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $endpoint }}">
                @csrf

                {{-- Campo de ID (visível apenas para edição) --}}
                @if(isset($usuarios))
                    <div class="form-group mb-3">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" 
                        id="id" 
                        name="id" 
                        readonly value="{{ $input_id }}">
                    </div>
                @endif

                {{-- Nome da Categoria --}}
                <div class="form-group mb-3">
                    <label for="nome">Nome do Usuario</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" 
                    id="nome" 
                        name="nome" 
                        placeholder="Digite o nome do usuario"
                        value="{{ $input_nome }}">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Descrição da Categoria --}}
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <textarea class="form-control @error('email') is-invalid @enderror"
                        id="email" 
                        name="email" 
                        placeholder="Digite o email">{{ $input_email }}</textarea>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">senha</label>
                    <textarea class="form-control @error('senha') is-invalid @enderror"
                        id="senha" 
                        name="senha" 
                        placeholder="Digite a senha">{{ $input_senha }}</textarea>
                    @error('senha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">telefone</label>
                    <textarea class="form-control @error('telefone') is-invalid @enderror"
                        id="telefone" 
                        name="telefone" 
                        placeholder="Digite o telefone (opcional)">{{ $input_telefone }}</textarea>
                    @error('telefone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="tipo_usuario">Tipo de Usuário</label>
                    <select class="form-control @error('tipo_usuario') is-invalid @enderror"
                        id="tipo_usuario" 
                        name="tipo_usuario">
                        <option value="Comum" {{ old('tipo_usuario', $input_tipo_usuario) == 'Comum' ? 'selected' : '' }}>Comum</option>
                        <option value="Admin" {{ old('tipo_usuario', $input_tipo_usuario) == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('tipo_usuario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>                

                {{-- Botões de Ação --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ url('/usuarios') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
