<section id="projetos" class="border-b border-border bg-bg/60 px-6 py-24 md:px-12 md:py-32">
    <div class="mx-auto max-w-6xl">
        <div class="reveal">
            <?php if (isset($component)) { $__componentOriginal1289ed7a7566caee9d9374ccbe752a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-label','data' => ['index' => '03']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => '03']); ?>Projetos <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b)): ?>
<?php $attributes = $__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b; ?>
<?php unset($__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1289ed7a7566caee9d9374ccbe752a3b)): ?>
<?php $component = $__componentOriginal1289ed7a7566caee9d9374ccbe752a3b; ?>
<?php unset($__componentOriginal1289ed7a7566caee9d9374ccbe752a3b); ?>
<?php endif; ?>
        </div>
        <h2 class="reveal mx-auto mt-6 max-w-3xl text-center titulo-secao font-extrabold text-balance text-ink md:mx-0 md:text-left">
            Cada card abre um estudo de caso completo
        </h2>
        <p class="reveal mx-auto mt-5 max-w-2xl text-center text-muted md:mx-0 md:text-left">
            Contexto, decisões de arquitetura, resultados e imagens reais em uma página dedicada por projeto.
        </p>

        <div class="mt-14">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('project-gallery', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-431257972-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
</section>
<?php /**PATH D:\xampp\htdocs\portfolio\resources\views/sections/projetos.blade.php ENDPATH**/ ?>