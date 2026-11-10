// ============================================================
// Constelação de stacks
// Lê os dados de <script data-ceu-dados>, desenha as linhas entre as
// estrelas (botões posicionados em % no CSS) e controla destaque,
// filtro por grupo e o cartão de detalhes.
// ============================================================

const SVG_NS = 'http://www.w3.org/2000/svg';

function iniciarConstelacao() {
    const ceu = document.querySelector('[data-ceu]');
    const fonteDados = document.querySelector('[data-ceu-dados]');
    if (!ceu || !fonteDados || ceu.dataset.pronto) return;
    ceu.dataset.pronto = '1';

    const dados = JSON.parse(fonteDados.textContent);
    const porId = new Map(dados.estrelas.map((estrela) => [estrela.id, estrela]));
    const svg = ceu.querySelector('.ceu-linhas');
    const cartao = document.getElementById('ceuCartao');
    const botoes = new Map([...ceu.querySelectorAll('[data-estrela]')].map((el) => [el.dataset.estrela, el]));
    const rotulosGrupo = [...ceu.querySelectorAll('.ceu-grupo')];
    const filtros = [...document.querySelectorAll('[data-filtro-ceu]')];

    // Ligações sem repetição (A–B e B–A contam como uma só)
    const ligacoes = [];
    const vistas = new Set();
    dados.estrelas.forEach((estrela) => {
        estrela.liga.forEach((destino) => {
            const chave = [estrela.id, destino].sort().join('|');
            if (vistas.has(chave) || !porId.has(destino)) return;
            vistas.add(chave);
            ligacoes.push({ a: estrela.id, b: destino });
        });
    });

    const vizinhasDe = (id) => ligacoes.filter((l) => l.a === id || l.b === id).map((l) => (l.a === id ? l.b : l.a));

    ligacoes.forEach((ligacao) => {
        const linha = document.createElementNS(SVG_NS, 'line');
        linha.setAttribute('pathLength', '1');
        linha.classList.add('ceu-linha');
        if (porId.get(ligacao.a).grupo !== porId.get(ligacao.b).grupo) linha.classList.add('entre-grupos');
        svg.appendChild(linha);
        ligacao.linha = linha;
    });

    const centroDe = (id) => {
        const base = ceu.getBoundingClientRect();
        const ponto = botoes.get(id).querySelector('.estrela-ponto').getBoundingClientRect();
        return { x: ponto.left - base.left + ponto.width / 2, y: ponto.top - base.top + ponto.height / 2 };
    };

    function desenharLinhas() {
        svg.setAttribute('viewBox', `0 0 ${ceu.clientWidth} ${ceu.clientHeight}`);
        ligacoes.forEach(({ a, b, linha }) => {
            const p1 = centroDe(a);
            const p2 = centroDe(b);
            linha.setAttribute('x1', p1.x);
            linha.setAttribute('y1', p1.y);
            linha.setAttribute('x2', p2.x);
            linha.setAttribute('y2', p2.y);
        });
    }

    let fixada = null; // estrela escolhida com clique/toque/Enter
    let filtro = '';   // grupo selecionado nos filtros ('' = todas)

    function preencherCartao(estrela) {
        const grupo = dados.grupos[estrela.grupo];
        cartao.style.setProperty('--cor', `var(--${grupo.cor})`);
        cartao.querySelector('[data-ceu-grupo]').textContent = grupo.rotulo;
        cartao.querySelector('[data-ceu-grupo]').style.color = `var(--${grupo.cor})`;
        cartao.querySelector('[data-ceu-nome]').textContent = estrela.nome;
        cartao.querySelector('[data-ceu-desc]').textContent = estrela.desc;

        const nomesVizinhas = vizinhasDe(estrela.id).map((id) => porId.get(id).nome);
        const ligacoesEl = cartao.querySelector('[data-ceu-ligacoes]');
        ligacoesEl.textContent = nomesVizinhas.length ? `Conecta com: ${nomesVizinhas.join(', ')}.` : '';
        ligacoesEl.hidden = !nomesVizinhas.length;

        // Projetos do portfólio: card clicável com a capa
        const projetosEl = cartao.querySelector('[data-ceu-projetos]');
        projetosEl.replaceChildren(...estrela.projetos.map((projeto) => {
            const card = document.createElement('a');
            card.href = projeto.url;
            card.className = 'ceu-projeto';
            if (projeto.imagem) {
                const capa = document.createElement('img');
                capa.src = projeto.imagem;
                capa.alt = '';
                capa.loading = 'lazy';
                card.append(capa);
            }
            const titulo = document.createElement('span');
            titulo.className = 'ceu-projeto-titulo';
            titulo.textContent = projeto.titulo;
            card.append(titulo);
            return card;
        }));
        projetosEl.classList.toggle('um-so', estrela.projetos.length === 1);
        cartao.querySelector('[data-ceu-bloco-projetos]').hidden = !estrela.projetos.length;

        // Fora do portfólio: repositórios no GitHub e publicações no LinkedIn (abrem em nova aba)
        const rotulos = { repo: 'Repositório', post: 'LinkedIn' };
        const linksEl = cartao.querySelector('[data-ceu-links]');
        linksEl.replaceChildren(...estrela.links.map((item) => {
            const link = document.createElement('a');
            link.href = item.url;
            link.target = '_blank';
            link.rel = 'noopener noreferrer';
            link.className = 'ceu-link';

            const tipo = document.createElement('span');
            tipo.className = 'label-mono';
            tipo.textContent = `${rotulos[item.tipo] ?? 'Link'} ↗`;
            const titulo = document.createElement('span');
            titulo.className = 'ceu-link-titulo';
            titulo.textContent = item.titulo;
            const desc = document.createElement('span');
            desc.className = 'ceu-link-desc';
            desc.textContent = item.desc;
            const aviso = document.createElement('span');
            aviso.className = 'sr-only';
            aviso.textContent = ' (abre em nova aba)';

            link.append(tipo, titulo, desc, aviso);
            return link;
        }));
        cartao.querySelector('[data-ceu-bloco-links]').hidden = !estrela.links.length;
    }

    function destacar(id) {
        const vizinhas = id ? new Set(vizinhasDe(id)) : new Set();
        ceu.classList.toggle('com-foco', Boolean(id));
        botoes.forEach((botao, botaoId) => {
            botao.classList.toggle('ativa', botaoId === id);
            botao.classList.toggle('vizinha', vizinhas.has(botaoId));
        });
        ligacoes.forEach(({ a, b, linha }) => {
            const ativa = Boolean(id) && (a === id || b === id);
            linha.classList.toggle('ativa', ativa);
            linha.style.setProperty('--cor', ativa ? `var(--${dados.grupos[porId.get(id).grupo].cor})` : '');
        });

        // No desktop o cartão é um painel lateral sempre visível (o CSS ignora [hidden]);
        // em telas menores ele só aparece com uma estrela em foco.
        if (id) preencherCartao(porId.get(id));
        else cartao.style.removeProperty('--cor');
        cartao.hidden = !id;
        cartao.querySelector('[data-ceu-detalhe]').hidden = !id;
        cartao.querySelector('[data-ceu-vazio]').hidden = Boolean(id);
    }

    function fixar(id) {
        fixada = id;
        botoes.forEach((botao, botaoId) => botao.setAttribute('aria-pressed', String(botaoId === id)));
        destacar(id);
    }

    function aplicarFiltro(grupo) {
        filtro = grupo;
        filtros.forEach((botao) => botao.setAttribute('aria-pressed', String(botao.dataset.filtroCeu === grupo)));
        botoes.forEach((botao) => botao.classList.toggle('apagada', Boolean(grupo) && botao.dataset.grupo !== grupo));
        rotulosGrupo.forEach((rotulo) => rotulo.classList.toggle('apagada', Boolean(grupo) && rotulo.dataset.grupo !== grupo));
        ligacoes.forEach(({ a, b, linha }) => {
            const dentro = !grupo || (porId.get(a).grupo === grupo && porId.get(b).grupo === grupo);
            linha.classList.toggle('apagada', !dentro);
        });
        if (fixada && grupo && porId.get(fixada).grupo !== grupo) fixar(null);
    }

    botoes.forEach((botao, id) => {
        botao.addEventListener('pointerenter', (evento) => { if (evento.pointerType === 'mouse') destacar(id); });
        botao.addEventListener('pointerleave', (evento) => { if (evento.pointerType === 'mouse') destacar(fixada); });
        botao.addEventListener('focus', () => destacar(id));
        botao.addEventListener('blur', () => destacar(fixada));
        botao.addEventListener('click', () => fixar(fixada === id ? null : id));
    });

    filtros.forEach((botao) => botao.addEventListener('click', () => aplicarFiltro(botao.dataset.filtroCeu)));
    cartao.querySelector('[data-ceu-fechar]')?.addEventListener('click', () => fixar(null));
    ceu.addEventListener('click', (evento) => { if (evento.target === ceu || evento.target === svg) fixar(null); });
    document.addEventListener('keydown', (evento) => { if (evento.key === 'Escape' && fixada) fixar(null); });

    // Redesenha quando o céu muda de tamanho (rotação, zoom de texto, troca de layout)
    new ResizeObserver(desenharLinhas).observe(ceu);
    document.fonts?.ready.then(desenharLinhas);
    desenharLinhas();

    // Saiu da tela com uma estrela fixada: solta, para a folha fixa do mobile não ficar sobre outras seções
    new IntersectionObserver((entradas) => {
        if (fixada && entradas.every((entrada) => !entrada.isIntersecting)) fixar(null);
    }).observe(ceu);

    // As linhas "se traçam" quando a seção entra na tela
    new IntersectionObserver((entradas, observador) => {
        if (!entradas.some((entrada) => entrada.isIntersecting)) return;
        ceu.classList.add('desenhado');
        observador.disconnect();
    }, { threshold: 0.2 }).observe(ceu);
}

iniciarConstelacao();
document.addEventListener('livewire:navigated', iniciarConstelacao);

// ── Cards de projeto: o brilho acompanha o cursor ──
document.addEventListener('pointermove', (evento) => {
    const card = evento.target.closest?.('.card-brilho');
    if (!card) return;
    const area = card.getBoundingClientRect();
    card.style.setProperty('--px', `${evento.clientX - area.left}px`);
    card.style.setProperty('--py', `${evento.clientY - area.top}px`);
}, { passive: true });
