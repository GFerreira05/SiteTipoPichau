@extends("admin_layout.index")

@section("admin_template")

@php
    $titulo = "Cadastro do Estado";
    $endpoint = "/enderecos/novo";
    $input_local = "";
    $input_id = "";
    $input_id_cidades = "";
    $input_id_estados = "";
    $input_id_paises = "";
    $input_id_usuarios = "";


    if(isset($enderecos)){
        $titulo = "Alteração do estado";
        $endpoint = "/enderecos/update";
        $input_local = $enderecos["local"];
        $input_id = $enderecos["id"];
        $input_id_cidades = $enderecos["cidades_id"];
        $input_id_estados = $enderecos["estados_id"];
        $input_id_paises = $enderecos["paises_id"];
        $input_id_usuarios = $enderecos["usuarios_id"];
    }
@endphp

<h1 class="h3 mb-4 text-gray-800">{{$titulo}}</h1>
<div class="card">
        <div class="card-header">
            Estados
        </div>
        <div class="card-body">
            <form method="post" action="{{$endpoint}}" enctype="multipart/form-data">
                @CSRF
                <input type="hidden" name="id" value="{{$input_id}}">
                <label class="form-label">Local do Endereço</label>
                <input class="form-control" name="local" placeholder="local do Endereço" value="{{$input_local}}">

                <label class="form-label">Cidade</label>
                <select class="form-control" name='cidades_id'>
                    @foreach($cidades as $dado)
                        <option value='{{$dado["id"]}}' {{$dado["id"] == $input_id_cidades  ? 'selected' : ''}}>{{$dado['nome']}}</option>
                    @endforeach
                </select>

                <label class="form-label">Estado</label>
                <select class="form-control" name='estados_id'>
                    @foreach($estados as $dado)
                        <option value='{{$dado["id"]}}' {{$dado["id"] == $input_id_estados  ? 'selected' : ''}}>{{$dado['nome']}}</option>
                    @endforeach
                </select>

                <label class="form-label">Pais</label>
                <select class="form-control" name='paises_id'>
                    @foreach($paises as $dado)
                        <option value='{{$dado["id"]}}' {{$dado["id"] == $input_id_paises  ? 'selected' : ''}}>{{$dado['nome']}}</option>
                    @endforeach
                </select>

                <label class="form-label">Usuário</label>
                <select class="form-control" name='usuarios_id'>
                    @foreach($usuarios as $dado)
                        <option value='{{$dado["id"]}}' {{$dado["id"] == $input_id_usuarios  ? 'selected' : ''}}>{{$dado['nome']}}</option>
                    @endforeach
                </select>
                <br/>
                <input type="submit" class="btn btn-success" value="Salvar">
            </form>

        </div>
</div>
<script>
         ClassicEditor
                 .create( document.querySelector( '#descricao' ) )
                 .then( editor => {
                         console.log( editor );
                 } )
                 .catch( error => {
                         console.error( error );
                                } );
</script>
@endsection
