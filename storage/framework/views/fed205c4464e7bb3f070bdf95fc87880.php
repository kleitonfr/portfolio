<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['stacks' => ['estrelas' => []]]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['stacks' => ['estrelas' => []]]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<div class="letreiro" aria-hidden="true">
    <div class="letreiro-trilho">
        <?php for($volta = 0; $volta < 2; $volta++): ?>
            <?php $__currentLoopData = $stacks['estrelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $estrela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="letreiro-item <?php echo e($i % 3 === 0 ? 'letreiro-item--cheio' : ''); ?>"><?php echo e($estrela['nome']); ?></span>
                <?php if (isset($component)) { $__componentOriginala0a9c17f5081d4ad171d541fba3553d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0a9c17f5081d4ad171d541fba3553d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.brilho','data' => ['class' => 'letreiro-brilho']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('brilho'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'letreiro-brilho']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0a9c17f5081d4ad171d541fba3553d1)): ?>
<?php $attributes = $__attributesOriginala0a9c17f5081d4ad171d541fba3553d1; ?>
<?php unset($__attributesOriginala0a9c17f5081d4ad171d541fba3553d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0a9c17f5081d4ad171d541fba3553d1)): ?>
<?php $component = $__componentOriginala0a9c17f5081d4ad171d541fba3553d1; ?>
<?php unset($__componentOriginala0a9c17f5081d4ad171d541fba3553d1); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endfor; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/sections/letreiro.blade.php ENDPATH**/ ?>