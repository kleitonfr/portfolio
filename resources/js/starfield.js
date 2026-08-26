// ============================================================
// Starfield — fundo cósmico do Hero
// Canvas leve: estrelas cintilantes + estrelas cadentes ocasionais.
// Pausa fora da viewport e respeita prefers-reduced-motion.
// ============================================================

const canvas = document.getElementById('starfield');

if (canvas) {
    const ctx = canvas.getContext('2d');
    const prefereMovimentoReduzido = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const DENSIDADE_ESTRELAS_POR_PX2 = 1 / 9000; // controla quantas estrelas cabem por área

    let largura = 0;
    let altura = 0;
    let estrelas = [];
    let estrelasCadentes = [];
    let quadroAnimacao = null;
    let proximaCadenteEm = 0;
    let animando = false;

    function redimensionar() {
        const rect = canvas.parentElement.getBoundingClientRect();
        largura = canvas.width = Math.round(rect.width);
        altura = canvas.height = Math.round(rect.height);
        criarEstrelas();
    }

    function criarEstrelas() {
        const quantidade = Math.round(largura * altura * DENSIDADE_ESTRELAS_POR_PX2);
        estrelas = Array.from({ length: quantidade }, () => ({
            x: Math.random() * largura,
            y: Math.random() * altura,
            raio: Math.random() * 1.2 + 0.3,
            fase: Math.random() * Math.PI * 2,
            velocidade: Math.random() * 0.0015 + 0.0006,
        }));
    }

    function criarEstrelaCadente() {
        estrelasCadentes.push({
            x: Math.random() * largura * 0.6,
            y: Math.random() * altura * 0.45,
            comprimento: Math.random() * 60 + 60,
            velocidade: Math.random() * 6 + 8,
            angulo: Math.PI / 5, // diagonal, de cima-esquerda para baixo-direita
            vida: 1,
        });
    }

    function desenharQuadro(tempoMs) {
        ctx.clearRect(0, 0, largura, altura);

        // Estrelas cintilantes
        estrelas.forEach((estrela) => {
            const brilho = 0.35 + Math.abs(Math.sin(estrela.fase + tempoMs * estrela.velocidade)) * 0.65;
            ctx.beginPath();
            ctx.arc(estrela.x, estrela.y, estrela.raio, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(242, 241, 236, ${brilho.toFixed(2)})`;
            ctx.fill();
        });

        // Estrelas cadentes (rastro com gradiente, some aos poucos)
        estrelasCadentes = estrelasCadentes.filter((cadente) => cadente.vida > 0);
        estrelasCadentes.forEach((cadente) => {
            const dx = Math.cos(cadente.angulo) * cadente.comprimento;
            const dy = Math.sin(cadente.angulo) * cadente.comprimento;

            const gradiente = ctx.createLinearGradient(cadente.x, cadente.y, cadente.x - dx, cadente.y - dy);
            gradiente.addColorStop(0, `rgba(255, 255, 255, ${cadente.vida.toFixed(2)})`);
            gradiente.addColorStop(1, 'rgba(255, 255, 255, 0)');

            ctx.strokeStyle = gradiente;
            ctx.lineWidth = 1.6;
            ctx.beginPath();
            ctx.moveTo(cadente.x, cadente.y);
            ctx.lineTo(cadente.x - dx, cadente.y - dy);
            ctx.stroke();

            cadente.x += Math.cos(cadente.angulo) * cadente.velocidade;
            cadente.y += Math.sin(cadente.angulo) * cadente.velocidade;
            cadente.vida -= 0.012;
        });

        if (tempoMs > proximaCadenteEm) {
            criarEstrelaCadente();
            proximaCadenteEm = tempoMs + 4000 + Math.random() * 5000; // a cada 4–9s
        }
    }

    function loop(tempoMs) {
        desenharQuadro(tempoMs);
        quadroAnimacao = requestAnimationFrame(loop);
    }

    function iniciar() {
        if (animando) return;
        animando = true;
        proximaCadenteEm = performance.now() + 2000;
        quadroAnimacao = requestAnimationFrame(loop);
    }

    function pausar() {
        animando = false;
        if (quadroAnimacao) cancelAnimationFrame(quadroAnimacao);
        quadroAnimacao = null;
    }

    redimensionar();
    window.addEventListener('resize', redimensionar, { passive: true });

    if (prefereMovimentoReduzido) {
        // Sem loop de animação: desenha só um quadro estático de estrelas
        desenharQuadro(0);
    } else {
        // Só anima enquanto o Hero estiver visível na tela (economia de CPU/bateria)
        const observadorViewport = new IntersectionObserver((entradas) => {
            entradas.forEach((entrada) => (entrada.isIntersecting ? iniciar() : pausar()));
        }, { threshold: 0 });

        observadorViewport.observe(canvas);
    }
}
