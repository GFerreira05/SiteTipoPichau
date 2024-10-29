@extends("admin_layout.index")

@section("admin_template")

@php
    $titulo = "Cadastro da Cidades";
    $endpoint = "/cidades/novo";
    $input_nome = "";
    $input_id = "";
    $input_id_estados = "";


    if(isset($cidades)){
        $titulo = "Alteração da cidade";
        $endpoint = "/cidades/update";
        $input_nome = $cidades["nome"];
        $input_id = $cidades["id"];
        $input_id_estados = $cidades["estados_id"];
    }
@endphp

<h1 class="h3 mb-4 text-gray-800">{{$titulo}}</h1>
<div class="card">
        <div class="card-header">
            Cidades
        </div>
        <div class="card-body">
            <form method="post" action="{{$endpoint}}" enctype="multipart/form-data">
                @CSRF
                <input type="hidden" name="id" value="{{$input_id}}">
                <label class="form-label">Nome de Cidades</label>
                <input class="form-control" name="nome" placeholder="Nome da cidade" value="{{$input_nome}}">

                <label class="form-label">Estado</label>
                <select class="form-control" name='estados_id'>
                    @foreach($estados as $dado)
                        <option value='{{$dado["id"]}}' {{$dado["id"] == $input_id_estados  ? 'selected' : ''}}>{{$dado['nome']}}</option>
                    @endforeach
                </select>
                <br/>
                <input type="submit" class="btn btn-success" value="Salvar">
                <a href="{{ url('/cidades') }}" class="btn btn-secondary">Cancelar</a>
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
