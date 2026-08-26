<section id="hero" class="relative overflow-hidden border-b border-border bg-bg px-6 pb-20 pt-24 md:px-12 md:pb-28 md:pt-24">
    
    <div class="cosmic-bg" aria-hidden="true">
        <canvas id="starfield" class="cosmic-stars"></canvas>
        <div class="nebula nebula--violet"></div>
        <div class="nebula nebula--aqua"></div>
        <div class="nebula nebula--pink"></div>
    </div>

    <div class="relative z-10 mx-auto grid w-full max-w-6xl items-center gap-12 md:grid-cols-[0.95fr_1.05fr] md:gap-16">
        <div class="reveal flex items-center justify-center md:order-1" style="animation-delay:.2s">
            <div class="hero-avatar-wrap">
                <div class="hero-avatar-ring"></div>
                <div class="hero-avatar-inner">
                    <img src="<?php echo e(asset('img/kleitonF.jpeg')); ?>" alt="Kleiton Ferreira">
                </div>
            </div>
        </div>

        <div class="hero-glow-text text-center md:order-2 md:text-left">
            <p class="reveal label-mono">Desenvolvedor full stack</p>

            <h1 class="reveal mt-6 max-w-2xl text-4xl font-extrabold leading-[1.02] text-balance text-spectrum md:text-6xl lg:text-7xl">
                Kleiton Ferreira
            </h1>

            <p class="reveal mt-6 max-w-xl text-base leading-relaxed text-muted md:text-lg" style="animation-delay:.05s">
                Comecei resolvendo problemas de pessoas. Hoje desenvolvo sistemas para elas, com impacto direto
                na vida de cidadãos e no funcionamento de instituições públicas.
            </p>

            <div class="reveal mt-9 flex flex-wrap justify-center gap-3 md:justify-start" style="animation-delay:.1s">
                <a href="#projetos" class="btn-cta">Ver projetos</a>
                <a href="<?php echo e($contact['linkedin']); ?>" target="_blank" rel="noopener noreferrer" class="btn-outline">
                    LinkedIn
                </a>
            </div>

            <dl class="reveal mt-14 grid grid-cols-1 gap- border-t border-border pt-10 sm:grid-cols-3" style="animation-delay:.15s">
                <div>
                    <dt class="font-display text-3xl font-extrabold text-ink md:text-3xl">#1</dt>
                    <dd class="mt-2 text-sm leading-relaxed text-muted">Ranking em atendimentos<br>3 meses seguidos</dd>
                </div>
                <div>
                    <dt class="font-display text-3xl  font-extrabold text-sun md:text-3xl">Prêmio</dt>
                    <dd class="mt-2 text-sm leading-relaxed text-muted">InovaCidade<br>Iniciativas 2026</dd>
                </div>
                <div>
                    <dt class="font-display text-3xl font-extrabold text-ink md:text-3xl">4</dt>
                    <dd class="mt-2 text-sm leading-relaxed text-muted">Sistemas em<br>produção real</dd>
                </div>
            </dl>
        </div>
    </div>
</section>


<section class="border-b border-border bg-surface px-6 py-10 md:px-12">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-center gap-x-8 gap-y-4 md:justify-start">
        <span class="label-mono text-mutedDim">Stack</span>
        <?php $__currentLoopData = ['Laravel', 'NestJS', 'PHP', 'Python','JavaScript', 'TypeScript', 'HTML', 'CSS', 'MySQL', 'PostgreSQL', 'SQLite', 'Git', 'GitHub', 'Figma', 'Rest API']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="text-sm font-semibold text-muted"><?php echo e($tech); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/sections/hero.blade.php ENDPATH**/ ?>