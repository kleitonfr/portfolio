
<div class="a11y">
    <button type="button" id="a11yAbrir" class="a11y-abrir" aria-expanded="false" aria-controls="a11yPainel">
        Acessibilidade
    </button>

    <div id="a11yPainel" class="a11y-painel" role="group" aria-label="Recursos de acessibilidade" hidden>
        <button type="button" class="a11y-botao" data-a11y="libras" aria-pressed="false">Libras (VLibras)</button>

        <p class="label-mono mt-2">Tamanho do texto</p>
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
            <button type="button" class="a11y-botao" data-a11y="menor" aria-label="Diminuir o texto">A&minus;</button>
            <span id="a11yEscala" class="min-w-[3.25rem] text-center font-mono text-sm text-ink" aria-hidden="true">100%</span>
            <button type="button" class="a11y-botao" data-a11y="maior" aria-label="Aumentar o texto">A+</button>
        </div>

        <button type="button" class="a11y-botao" data-a11y="contraste" aria-pressed="false">Alto contraste</button>
        <button type="button" class="a11y-botao" data-a11y="movimento" aria-pressed="false">Pausar animações</button>
        <button type="button" class="a11y-botao" data-a11y="restaurar">Restaurar padrão</button>

        <p id="a11yAviso" class="sr-only" role="status" aria-live="polite"></p>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\portfolio-kleiton\resources\views/components/acessibilidade.blade.php ENDPATH**/ ?>