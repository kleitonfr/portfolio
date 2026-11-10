<div>
    <!--[if BLOCK]><![endif]--><?php if(count($projetos)): ?>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $projetos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginaldbcceabf4a99a34f9999233ae1fef693 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcceabf4a99a34f9999233ae1fef693 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.project-card','data' => ['project' => $project,'accent' => ['sun', 'pink', 'aqua', 'violet'][$loop->index % 4]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('project-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['project' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($project),'accent' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['sun', 'pink', 'aqua', 'violet'][$loop->index % 4])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbcceabf4a99a34f9999233ae1fef693)): ?>
<?php $attributes = $__attributesOriginaldbcceabf4a99a34f9999233ae1fef693; ?>
<?php unset($__attributesOriginaldbcceabf4a99a34f9999233ae1fef693); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcceabf4a99a34f9999233ae1fef693)): ?>
<?php $component = $__componentOriginaldbcceabf4a99a34f9999233ae1fef693; ?>
<?php unset($__componentOriginaldbcceabf4a99a34f9999233ae1fef693); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php else: ?>
        <div class="rounded-3xl border border-dashed border-ink/20 bg-white/70 p-8 text-center text-sm text-muted">
            Ainda não há projetos cadastrados no banco de dados.
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\xampp\htdocs\portfolio\resources\views/livewire/project-gallery.blade.php ENDPATH**/ ?>