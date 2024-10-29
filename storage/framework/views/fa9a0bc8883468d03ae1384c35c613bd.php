<?php $__env->startSection("admin_template"); ?>

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
                                    <th class="px-4 py-3">LOCAL</th>
                                    <th class="px-4 py-3">CIDADES</th>
                                    <th class="px-4 py-3">ESTADOS</th>
                                    <th class="px-4 py-3">PAIS</th>
                                    <th class="px-4 py-3">USUÁRIOS</th>
                                    <th class="px-4 py-3">OPÇÕES</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" id="categoryTableBody">
                                <?php $__currentLoopData = $enderecos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3"><?php echo e($linha["id"]); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha["local"] ? $linha["local"] : 'casa, prédio, condomínio'); ?>

                                    <td class="px-4 py-3"><?php echo e($linha["cidade"]); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha["estado"]); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha["pais"]); ?></td>
                                    <td class="px-4 py-3"><?php echo e($linha["usuario"]); ?></td>
                                    <td class="px-4 py-3">
                                        <a href="/enderecos/update/<?php echo e($linha['id']); ?>" class="btn btn-success"><li class="fa fa-edit"></li></a>
                                        <a href="/enderecos/excluir/<?php echo e($linha['id']); ?>" class="btn btn-danger"><li class="fa fa-trash"></li></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <a href="/enderecos/novo" class="btn btn-primary">Novo</a>

</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin_layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\S.I\2024\2°Semestre\Escobar - Liguagem e Progamação Web II\02GG\pratico\resources\views/enderecos/index.blade.php ENDPATH**/ ?>