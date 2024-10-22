

<?php $__env->startSection("admin_template"); ?>
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
                                    <th class="px-4 py-3">DESCRIÇÃO</th>
                                    <th class="px-4 py-3">STATUS</th>
                                    <th class="px-4 py-3">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="categoryTableBody">
                                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3"><?php echo e($linha->id); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha->cat_nome); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha->cat_descricao); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha->cat_ativo ? 'Ativo' : 'Inativo'); ?></td>
                                    <td class="px-4 py-3">
                                        <a href="#" class="btn btn-success">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        | 
                                        <a href="#" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Botão para abrir o modal -->
                <button id="openModal" class="bg-blue-500 text-white p-2 rounded">Abrir Modal</button>

                <!-- Modal -->
                <div id="modal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-20">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                        <h2 class="text-lg font-bold">Título do Modal</h2>
                        <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cat_nome" name="cat_nome" placeholder="Digite o nome da categoria" required>
                                    <label for="cat_nome">Nome da Categoria</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="cat_descricao" name="cat_descricao" placeholder="Digite a descrição da categoria" required>
                                    <label for="cat_descricao">Descrição</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-control" id="cat_ativo" name="cat_ativo" required>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                    <label for="cat_ativo">Status</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" id="saveCategoryButton" class="btn btn-primary">Salvar</button>
                            </div>
                        <button id="closeModal" class="bg-red-500 text-white mt-4 p-2 rounded">Fechar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('saveCategoryButton').addEventListener('click', function () {
        // Coletar os dados do modal
        var nome = document.getElementById('cat_nome').value;
        var descricao = document.getElementById('cat_descricao').value;
        var ativo = document.getElementById('cat_ativo').value;

        // Criar uma nova categoria (simulação)
        var newCategory = {
            id: Date.now(),  // Simulando um ID único para a nova categoria
            nome: nome,
            descricao: descricao,
            ativo: ativo == '1' ? 'Ativo' : 'Inativo'
        };

        // Adicionar a nova categoria à tabela sem recarregar a página
        var tableBody = document.getElementById('categoryTableBody');
        var newRow = `
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">${newCategory.id}</td>
                <td class="px-4 py-3">${newCategory.nome}</td>
                <td class="px-4 py-3">${newCategory.descricao}</td>
                <td class="px-4 py-3">${newCategory.ativo}</td>
                <td class="px-4 py-3">
                    <a href="#" class="btn btn-success">
                        <i class="fa fa-pencil"></i>
                    </a>
                    | 
                    <a href="#" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        `;
        tableBody.innerHTML += newRow;

        // Fechar o modal
        var modal = new bootstrap.Modal(document.getElementById('createCategoryModal'));
        modal.hide();

        // Limpar os campos do modal
        document.getElementById('cat_nome').value = '';
        document.getElementById('cat_descricao').value = '';
        document.getElementById('cat_ativo').value = '1';
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\S.I\2024\2°Semestre\Escobar - Liguagem e Progamação Web II\GG\pratico\resources\views/categoria/index.blade.php ENDPATH**/ ?>