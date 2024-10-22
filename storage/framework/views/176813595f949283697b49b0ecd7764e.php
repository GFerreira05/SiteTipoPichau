

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
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">NOME</th>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">DESCRIÇÃO</th>
                            <th class="px-4 py-3">STATUS</th>
                        </tr>
                        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($linha->id); ?></td>
                            <td><?php echo e($linha->cat_nome); ?></td>
                            <td><?php echo e($linha->cat_descricao); ?></td>
                            <td><?php echo e($linha->cat_ativo); ?></td>
                            <td>
                                <a href="<?php echo e(route('categoria_upd', [ 'id' => $linha->id ])); ?>" class='btn btn-success'>
                                    <li class='fa fa-pencil'></li>
                                </a>
                                | 
                                <a href="<?php echo e(route('categoria_ex', [ 'id' => $linha->id ])); ?>" class='btn btn-danger'>
                                    <li class='fa fa-trash'></li>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </thead>
                        <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



      

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\GG\pratico\resources\views/categoria/index.blade.php ENDPATH**/ ?>