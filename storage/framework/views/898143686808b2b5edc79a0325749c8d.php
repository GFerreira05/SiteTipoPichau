

<?php $__env->startSection("admin_template"); ?>

<?php
    // Configurações de título e endpoint para inserção ou alteração
    $titulo = isset($usuarios) ? "Alteração do Usuarios" : "Inclusão de um Novo Usuarios";
    $endpoint = isset($usuarios) ? url('/usuarios/update') : url('/usuarios/novo');
    $input_nome = isset($usuarios) ? $usuarios['nome'] : old('nome');
    $input_email = isset($usuarios) ? $usuarios['email'] : old('email');
    $input_senha = isset($usuarios) ? $usuarios['senha'] : old('senha');
    $input_telefone = isset($usuarios) ? $usuarios['telefone'] : old('telefone');
    $input_tipo_usuario = isset($usuarios) ? $usuarios['tipo_usuario'] : old('tipo_usuario');
    $input_id = isset($usuarios) ? $usuarios['id'] : old('id'); // Novo ID para criação ou existente para edição
?>

<div class="container-fluid px-4">
    <h1 class="mt-4"><?php echo e($titulo); ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e($endpoint); ?>">
                <?php echo csrf_field(); ?>

                
                <?php if(isset($usuarios)): ?>
                    <div class="form-group mb-3">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" 
                        id="id" 
                        name="id" 
                        readonly value="<?php echo e($input_id); ?>">
                    </div>
                <?php endif; ?>

                
                <div class="form-group mb-3">
                    <label for="nome">Nome do Usuario</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    id="nome" 
                        name="nome" 
                        placeholder="Digite o nome do usuario"
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

                
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <textarea class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="email" 
                        name="email" 
                        placeholder="Digite o email"><?php echo e($input_email); ?></textarea>
                    <?php $__errorArgs = ['email'];
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

                <div class="form-group mb-3">
                    <label for="email">senha</label>
                    <textarea class="form-control <?php $__errorArgs = ['senha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="senha" 
                        name="senha" 
                        placeholder="Digite a senha"><?php echo e($input_senha); ?></textarea>
                    <?php $__errorArgs = ['senha'];
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

                <div class="form-group mb-3">
                    <label for="email">telefone</label>
                    <textarea class="form-control <?php $__errorArgs = ['telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="telefone" 
                        name="telefone" 
                        placeholder="Digite o telefone (opcional)"><?php echo e($input_telefone); ?></textarea>
                    <?php $__errorArgs = ['telefone'];
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

                <div class="form-group mb-3">
                    <label for="tipo_usuario">Tipo de Usuário</label>
                    <select class="form-control <?php $__errorArgs = ['tipo_usuario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="tipo_usuario" 
                        name="tipo_usuario">
                        <option value="Comum" <?php echo e(old('tipo_usuario', $input_tipo_usuario) == 'Comum' ? 'selected' : ''); ?>>Comum</option>
                        <option value="Admin" <?php echo e(old('tipo_usuario', $input_tipo_usuario) == 'Admin' ? 'selected' : ''); ?>>Admin</option>
                    </select>
                    <?php $__errorArgs = ['tipo_usuario'];
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
                    <a href="<?php echo e(url('/usuarios')); ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin_layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\S.I\2024\2°Semestre\Escobar - Liguagem e Progamação Web II\02GG\pratico\resources\views/usuarios/formulario.blade.php ENDPATH**/ ?>