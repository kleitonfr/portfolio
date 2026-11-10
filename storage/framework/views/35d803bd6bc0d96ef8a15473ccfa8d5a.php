<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => null, 'description' => null, 'socialLinks' => [], 'contact' => []]));

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

foreach (array_filter((['title' => null, 'description' => null, 'socialLinks' => [], 'contact' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    
    <script>
        (function () {
            try {
                var p = JSON.parse(localStorage.getItem('kf:a11y') || '{}');
                var raiz = document.documentElement;
                if (p.escala) raiz.style.setProperty('--escala', p.escala);
                if (p.contraste) raiz.classList.add('alto-contraste');
                if (p.movimento) raiz.classList.add('sem-movimento');
            } catch (e) {}
        })();
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo e($description ?? 'Portfólio de Kleiton Ferreira — Desenvolvedor Full Stack & Designer. Soluções digitais com impacto real para o setor público.'); ?>" />
    <meta name="keywords" content="Kleiton Ferreira, desenvolvedor, full stack, Laravel, PHP, LGPD, Caraguatatuba, portfólio, UX, design" />
    <meta property="og:title" content="<?php echo e($title ?? 'Kleiton Ferreira — Dev Full Stack & Designer'); ?>" />
    <meta property="og:description" content="Transformando problemas reais em soluções digitais." />
    <meta name="theme-color" content="#0B0B10" />
    <title><?php echo e($title ?? 'Kleiton Ferreira — Dev Full Stack & Designer'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet" />

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="overflow-x-hidden bg-bg font-body text-ink">
    <a href="#conteudo" class="pular-conteudo">Pular para o conteúdo</a>

    
    <?php app("livewire")->forceAssetInjection(); ?><div x-persist="<?php echo e('ceu'); ?>">
        <div class="ceu-global" aria-hidden="true">
            <canvas id="starfield" class="cosmic-stars"></canvas>
            <div class="nebula nebula--violet"></div>
            <div class="nebula nebula--aqua"></div>
            <div class="nebula nebula--pink"></div>
            <div class="ceu-luz"></div>
        </div>
        <div class="progresso-leitura" aria-hidden="true"></div>
    </div>

    <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>

    <main id="conteudo" tabindex="-1" class="relative z-[1]">
        <?php echo e($slot); ?>

    </main>

    <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => ['socialLinks' => $socialLinks ?? [],'contact' => $contact ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['socialLinks' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($socialLinks ?? []),'contact' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($contact ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>

    
    <?php app("livewire")->forceAssetInjection(); ?><div x-persist="<?php echo e('acessibilidade'); ?>">
        <?php if (isset($component)) { $__componentOriginal020ffa54f0b0a63a23d79373c19f1a47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal020ffa54f0b0a63a23d79373c19f1a47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.acessibilidade','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('acessibilidade'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal020ffa54f0b0a63a23d79373c19f1a47)): ?>
<?php $attributes = $__attributesOriginal020ffa54f0b0a63a23d79373c19f1a47; ?>
<?php unset($__attributesOriginal020ffa54f0b0a63a23d79373c19f1a47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal020ffa54f0b0a63a23d79373c19f1a47)): ?>
<?php $component = $__componentOriginal020ffa54f0b0a63a23d79373c19f1a47; ?>
<?php unset($__componentOriginal020ffa54f0b0a63a23d79373c19f1a47); ?>
<?php endif; ?>

        
        <div id="vlibrasRaiz"></div>
    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\portfolio\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>