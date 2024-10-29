<?php $__env->startSection("admin_template"); ?>

<?php
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
?>

<h1 class="h3 mb-4 text-gray-800"><?php echo e($titulo); ?></h1>
<div class="card">
        <div class="card-header">
            Estados
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo e($endpoint); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($input_id); ?>">
                <label class="form-label">Local do Endereço</label>
                <input class="form-control" name="local" placeholder="local do Endereço" value="<?php echo e($input_local); ?>">

                <label class="form-label">Cidade</label>
                <select class="form-control" name='cidades_id'>
                    <?php $__currentLoopData = $cidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value='<?php echo e($dado["id"]); ?>' <?php echo e($dado["id"] == $input_id_cidades  ? 'selected' : ''); ?>><?php echo e($dado['nome']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label class="form-label">Estado</label>
                <select class="form-control" name='estados_id'>
                    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value='<?php echo e($dado["id"]); ?>' <?php echo e($dado["id"] == $input_id_estados  ? 'selected' : ''); ?>><?php echo e($dado['nome']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label class="form-label">Pais</label>
                <select class="form-control" name='paises_id'>
                    <?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value='<?php echo e($dado["id"]); ?>' <?php echo e($dado["id"] == $input_id_paises  ? 'selected' : ''); ?>><?php echo e($dado['nome']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <label class="form-label">Usuário</label>
                <select class="form-control" name='usuarios_id'>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value='<?php echo e($dado["id"]); ?>' <?php echo e($dado["id"] == $input_id_usuarios  ? 'selected' : ''); ?>><?php echo e($dado['nome']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin_layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\S.I\2024\2°Semestre\Escobar - Liguagem e Progamação Web II\02GG\pratico\resources\views/enderecos/formulario.blade.php ENDPATH**/ ?>