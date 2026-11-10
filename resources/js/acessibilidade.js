// ============================================================
// Barra de acessibilidade
// VLibras sob demanda, tamanho do texto, alto contraste e pausa de animações.
// As preferências ficam em localStorage e são reaplicadas no <head>
// (script inline do layout) antes de a página aparecer.
// ============================================================

const CHAVE = 'kf:a11y';
const ESCALAS = [0.875, 1, 1.125, 1.25, 1.375, 1.5];
const raiz = document.documentElement;

function lerPreferencias() {
    try {
        return JSON.parse(localStorage.getItem(CHAVE) || '{}');
    } catch {
        return {};
    }
}

function salvarPreferencias(preferencias) {
    try {
        localStorage.setItem(CHAVE, JSON.stringify(preferencias));
    } catch {
        // Sem armazenamento (modo privado, bloqueio): a preferência vale só nesta visita.
    }
}

const PADRAO = { escala: 1, contraste: false, movimento: false, libras: false };
let preferencias = { ...PADRAO, ...lerPreferencias() };

// ── VLibras: o script (pesado) só é baixado quando a pessoa ativa a opção ──
const VLIBRAS_APP = 'https://vlibras.gov.br/app';
let carregamentoVlibras = null;

function carregarVlibras() {
    if (carregamentoVlibras) return carregamentoVlibras;

    carregamentoVlibras = new Promise((resolver, rejeitar) => {
        const raiz = document.getElementById('vlibrasRaiz');
        if (!raiz) return rejeitar(new Error('Contêiner do VLibras ausente'));

        // Marcação exigida pelo widget oficial
        raiz.innerHTML = '<div vw class="enabled"><div vw-access-button class="active"></div>'
            + '<div vw-plugin-wrapper><div class="vw-plugin-top-wrapper"></div></div></div>';

        const script = document.createElement('script');
        script.src = `${VLIBRAS_APP}/vlibras-plugin.js`;
        script.onload = () => {
            try {
                // O widget se inicia no evento "load" da janela, que já passou quando o script
                // é carregado sob demanda. Por isso chamamos à mão o handler que ele registrar.
                const onloadAnterior = window.onload;
                new window.VLibras.Widget(VLIBRAS_APP);
                if (window.onload !== onloadAnterior && typeof window.onload === 'function') window.onload();
                resolver();
            } catch (erro) {
                rejeitar(erro);
            }
        };
        script.onerror = () => rejeitar(new Error('Falha ao baixar o VLibras'));
        document.head.appendChild(script);
    }).catch((erro) => {
        carregamentoVlibras = null; // permite tentar de novo
        throw erro;
    });

    return carregamentoVlibras;
}

function aplicarLibras({ abrir = false } = {}) {
    const raiz = document.getElementById('vlibrasRaiz');
    if (raiz) raiz.hidden = !preferencias.libras;
    if (!preferencias.libras) return;

    carregarVlibras()
        .then(() => {
            // Só abre o intérprete quando a pessoa acabou de clicar; em visitas seguintes aparece só o botão
            if (abrir) setTimeout(() => document.querySelector('[vw-access-button]')?.click(), 400);
        })
        .catch(() => {
            preferencias.libras = false;
            salvarPreferencias(preferencias);
            aplicar('O VLibras não carregou. Verifique a conexão e tente de novo.');
        });
}

function aplicar(aviso = '') {
    raiz.style.setProperty('--escala', preferencias.escala);
    raiz.classList.toggle('alto-contraste', preferencias.contraste);
    raiz.classList.toggle('sem-movimento', preferencias.movimento);

    const indice = ESCALAS.indexOf(preferencias.escala);
    const saida = document.getElementById('a11yEscala');
    if (saida) saida.textContent = `${Math.round(preferencias.escala * 100)}%`;
    document.querySelector('[data-a11y="menor"]')?.toggleAttribute('disabled', indice <= 0);
    document.querySelector('[data-a11y="maior"]')?.toggleAttribute('disabled', indice >= ESCALAS.length - 1);
    document.querySelector('[data-a11y="contraste"]')?.setAttribute('aria-pressed', String(preferencias.contraste));
    document.querySelector('[data-a11y="movimento"]')?.setAttribute('aria-pressed', String(preferencias.movimento));
    document.querySelector('[data-a11y="libras"]')?.setAttribute('aria-pressed', String(preferencias.libras));

    const raizVlibras = document.getElementById('vlibrasRaiz');
    if (raizVlibras) raizVlibras.hidden = !preferencias.libras;

    const regiaoAviso = document.getElementById('a11yAviso');
    if (regiaoAviso && aviso) regiaoAviso.textContent = aviso;

    // O starfield do hero escuta este evento para parar ou retomar o canvas
    document.dispatchEvent(new CustomEvent('a11y:movimento', { detail: { pausado: preferencias.movimento } }));
}

function mudarEscala(passo) {
    const atual = Math.max(0, ESCALAS.indexOf(preferencias.escala));
    const novo = Math.min(ESCALAS.length - 1, Math.max(0, atual + passo));
    preferencias.escala = ESCALAS[novo];
    return `Tamanho do texto em ${Math.round(preferencias.escala * 100)}%.`;
}

const acoes = {
    menor: () => mudarEscala(-1),
    maior: () => mudarEscala(1),
    contraste: () => {
        preferencias.contraste = !preferencias.contraste;
        return preferencias.contraste ? 'Alto contraste ativado.' : 'Alto contraste desativado.';
    },
    movimento: () => {
        preferencias.movimento = !preferencias.movimento;
        return preferencias.movimento ? 'Animações pausadas.' : 'Animações retomadas.';
    },
    restaurar: () => {
        preferencias = { ...PADRAO };
        return 'Preferências de acessibilidade restauradas.';
    },
    libras: () => {
        preferencias.libras = !preferencias.libras;
        aplicarLibras({ abrir: true });
        return preferencias.libras
            ? 'VLibras ativado. O botão de Libras aparece na lateral direita da tela.'
            : 'VLibras desativado.';
    },
};

function alternarPainel(abrir) {
    const botao = document.getElementById('a11yAbrir');
    const painel = document.getElementById('a11yPainel');
    if (!botao || !painel) return;
    const deveAbrir = abrir ?? painel.hidden;
    painel.hidden = !deveAbrir;
    botao.setAttribute('aria-expanded', String(deveAbrir));
}

// Delegação no document: continua funcionando depois das navegações do Livewire (wire:navigate)
document.addEventListener('click', (evento) => {
    if (evento.target.closest('#a11yAbrir')) {
        alternarPainel();
        return;
    }

    const botaoAcao = evento.target.closest('[data-a11y]');
    if (botaoAcao && acoes[botaoAcao.dataset.a11y]) {
        const aviso = acoes[botaoAcao.dataset.a11y]();
        salvarPreferencias(preferencias);
        aplicar(aviso);
        return;
    }

    if (!evento.target.closest('.a11y')) alternarPainel(false);
});

document.addEventListener('keydown', (evento) => {
    const painel = document.getElementById('a11yPainel');
    if (evento.key !== 'Escape' || !painel || painel.hidden) return;
    alternarPainel(false);
    document.getElementById('a11yAbrir')?.focus();
});

aplicar();
aplicarLibras(); // quem já ativou o VLibras antes encontra o botão visível de novo
document.addEventListener('livewire:navigated', () => aplicar());
