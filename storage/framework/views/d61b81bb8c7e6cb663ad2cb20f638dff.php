

<?php $__env->startSection("admin_template"); ?>

<?php
    // Configurações de título e endpoint para inserção ou alteração
    $titulo = isset($paises) ? "Alteração do Pais" : "Inclusão de um Novo Pais";
    $endpoint = isset($paises) ? url('/paises/update') : url('/paises/novo');
    $input_nome = isset($paises) ? $paises['nome'] : old('nome');
    $input_id = isset($paises) ? $paises['id'] : old('id'); // Novo ID para criação ou existente para edição
?>

<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo e($titulo); ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Paises</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e($endpoint); ?>">
                <?php echo csrf_field(); ?>

                
                <?php if(isset($categoria)): ?>
                    <div class="form-group mb-3">
                        <label for="id">ID</label>
                        <input type="text" 
                            class="form-control" 
                            id="id" 
                            name="id" 
                            readonly
                            value="<?php echo e($input_id); ?>">
                    </div>
                <?php endif; ?>

                
                <div class="form-group mb-3">
                    <label for="nome">Nome do Pais</label>
                    <input type="text" 
                        class="form-control <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        id="nome" 
                        name="nome" 
                        placeholder="Digite o nome da categoria"
                        value="<?php echo e($input_nome); ?>">
                    <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="<?php echo e(url('/paises')); ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin_layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\S.I\2024\2°Semestre\Escobar - Liguagem e Progamação Web II\02GG\pratico\resources\views/Paises/formulario.blade.php ENDPATH**/ ?>