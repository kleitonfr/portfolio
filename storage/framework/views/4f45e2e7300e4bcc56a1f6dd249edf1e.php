<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['socialLinks' => [], 'contact' => []]));

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

foreach (array_filter((['socialLinks' => [], 'contact' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<footer class="relative z-[1] border-t border-border bg-bg/85 px-6 py-14 md:px-12">
    <div class="mx-auto flex max-w-6xl flex-col items-center gap-8 text-center md:flex-row md:items-end md:justify-between md:text-left">
        <div class="max-w-md">
            <p class="font-display text-lg font-bold text-ink">Kleiton Ferreira</p>
            <p class="mt-2 text-sm leading-relaxed text-muted">
                Desenvolvedor full stack com foco em soluções digitais humanas, acessíveis e com impacto social.
            </p>
        </div>

        <div class="flex flex-wrap justify-center gap-3 md:justify-start">
            <?php $__currentLoopData = $socialLinks ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item['url']); ?>" target="_blank" rel="noopener noreferrer" class="rounded-full border border-border px-4 py-2 text-sm text-muted transition-colors hover:border-sun hover:text-sun">
                    <?php echo e($item['label']); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <p class="label-mono mx-auto mt-10 max-w-6xl text-center text-mutedDim md:text-left">
        <?php echo e($contact['location'] ?? ''); ?> &middot; <?php echo e(date('Y')); ?>

    </p>
</footer>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/components/footer.blade.php ENDPATH**/ ?>