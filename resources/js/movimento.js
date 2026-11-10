// ============================================================
// Movimento — microinterações ligadas à rolagem e ao cursor
//   • barra de progresso de leitura no topo
//   • luz suave que segue o cursor no céu de fundo
//   • botões "magnéticos" (.btn-cta)
//   • cards de projeto que inclinam em 3D (.card-brilho)
//   • trilha da jornada que se desenha conforme a rolagem (.curio-track)
// Tudo aqui é enfeite: com "Pausar animações" ou prefers-reduced-motion,
// nada se mexe e a trilha aparece completa.
// ============================================================

const raiz = document.documentElement;
const prefereMovimentoReduzido = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const movimentoPausado = () => prefereMovimentoReduzido || raiz.classList.contains('sem-movimento');

// ── Rolagem: progresso de leitura + trilha da jornada ──
let quadroRolagem = null;

function atualizarRolagem() {
    quadroRolagem = null;

    const alturaRolavel = raiz.scrollHeight - window.innerHeight;
    raiz.style.setProperty('--progresso', alturaRolavel > 0 ? (window.scrollY / alturaRolavel).toFixed(4) : '0');

    const trilha = document.querySelector('.curio-track');
    if (!trilha) return;

    if (movimentoPausado()) {
        trilha.style.setProperty('--avanco', '1');
        trilha.querySelectorAll('.curio-card').forEach((card) => card.classList.add('passou'));
        return;
    }

    // A "cabeça" da trilha acompanha uma linha a 60% da altura da tela
    const linhaDeLeitura = window.innerHeight * 0.6;
    const area = trilha.getBoundingClientRect();
    const avanco = Math.min(1, Math.max(0, (linhaDeLeitura - area.top) / area.height));
    trilha.style.setProperty('--avanco', avanco.toFixed(4));

    trilha.querySelectorAll('.curio-card').forEach((card) => {
        card.classList.toggle('passou', card.getBoundingClientRect().top < linhaDeLeitura);
    });
}

function agendarRolagem() {
    if (quadroRolagem === null) quadroRolagem = requestAnimationFrame(atualizarRolagem);
}

window.addEventListener('scroll', agendarRolagem, { passive: true });
window.addEventListener('resize', agendarRolagem, { passive: true });
document.addEventListener('a11y:movimento', agendarRolagem);
document.addEventListener('livewire:navigated', agendarRolagem);
agendarRolagem();

// ── Cursor: luz no céu, botões magnéticos e inclinação dos cards ──
let elementoMagnetico = null;
let cardInclinado = null;

function soltarMagnetico() {
    if (!elementoMagnetico) return;
    elementoMagnetico.style.transform = '';
    elementoMagnetico = null;
}

function soltarCard() {
    if (!cardInclinado) return;
    cardInclinado.classList.remove('inclinando');
    cardInclinado.style.removeProperty('--rx');
    cardInclinado.style.removeProperty('--ry');
    cardInclinado = null;
}

document.addEventListener('pointermove', (evento) => {
    if (evento.pointerType !== 'mouse' || movimentoPausado()) {
        soltarMagnetico();
        soltarCard();
        return;
    }

    // Luz que segue o cursor (o CSS usa as variáveis em .ceu-luz)
    raiz.style.setProperty('--luz-x', `${evento.clientX}px`);
    raiz.style.setProperty('--luz-y', `${evento.clientY}px`);

    // Botão magnético: desloca um pouco na direção do cursor
    const botao = evento.target.closest?.('.btn-cta');
    if (botao !== elementoMagnetico) soltarMagnetico();
    if (botao) {
        const area = botao.getBoundingClientRect();
        const dx = evento.clientX - (area.left + area.width / 2);
        const dy = evento.clientY - (area.top + area.height / 2);
        botao.style.transform = `translate(${(dx * 0.22).toFixed(1)}px, ${(dy * 0.3).toFixed(1)}px)`;
        elementoMagnetico = botao;
    }

    // Card de projeto: inclina até ~5° conforme a posição do cursor
    const card = evento.target.closest?.('.card-brilho');
    if (card !== cardInclinado) soltarCard();
    if (card) {
        const area = card.getBoundingClientRect();
        const posX = (evento.clientX - area.left) / area.width - 0.5;
        const posY = (evento.clientY - area.top) / area.height - 0.5;
        card.style.setProperty('--ry', `${(posX * 7).toFixed(2)}deg`);
        card.style.setProperty('--rx', `${(posY * -6).toFixed(2)}deg`);
        card.classList.add('inclinando');
        cardInclinado = card;
    }
}, { passive: true });

document.addEventListener('pointerleave', () => {
    soltarMagnetico();
    soltarCard();
});
