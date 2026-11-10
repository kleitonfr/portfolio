<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['socialLinks' => $socialLinks ?? [],'contact' => $contact ?? [],'title' => $project['title'] . ' — Kleiton Ferreira','description' => $project['excerpt'] ?? null]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['socialLinks' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($socialLinks ?? []),'contact' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($contact ?? []),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($project['title'] . ' — Kleiton Ferreira'),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($project['excerpt'] ?? null)]); ?>

    <article class="bg-bg/70 px-6 py-20 md:px-12 md:py-28">
        <div class="mx-auto max-w-3xl">

            <a href="<?php echo e(route('home')); ?>#projetos" wire:navigate class="label-mono transition-colors hover:text-sun">
                &larr; Todos os projetos
            </a>

            <?php if(!empty($project['subtitle'])): ?>
                <p class="label-mono mt-10 text-sun"><?php echo e($project['subtitle']); ?></p>
            <?php endif; ?>

            <h1 class="mt-4 titulo-secao font-extrabold text-balance text-ink">
                <?php echo e($project['title']); ?>

            </h1>

            <?php if(!empty($project['excerpt'])): ?>
                <p class="mt-6 text-lg leading-relaxed text-muted"><?php echo e($project['excerpt']); ?></p>
            <?php endif; ?>

            <?php if($project['is_award'] && !empty($project['award_label'])): ?>
                <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-sun/40 bg-sun/10 px-4 py-2 label-mono !text-sun">
                    <span>&#9733;</span> <?php echo e($project['award_label']); ?>

                </div>
            <?php endif; ?>

            
            <?php if(array_filter([$project['role'], $project['year'], $project['status'], $project['client']])): ?>
                <div class="mt-8 flex flex-wrap gap-x-10 gap-y-5 border-t border-border pt-8">
                    <?php if(!empty($project['role'])): ?>
                        <div><span class="label-mono block">Papel</span><span class="mt-1 block text-sm font-semibold text-ink"><?php echo e($project['role']); ?></span></div>
                    <?php endif; ?>
                    <?php if(!empty($project['year'])): ?>
                        <div><span class="label-mono block">Período</span><span class="mt-1 block text-sm font-semibold text-ink"><?php echo e($project['year']); ?></span></div>
                    <?php endif; ?>
                    <?php if(!empty($project['status'])): ?>
                        <div><span class="label-mono block">Status</span><span class="mt-1 block text-sm font-semibold text-ink"><?php echo e($project['status']); ?></span></div>
                    <?php endif; ?>
                    <?php if(!empty($project['client'])): ?>
                        <div><span class="label-mono block">Cliente</span><span class="mt-1 block text-sm font-semibold text-ink"><?php echo e($project['client']); ?></span></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(!empty($project['tags'])): ?>
                <div class="mt-8 flex flex-wrap gap-2">
                    <?php $__currentLoopData = $project['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="rounded-full border border-border px-3 py-1 text-xs text-muted"><?php echo e($tag); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            
            <?php if(!empty($project['external_url']) || !empty($project['linkedin_url']) || !empty($project['repo_url'])): ?>
                <div class="mt-6 flex flex-wrap gap-3">
                    <?php if(!empty($project['external_url'])): ?>
                        <a href="<?php echo e($project['external_url']); ?>" target="_blank" rel="noopener noreferrer" class="btn-sm">Acessar o site &nearr;</a>
                    <?php endif; ?>
                    <?php if(!empty($project['linkedin_url'])): ?>
                        <a href="<?php echo e($project['linkedin_url']); ?>" target="_blank" rel="noopener noreferrer" class="btn-sm">Ver publicação no LinkedIn &nearr;</a>
                    <?php endif; ?>
                    <?php if(!empty($project['repo_url'])): ?>
                        <a href="<?php echo e($project['repo_url']); ?>" target="_blank" rel="noopener noreferrer" class="btn-sm">Ver repositório &nearr;</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            
            <div class="mt-12 aspect-video w-full overflow-hidden rounded-2xl border border-border bg-gradient-to-br from-surface2 to-bg">
                <?php if(!empty($project['image'])): ?>
                    <img src="<?php echo e(asset($project['image'])); ?>" alt="<?php echo e($project['title']); ?>" class="h-full w-full object-cover">
                <?php else: ?>
                    <div class="flex h-full items-center justify-center p-8 text-center font-display text-2xl font-extrabold text-ink/80"><?php echo e($project['title']); ?></div>
                <?php endif; ?>
            </div>

            <div class="mt-16 space-y-14">

                
                <?php
                    $galleryItems = collect($project['gallery'] ?? [])
                        ->filter(fn ($item) => ($item['path'] ?? null) !== ($project['image'] ?? null))
                        ->values();
                ?>
                <?php if($galleryItems->isNotEmpty()): ?>
                    <section>
                        <h2 class="text-2xl font-bold text-ink">Galeria</h2>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            <?php $__currentLoopData = $galleryItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <figure>
                                    <div class="overflow-hidden rounded-2xl border border-border <?php echo e(($item['type'] ?? null) === 'before_after' ? 'sm:col-span-2 aspect-video' : 'aspect-[4/3]'); ?>">
                                        <img src="<?php echo e(asset($item['path'])); ?>" alt="<?php echo e($item['caption'] ?? $project['title']); ?>" loading="lazy" class="h-full w-full object-cover">
                                    </div>
                                    <?php if(!empty($item['caption'])): ?>
                                        <figcaption class="label-mono mt-2 text-center !normal-case !tracking-normal text-mutedDim"><?php echo e($item['caption']); ?></figcaption>
                                    <?php endif; ?>
                                </figure>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if(!empty($project['description'])): ?>
                    <section>
                        <h2 class="text-2xl font-bold text-ink">Visão geral</h2>
                        <p class="mt-4 leading-relaxed text-muted"><?php echo e($project['description']); ?></p>
                    </section>
                <?php endif; ?>

                <?php
                    $narrative = [
                        'context'    => ['label' => 'Contexto',            'value' => $project['context']    ?? null],
                        'problem'    => ['label' => 'Problema & desafio',  'value' => $project['problem']    ?? null],
                        'objective'  => ['label' => 'Objetivo',            'value' => $project['objective']  ?? null],
                        'solution'   => ['label' => 'Solução',             'value' => $project['solution']   ?? null],
                        'process'    => ['label' => 'Processo',            'value' => $project['process']    ?? null],
                        'decisions'  => ['label' => 'Decisões relevantes', 'value' => $project['decisions']  ?? null],
                        'result'     => ['label' => 'Resultado',           'value' => $project['result']     ?? null],
                        'learnings'  => ['label' => 'Aprendizados',        'value' => $project['learnings']  ?? null],
                    ];
                ?>

                <?php $__currentLoopData = $narrative; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($block['value'])): ?>
                        <section>
                            <h2 class="text-2xl font-bold text-ink"><?php echo e($block['label']); ?></h2>
                            <p class="mt-4 leading-relaxed text-muted"><?php echo e($block['value']); ?></p>
                        </section>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if(!empty($project['video'])): ?>
                    <section>
                        <h2 class="text-2xl font-bold text-ink">Demonstração</h2>
                        <div class="mt-4 overflow-hidden rounded-2xl border border-border">
                            <video src="<?php echo e(asset($project['video'])); ?>" controls preload="metadata" class="w-full"></video>
                        </div>
                    </section>
                <?php endif; ?>

            </div>
        </div>
    </article>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\portfolio\resources\views/portfolio/project.blade.php ENDPATH**/ ?>