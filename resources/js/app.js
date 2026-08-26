// ============================================================
// Portfolio Kleiton Ferreira — app.js
// Revela elementos ao rolar, destaca navbar ao rolar, menu mobile
// ============================================================

import './bootstrap';
import './starfield';

const botaoMenu = document.getElementById('menuBtn');
const menuMobile = document.getElementById('mobileMenu');

botaoMenu?.addEventListener('click', () => {
    const estaEscondido = menuMobile?.classList.toggle('hidden');
    botaoMenu.setAttribute('aria-expanded', estaEscondido ? 'false' : 'true');
    botaoMenu.textContent = estaEscondido ? 'Menu' : 'Fechar';
});

window.fecharMenuMobile = () => {
    menuMobile?.classList.add('hidden');
    botaoMenu?.setAttribute('aria-expanded', 'false');
    if (botaoMenu) botaoMenu.textContent = 'Menu';
};

const elementosReveal = document.querySelectorAll('.reveal');
const observadorReveal = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const irmaos = [...(entry.target.parentElement?.querySelectorAll('.reveal') ?? [])];
        let atraso = 0;

        irmaos.forEach((irmao) => {
            if (!irmao.classList.contains('visible')) {
                irmao.style.transitionDelay = `${atraso}ms`;
                atraso += 80;
            }
        });

        entry.target.classList.add('visible');
    });
}, {
    threshold: 0.12,
    rootMargin: '0px 0px -36px 0px',
});

elementosReveal.forEach((el) => observadorReveal.observe(el));

const secoes = document.querySelectorAll('section[id]');
const linksNav = document.querySelectorAll('nav a[href^="#"]:not(.btn-cta)');

const observadorSecoes = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        linksNav.forEach((link) => {
            const estaAtivo = link.getAttribute('href') === `#${entry.target.id}`;
            link.classList.toggle('text-sun', estaAtivo);
        });
    });
}, { threshold: 0.4 });

secoes.forEach((secao) => observadorSecoes.observe(secao));

// ── Navbar: borda/sombra ao rolar ──
const barraNavegacao = document.getElementById('navbar');
const alternarNavbarRolada = () => barraNavegacao?.classList.toggle('is-scrolled', window.scrollY > 12);
alternarNavbarRolada();
window.addEventListener('scroll', alternarNavbarRolada, { passive: true });

// ── Visualizador de imagem: qualquer elemento com [data-lightbox-trigger] abre a imagem ampliada ──
const visualizador = document.getElementById('lightbox');
const imagemVisualizador = document.getElementById('lightboxImage');
const botaoFecharVisualizador = document.getElementById('lightboxClose');

const abrirVisualizador = (src, textoAlternativo = '') => {
    if (!visualizador || !imagemVisualizador) return;
    imagemVisualizador.src = src;
    imagemVisualizador.alt = textoAlternativo;
    visualizador.classList.add('is-open');
    document.body.style.overflow = 'hidden';
};

const fecharVisualizador = () => {
    if (!visualizador) return;
    visualizador.classList.remove('is-open');
    document.body.style.overflow = '';
};

document.querySelectorAll('[data-lightbox-trigger]').forEach((el) => {
    el.addEventListener('click', () => {
        abrirVisualizador(el.getAttribute('data-lightbox-src'), el.getAttribute('aria-label') || '');
    });
});

botaoFecharVisualizador?.addEventListener('click', fecharVisualizador);
visualizador?.addEventListener('click', (e) => { if (e.target === visualizador) fecharVisualizador(); });
document.addEventListener('keydown', (e) => { if (e.key === 'Escape') fecharVisualizador(); });
