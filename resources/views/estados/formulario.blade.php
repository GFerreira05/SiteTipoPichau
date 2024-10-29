@extends("admin_layout.index")

@section("admin_template")

@php
    $titulo = "Cadastro do Estado";
    $endpoint = "/estados/novo";
    $input_nome = "";
    $input_id = "";
    $input_id_paises = "";


    if(isset($estados)){
        $titulo = "Alteração do estado";
        $endpoint = "/produto/update";
        $input_nome = $estados["nome"];
        $input_id = $estados["id"];
        $input_id_paises = $estados["paises_id"];
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
                <label class="form-label">Nome de estado</label>
                <input class="form-control" name="nome" placeholder="Nome do estado" value="{{$input_nome}}">

                <label class="form-label">Pais</label>
                <select class="form-control" name='paises_id'>
                    @foreach($paises as $dado)
                        <option value='{{$dado["id"]}}' {{$dado["id"] == $input_id_paises  ? 'selected' : ''}}>{{$dado['nome']}}</option>
                    @endforeach
                </select>
                <br/>
                <input type="submit" class="btn btn-success" value="Salvar">
                <a href="{{ url('/estados') }}" class="btn btn-secondary">Cancelar</a>
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
