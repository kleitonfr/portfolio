<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['stacks' => ['grupos' => [], 'estrelas' => []]]));

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

foreach (array_filter((['stacks' => ['grupos' => [], 'estrelas' => []]]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>


<section id="stack" class="border-b border-border bg-surface/70 px-6 py-24 md:px-12 md:py-32">
    <div class="mx-auto max-w-6xl">
        <div class="reveal">
            <?php if (isset($component)) { $__componentOriginal1289ed7a7566caee9d9374ccbe752a3b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1289ed7a7566caee9d9374ccbe752a3b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section-label','data' => ['index' => '01']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('section-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['index' => '01']); ?>Stack <?php echo $__env->renderComponent(); ?>
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
            Tecnologias em <span class="text-spectrum">constelação</span>
        </h2>
        <p class="reveal mx-auto mt-5 max-w-2xl text-center text-muted md:mx-0 md:text-left">
            Cada estrela é uma tecnologia que uso. Passe o cursor, toque ou navegue com Tab para ver
            a que ela se conecta e em quais projetos aparece.
        </p>

        <div class="reveal mt-10 flex flex-wrap justify-center gap-2 md:justify-start" role="group" aria-label="Filtrar constelações">
            <button type="button" class="filtro-ceu" data-filtro-ceu="" aria-pressed="true">Todas</button>
            <?php $__currentLoopData = $stacks['grupos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chave => $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button type="button" class="filtro-ceu" data-filtro-ceu="<?php echo e($chave); ?>" aria-pressed="false"><?php echo e($grupo['rotulo']); ?></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

    
    <div class="ceu-area mx-auto mt-10 max-w-[92rem]">
        <div class="ceu reveal" data-ceu>
            <svg class="ceu-linhas" aria-hidden="true" focusable="false"></svg>

            <?php $__currentLoopData = $stacks['grupos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chave => $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span
                    class="ceu-grupo label-mono"
                    data-grupo="<?php echo e($chave); ?>"
                    style="--x:<?php echo e($grupo['x']); ?>;--y:<?php echo e($grupo['y']); ?>;--mx:<?php echo e($grupo['mx']); ?>;--my:<?php echo e($grupo['my']); ?>;--cor:var(--<?php echo e($grupo['cor']); ?>);color:var(--<?php echo e($grupo['cor']); ?>)"
                ><?php echo e($grupo['rotulo']); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $stacks['estrelas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $estrela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $grupo = $stacks['grupos'][$estrela['grupo']];
                    // Estrelas com mais evidências (projetos, repositórios, publicações) ficam um pouco maiores
                    $tamanho = 9 + 2 * min(count($estrela['projetos']) + count($estrela['links']), 4);
                ?>
                <button
                    type="button"
                    class="estrela"
                    data-estrela="<?php echo e($estrela['id']); ?>"
                    data-grupo="<?php echo e($estrela['grupo']); ?>"
                    aria-pressed="false"
                    aria-describedby="ceuCartao"
                    style="--x:<?php echo e($estrela['x']); ?>;--y:<?php echo e($estrela['y']); ?>;--mx:<?php echo e($estrela['mx']); ?>;--my:<?php echo e($estrela['my']); ?>;--cor:var(--<?php echo e($grupo['cor']); ?>);--tam:<?php echo e($tamanho); ?>px;--i:<?php echo e($i); ?>"
                >
                    <span class="estrela-ponto" aria-hidden="true"></span>
                    <span class="estrela-nome"><?php echo e($estrela['nome']); ?></span>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

            
            <div id="ceuCartao" class="ceu-cartao" role="status" aria-live="polite" hidden>
                <div data-ceu-vazio>
                    <p class="label-mono"><?php echo e(count($stacks['estrelas'])); ?> tecnologias &middot; <?php echo e(count($stacks['grupos'])); ?> constelações</p>
                    <p class="mt-3 font-display text-2xl font-bold text-ink">Escolha uma estrela</p>
                    <p class="mt-3 text-sm leading-relaxed text-muted">
                        As linhas mostram o que costuma trabalhar junto. Estrelas maiores têm mais projetos,
                        repositórios ou publicações para você abrir.
                    </p>

                    
                    <?php
                        $destaques = collect($stacks['estrelas'])
                            ->sortByDesc(fn ($e) => count($e['projetos']) + count($e['links']))
                            ->take(4);
                    ?>
                    <p class="label-mono mt-7">Comece por aqui</p>
                    <div class="ceu-atalhos mt-3">
                        <?php $__currentLoopData = $destaques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destaque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total = count($destaque['projetos']) + count($destaque['links']); ?>
                            <button type="button" class="ceu-atalho" data-ceu-ir="<?php echo e($destaque['id']); ?>" style="--cor:var(--<?php echo e($stacks['grupos'][$destaque['grupo']]['cor']); ?>)">
                                <span class="ceu-atalho-ponto" aria-hidden="true"></span>
                                <span class="ceu-atalho-nome"><?php echo e($destaque['nome']); ?></span>
                                <span class="ceu-atalho-total"><?php echo e($total); ?> <?php echo e($total === 1 ? 'item' : 'itens'); ?></span>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div data-ceu-detalhe hidden>
                    <button type="button" class="ceu-cartao-fechar" data-ceu-fechar aria-label="Fechar detalhes">&times;</button>
                    <p class="label-mono" data-ceu-grupo></p>
                    <p class="mt-2 font-display text-2xl font-bold text-ink" data-ceu-nome></p>
                    <p class="mt-2 text-sm leading-relaxed text-muted" data-ceu-desc></p>

                    <div data-ceu-bloco-ligacoes hidden>
                        <p class="label-mono mt-5">Conecta com</p>
                        <div class="ceu-vizinhas mt-3" data-ceu-ligacoes></div>
                    </div>

                    <div data-ceu-bloco-projetos hidden>
                        <p class="label-mono mt-5">No portfólio</p>
                        <div class="ceu-projetos mt-3" data-ceu-projetos></div>
                    </div>

                    <div data-ceu-bloco-links hidden>
                        <p class="label-mono mt-5">Fora do portfólio</p>
                        <div class="ceu-links mt-3" data-ceu-links></div>
                    </div>
                </div>
            </div>
        </div>

    <script type="application/json" data-ceu-dados>
        <?php echo json_encode([
            'grupos' => collect($stacks['grupos'])->map(fn ($g) => ['rotulo' => $g['rotulo'], 'cor' => $g['cor']]),
            'estrelas' => collect($stacks['estrelas'])->map(fn ($e) => [
                'id' => $e['id'],
                'nome' => $e['nome'],
                'grupo' => $e['grupo'],
                'desc' => $e['desc'],
                'liga' => $e['liga'],
                'projetos' => collect($e['projetos'])->map(fn ($p) => [
                    'titulo' => $p['titulo'],
                    'subtitulo' => $p['subtitulo'],
                    'imagem' => $p['imagem'] ? asset($p['imagem']) : null,
                    'url' => route('projects.show', ['slug' => $p['slug']]),
                ]),
                'links' => $e['links'],
            ]),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG); ?>

    </script>
</section>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/sections/stack.blade.php ENDPATH**/ ?>