// ============================================================
// Starfield — céu contínuo da página inteira
// O canvas fica fixo atrás de todo o conteúdo (.ceu-global, no layout).
// Três camadas de profundidade dão parallax: ao rolar, as estrelas
// "próximas" sobem mais rápido que as distantes, e o cursor desloca
// tudo de leve. Inclui brilhos de 4 pontas (Y2K) e estrelas cadentes.
// Para com a aba oculta, com "Pausar animações" e com prefers-reduced-motion.
// ============================================================

const canvas = document.getElementById('starfield');

if (canvas) {
    const ctx = canvas.getContext('2d');
    const prefereMovimentoReduzido = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const DENSIDADE_ESTRELAS_POR_PX2 = 1 / 8000; // quantas estrelas cabem por área
    const CAMADAS = [0.12, 0.35, 0.75];           // profundidade: quanto cada camada reage à rolagem
    const CORES_BRILHO = ['255, 190, 0', '255, 107, 157', '192, 132, 252', '0, 212, 232']; // sun, pink, violet, aqua

    let largura = 0;
    let altura = 0;
    let estrelas = [];
    let estrelasCadentes = [];
    let quadroAnimacao = null;
    let proximaCadenteEm = 0;
    let animando = false;
    let rolagem = window.scrollY;
    const cursor = { x: 0, y: 0, alvoX: 0, alvoY: 0 }; // deslocamento suave pelo mouse (-0.5 a 0.5)

    function redimensionar() {
        const densidadeTela = Math.min(window.devicePixelRatio || 1, 2);
        largura = window.innerWidth;
        altura = window.innerHeight;
        canvas.width = Math.round(largura * densidadeTela);
        canvas.height = Math.round(altura * densidadeTela);
        ctx.setTransform(densidadeTela, 0, 0, densidadeTela, 0, 0);
        criarEstrelas();
        if (!animando) desenharQuadro(0);
    }

    function criarEstrelas() {
        const quantidade = Math.round(largura * altura * DENSIDADE_ESTRELAS_POR_PX2);
        estrelas = Array.from({ length: quantidade }, (_, indice) => {
            const camada = CAMADAS[indice % CAMADAS.length];
            const ehBrilho = indice % 17 === 0; // uma em cada 17 vira brilho de 4 pontas
            return {
                x: Math.random() * largura,
                y: Math.random() * altura,
                camada,
                raio: (Math.random() * 0.9 + 0.3) * (0.6 + camada),
                fase: Math.random() * Math.PI * 2,
                velocidade: Math.random() * 0.0015 + 0.0006,
                brilho: ehBrilho ? CORES_BRILHO[indice % CORES_BRILHO.length] : null,
            };
        });
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

    // Brilho de 4 pontas: dois losangos finos cruzados
    function desenharBrilho(x, y, tamanho, cor, opacidade) {
        ctx.fillStyle = `rgba(${cor}, ${opacidade.toFixed(2)})`;
        ctx.beginPath();
        ctx.moveTo(x, y - tamanho);
        ctx.quadraticCurveTo(x, y, x + tamanho, y);
        ctx.quadraticCurveTo(x, y, x, y + tamanho);
        ctx.quadraticCurveTo(x, y, x - tamanho, y);
        ctx.quadraticCurveTo(x, y, x, y - tamanho);
        ctx.fill();
    }

    function desenharQuadro(tempoMs) {
        ctx.clearRect(0, 0, largura, altura);

        cursor.x += (cursor.alvoX - cursor.x) * 0.06;
        cursor.y += (cursor.alvoY - cursor.y) * 0.06;

        estrelas.forEach((estrela) => {
            const cintilar = 0.35 + Math.abs(Math.sin(estrela.fase + tempoMs * estrela.velocidade)) * 0.65;

            // Parallax: rolagem e cursor deslocam mais as camadas próximas; a posição "dá a volta" na tela
            const x = (((estrela.x - cursor.x * 26 * estrela.camada) % largura) + largura) % largura;
            const y = (((estrela.y - rolagem * 0.28 * estrela.camada - cursor.y * 18 * estrela.camada) % altura) + altura) % altura;

            if (estrela.brilho) {
                desenharBrilho(x, y, 3 + estrela.raio * 3.2 * cintilar, estrela.brilho, 0.25 + cintilar * 0.6);
                return;
            }

            ctx.beginPath();
            ctx.arc(x, y, estrela.raio, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(242, 241, 236, ${(cintilar * (0.45 + estrela.camada * 0.55)).toFixed(2)})`;
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

    // "Pausar animações" da barra de acessibilidade (classe no <html>) vale como movimento reduzido
    const movimentoPausado = () => prefereMovimentoReduzido || document.documentElement.classList.contains('sem-movimento');

    function atualizarAnimacao() {
        if (movimentoPausado()) {
            // Sem loop nem parallax: fica um único quadro estático de estrelas
            pausar();
            estrelasCadentes = [];
            proximaCadenteEm = Infinity;
            rolagem = 0;
            cursor.x = cursor.y = cursor.alvoX = cursor.alvoY = 0;
            desenharQuadro(0);
        } else if (document.hidden) {
            pausar(); // aba em segundo plano: economiza CPU/bateria
        } else {
            rolagem = window.scrollY;
            iniciar();
        }
    }

    window.addEventListener('scroll', () => {
        if (!movimentoPausado()) rolagem = window.scrollY;
    }, { passive: true });

    window.addEventListener('pointermove', (evento) => {
        if (evento.pointerType !== 'mouse' || movimentoPausado()) return;
        cursor.alvoX = evento.clientX / largura - 0.5;
        cursor.alvoY = evento.clientY / altura - 0.5;
    }, { passive: true });

    window.addEventListener('resize', redimensionar, { passive: true });
    document.addEventListener('visibilitychange', atualizarAnimacao);
    document.addEventListener('a11y:movimento', atualizarAnimacao);

    redimensionar();
    atualizarAnimacao();
}
