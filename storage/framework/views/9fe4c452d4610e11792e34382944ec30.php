<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['project' => [], 'accent' => 'aqua']));

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

foreach (array_filter((['project' => [], 'accent' => 'aqua']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $accentText = [
        'sun' => 'text-sun',
        'pink' => 'text-pink',
        'aqua' => 'text-aqua',
        'violet' => 'text-violet',
    ][$accent] ?? 'text-aqua';

    $accentBorder = [
        'sun' => 'hover:border-sun',
        'pink' => 'hover:border-pink',
        'aqua' => 'hover:border-aqua',
        'violet' => 'hover:border-violet',
    ][$accent] ?? 'hover:border-aqua';
?>

<a
    href="<?php echo e(route('projects.show', ['slug' => $project['slug']])); ?>"
    class="group reveal card-brilho flex flex-col overflow-hidden rounded-2xl border border-border bg-surface transition-colors <?php echo e($accentBorder); ?>"
>
    <div class="relative aspect-[4/3] w-full overflow-hidden bg-gradient-to-br from-surface2 to-bg">
        <!--[if BLOCK]><![endif]--><?php if(!empty($project['image'])): ?>
            <img src="<?php echo e(asset($project['image'])); ?>" alt="<?php echo e($project['title']); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
        <?php else: ?>
            <div class="flex h-full items-center justify-center p-6 text-center font-display text-lg font-extrabold text-ink/80"><?php echo e($project['title']); ?></div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if(!empty($project['is_award'])): ?>
            <span class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full bg-sun px-3 py-1 label-mono !text-[#0b0b10]">&#9733; Premiado</span>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <div class="flex flex-1 flex-col gap-3 p-7">
        <span class="label-mono <?php echo e($accentText); ?>"><?php echo e($project['subtitle'] ?: $project['title']); ?></span>
        <h3 class="text-xl font-bold text-ink"><?php echo e($project['title']); ?></h3>
        <p class="flex-1 text-sm leading-relaxed text-muted"><?php echo e($project['excerpt']); ?></p>

        <!--[if BLOCK]><![endif]--><?php if(!empty($project['tags'])): ?>
            <div class="flex flex-wrap gap-2 pt-1">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = array_slice($project['tags'], 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="rounded-full border border-border px-3 py-1 text-xs text-muted"><?php echo e($tag); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <span class="mt-2 text-sm font-semibold text-ink transition-transform group-hover:translate-x-1">Abrir &rarr;</span>
    </div>
</a>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/components/project-card.blade.php ENDPATH**/ ?>