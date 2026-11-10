<section id="hero" class="relative overflow-hidden border-b border-border px-6 pb-20 pt-24 md:px-12 md:pb-28 md:pt-24">
    {{-- O céu (estrelas + nebulosas) agora é o fundo da página inteira: ver .ceu-global no layout --}}
    <div class="relative z-10 mx-auto grid w-full max-w-6xl items-center gap-12 md:grid-cols-[0.95fr_1.05fr] md:gap-16">
        <div class="reveal flex items-center justify-center md:order-1" style="animation-delay:.2s">
            <div class="hero-avatar-wrap">
                {{-- Órbitas com "planetas" girando em sentidos opostos (decorativo) --}}
                <span class="orbita orbita--1" aria-hidden="true"><i></i></span>
                <span class="orbita orbita--2" aria-hidden="true"><i></i></span>
                <div class="hero-avatar-ring"></div>
                <div class="hero-avatar-inner">
                    <img src="{{ asset('img/kleitonF.jpeg') }}" alt="Kleiton Ferreira">
                </div>
                <x-brilho class="brilho--avatar-1 text-sun" />
                <x-brilho class="brilho--avatar-2 text-aqua" />
                <span class="adesivo">Premiado &middot; InovaCidade 2026</span>
            </div>
        </div>

        <div class="hero-glow-text text-center md:order-2 md:text-left">
            <p class="reveal label-mono">Desenvolvedor full stack</p>

            <div class="relative mt-6 inline-block">
                <h1 class="reveal max-w-2xl titulo-hero font-extrabold text-balance text-spectrum">
                    Kleiton Ferreira
                </h1>
                <x-brilho class="brilho--titulo-1 text-pink" />
                <x-brilho class="brilho--titulo-2 text-violet" />
            </div>

            <p class="reveal mt-6 max-w-xl text-base leading-relaxed text-muted md:text-lg" style="animation-delay:.05s">
                Comecei resolvendo problemas de pessoas. Hoje desenvolvo sistemas para elas, com impacto direto
                na vida de cidadãos e no funcionamento de instituições públicas.
            </p>

            <div class="reveal mt-9 flex flex-wrap justify-center gap-3 md:justify-start" style="animation-delay:.1s">
                <a href="#projetos" class="btn-cta">Ver projetos</a>
                <a href="{{ $contact['linkedin'] }}" target="_blank" rel="noopener noreferrer" class="btn-outline">
                    LinkedIn
                </a>
            </div>

            <dl class="reveal mt-14 grid grid-cols-1 gap-8 border-t border-border pt-10 sm:grid-cols-3" style="animation-delay:.15s">
                <div>
                    <dt class="font-body text-3xl font-extrabold tracking-tight text-ink">#1</dt>
                    <dd class="mt-2 text-sm leading-relaxed text-muted">Ranking em atendimentos<br>3 meses seguidos</dd>
                </div>
                <div>
                    <dt class="font-body text-3xl font-extrabold tracking-tight text-sun">Prêmio</dt>
                    <dd class="mt-2 text-sm leading-relaxed text-muted">InovaCidade<br>Iniciativas 2026</dd>
                </div>
                <div>
                    <dt class="font-body text-3xl font-extrabold tracking-tight text-ink">4</dt>
                    <dd class="mt-2 text-sm leading-relaxed text-muted">Sistemas em<br>produção real</dd>
                </div>
            </dl>
        </div>
    </div>
</section>
