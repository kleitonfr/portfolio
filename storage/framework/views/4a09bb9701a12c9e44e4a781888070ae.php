<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['contact' => []]));

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

foreach (array_filter((['contact' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<section id="contato" class="relative overflow-hidden bg-bg/60 px-6 py-24 md:px-12 md:py-32">
    
    <div class="grade-horizonte" aria-hidden="true"></div>

    <div class="relative z-10 mx-auto max-w-6xl">
        <div class="reveal">
            <?php if (isset($component)) { $__componentOriginal1289ed7a7566caee9d9374ccbe752a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-label','data' => ['index' => '05']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => '05']); ?>Vamos trabalhar juntos? <?php echo $__env->renderComponent(); ?>
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
            Fale <span class="text-spectrum">comigo</span>
        </h2>
        <p class="reveal mx-auto mt-5 max-w-xl text-center text-muted md:mx-0 md:text-left">
            Aberto a projetos, parcerias e oportunidades que envolvam tecnologia com propósito.
        </p>

        <div class="reveal mt-12 grid gap-4 md:grid-cols-2">
            <?php if(!empty($contact['email'])): ?>
                <a href="mailto:<?php echo e($contact['email']); ?>" class="group flex items-center justify-between rounded-2xl border border-border bg-surface p-8 transition-colors hover:border-sun">
                    <span>
                        <span class="label-mono block">E-mail</span>
                        <span class="mt-2 block break-all font-display text-lg font-bold text-ink"><?php echo e($contact['email']); ?></span>
                    </span>
                    <span class="text-xl text-sun transition-transform group-hover:translate-x-1">&rarr;</span>
                </a>
            <?php endif; ?>

            <?php if(!empty($contact['whatsapp'])): ?>
                <a href="<?php echo e($contact['whatsapp']); ?>" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between rounded-2xl border border-border bg-surface p-8 transition-colors hover:border-aqua">
                    <span>
                        <span class="label-mono block">WhatsApp</span>
                        <span class="mt-2 block font-display text-lg font-bold text-ink">Conversa direta</span>
                    </span>
                    <span class="text-xl text-aqua transition-transform group-hover:translate-x-1">&rarr;</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH D:\xampp\htdocs\portfolio\resources\views/sections/contato.blade.php ENDPATH**/ ?>