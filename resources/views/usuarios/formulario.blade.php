@extends("admin_layout.index")

@section("admin_template")

@php

    $titulo = "Inclusão de um Novo Usuarios";
    $endpoint = '/usuarios/novo';
    $input_nome = "";
    $input_email = "";
    $input_senha = "";
    $input_telefone = "";
    $input_tipo_usuario = "";
    $input_id = "";

    if(isset($usuarios)){
        $titulo = "Alteração do Usuarios";
        $endpoint = '/usuarios/update';
        $input_nome = $usuarios['nome'];
        $input_email = $usuarios['email'];
        $input_senha = $usuarios['senha'];
        $input_telefone =$usuarios['telefone'];
        $input_tipo_usuario = $usuarios['tipo_usuario'];
        $input_id = $usuarios['id'];
    }
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
                <input type="hidden" name="id" value="{{$input_id}}">
                <label class="form-label">Nome do Usuário</label>
                <input class="form-control" name="nome" placeholder="Digite o nome do Usuário" value="{{$input_nome}}">

                <label class="form-label">Email do Usuário</label>
                <input class="form-control" name="email" placeholder="Digite o email do Usuário" value="{{$input_email}}">

                <label class="form-label">Senha do Usuário</label>
                <input class="form-control" name="senha" placeholder="Digite a senha do Usuário" value="{{$input_senha}}">

                <label class="form-label">Telefone do Usuário</label>
                <input class="form-control" name="telefone" placeholder="Digite o telefone do Usuário" value="{{$input_telefone}}">

                <label class="form-label">Status</label>
                <select class="form-control" name='tipo_usuario'>
                <option value="1" selected>Admin</option>
                <option value="0">Comum</option>
                </select>

                <br>
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
