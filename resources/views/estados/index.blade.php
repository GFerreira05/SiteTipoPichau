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
                        <table class="w-full whitespace-no-wrap" id="datatablesSimple">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">ID</th>
                                    <th class="px-4 py-3">NOME</th>
                                    <th class="px-4 py-3">PAIS</th>
                                    <th class="px-4 py-3">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="categoryTableBody">
                                @foreach ($estados as $linha)
                               
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $linha["id"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["nome"] }}</td>
                                    <td class="px-4 py-3">{{ $linha["pais"] }}</td>
                                    <td class="px-4 py-3">
                                        <a href="/estados/update/{{$linha['id']}}" class="btn btn-success"><li class="fa fa-edit"></li></a>
                                        <a href="/estados/excluir/{{$linha['id']}}" class="btn btn-danger"><li class="fa fa-trash"></li></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <a href="/estados/novo" class="btn btn-primary">Novo</a>
                
</main>

@endsection