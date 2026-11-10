<?php
    $steps = collect($timeline ?? [])->filter(fn ($step) => !empty($step['title']))->values();
?>

<section id="curiosidades" class="border-b border-border bg-bg/60 px-6 py-24 md:px-12 md:py-32">
    <div class="mx-auto max-w-6xl">
        <div class="reveal">
            <?php if (isset($component)) { $__componentOriginal1289ed7a7566caee9d9374ccbe752a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-label','data' => ['index' => '04']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => '04']); ?>Outras curiosidades <?php echo $__env->renderComponent(); ?>
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
            Minha jornada profissional
        </h2>
        <p class="reveal mx-auto mt-5 max-w-xl text-center text-muted md:mx-0 md:text-left">
            Período a período, os passos que me trouxeram até aqui.
        </p>
        <div class="curio-track mt-10 md:mt-14 md:border-t md:border-border">
            <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="curio-card reveal md:grid md:grid-cols-12 md:gap-6 md:border-b md:border-border md:py-10">
                    <span class="label-mono md:col-span-3"><?php echo e($step['period']); ?></span>

                    <div class="mt-3 md:col-span-6 md:mt-0">
                        <h3 class="text-xl font-bold text-ink"><?php echo e($step['title']); ?></h3>
                        <p class="mt-3 text-sm leading-relaxed text-muted"><?php echo e($step['desc']); ?></p>
                    </div>

                    <?php if(!empty($step['tags'])): ?>
                        <div class="mt-4 flex flex-wrap gap-2 md:col-span-3 md:mt-0 md:justify-end">
                            <?php $__currentLoopData = $step['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="h-fit rounded-full border border-border px-3 py-1 text-xs text-muted"><?php echo e($tag); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/sections/outras-curiosidades.blade.php ENDPATH**/ ?>