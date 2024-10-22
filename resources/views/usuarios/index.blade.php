@extends("admin_layout.index")

@section("admin_template")

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">


<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid"> 
        <div class="container px-6 mt-auto mb-auto grid">
            <div class="mt-8">

                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">NOME</th>
                                    <th class="px-4 py-3">EMAIL</th>
                                    <th class="px-4 py-3">SENHA</th>
                                    <th class="px-4 py-3">TELEFONE</th>
                                    <th class="px-4 py-3">PERMISSÃO</th>
                                    <th class="px-4 py-3">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="categoryTableBody">
                                @foreach ($usuarios as $linha)
                               
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $linha["id"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["nome"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["email"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["senha"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["telefone"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["tipo_usuario"] ? 'Admin' : 'Comum' }}</td>
                                    <td class="px-4 py-3">
                                        <a href="/usuarios/update/{{$linha['id']}}" class="btn btn-success"><li class="fa fa-edit"></li></a>
                                        <a href="/usuarios/excluir/{{$linha['id']}}" class="btn btn-danger"><li class="fa fa-trash"></li></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <a href="/usuarios/novo" class="btn btn-primary">Novo</a>
                
</main>

@endsection