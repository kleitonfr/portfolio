<?php
    $ancora = fn (string $id) => request()->routeIs('home') ? "#{$id}" : route('home') . "#{$id}";
?>

<nav id="navbar" class="fixed left-0 right-0 top-0 z-50 bg-black px-6 py-4 md:px-12">
    <div class="mx-auto flex max-w-6xl items-center justify-between">
        <a href="<?php echo e(route('home')); ?>" class="font-display text-xl font-extrabold tracking-tight text-white">
            KF<span class="text-sun">.</span>
        </a>

        <ul class="hidden gap-8 text-sm font-semibold text-white/70 md:flex">
            <li><a href="<?php echo e($ancora('stack')); ?>" class="nav-link">Stack</a></li>
            <li><a href="<?php echo e($ancora('depoimentos')); ?>" class="nav-link">Depoimentos</a></li>
            <li><a href="<?php echo e($ancora('projetos')); ?>" class="nav-link">Projetos</a></li>
            <li><a href="<?php echo e($ancora('curiosidades')); ?>" class="nav-link">Curiosidades</a></li>
        </ul>

        <a href="<?php echo e($ancora('contato')); ?>" class="btn-cta hidden !px-5 !py-2.5 text-sm md:inline-flex" aria-label="Fale comigo">
            Fale comigo
        </a>

        <button id="menuBtn" class="rounded-full border border-white/20 px-4 py-2 text-xs font-semibold uppercase tracking-[0.16em] text-white md:hidden" aria-label="Abrir menu" aria-expanded="false">
            Menu
        </button>
    </div>

    <div id="mobileMenu" class="mx-4 mt-4 hidden rounded-2xl border border-white/10 bg-black p-6 shadow-xl md:hidden">
        <ul class="flex flex-col gap-5 font-semibold text-white/70">
            <li><a href="<?php echo e($ancora('stack')); ?>" onclick="fecharMenuMobile()" class="block transition-colors hover:text-white">Stack</a></li>
            <li><a href="<?php echo e($ancora('depoimentos')); ?>" onclick="fecharMenuMobile()" class="block transition-colors hover:text-white">Depoimentos</a></li>
            <li><a href="<?php echo e($ancora('projetos')); ?>" onclick="fecharMenuMobile()" class="block transition-colors hover:text-white">Projetos</a></li>
            <li><a href="<?php echo e($ancora('curiosidades')); ?>" onclick="fecharMenuMobile()" class="block transition-colors hover:text-white">Curiosidades</a></li>
            <li><a href="<?php echo e($ancora('contato')); ?>" onclick="fecharMenuMobile()" class="block transition-colors hover:text-white">Contato</a></li>
        </ul>
    </div>
</nav>
<?php /**PATH D:\xampp\htdocs\portfolio\resources\views/components/navbar.blade.php ENDPATH**/ ?>