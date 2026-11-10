@props(['stacks' => ['grupos' => [], 'estrelas' => []]])

{{--
    Stack em constelações.
    Os dados vêm de PortfolioRepository::obterStacks() (posições, ligações) e o
    PortfolioService acrescenta os projetos que usam cada tecnologia.
    Sem JavaScript a seção continua legível: as estrelas são botões com o nome visível.
    As linhas, o destaque e o cartão de detalhes ficam em resources/js/constelacao.js.
--}}
<section id="stack" class="border-b border-border bg-surface/70 px-6 py-24 md:px-12 md:py-32">
    <div class="mx-auto max-w-6xl">
        <div class="reveal">
            <x-section-label index="01">Stack</x-section-label>
        </div>
        <h2 class="reveal mx-auto mt-6 max-w-3xl text-center titulo-secao font-extrabold text-balance text-ink md:mx-0 md:text-left">
            Tecnologias em <span class="text-spectrum">constelação</span>
        </h2>
        <p class="reveal mx-auto mt-5 max-w-2xl text-center text-muted md:mx-0 md:text-left">
            Cada estrela é uma tecnologia que uso. Passe o cursor, toque ou navegue com Tab para ver
            a que ela se conecta e em quais projetos aparece.
        </p>

        <div class="reveal mt-10 flex flex-wrap justify-center gap-2 md:justify-start" role="group" aria-label="Filtrar constelações">
            <button type="button" class="filtro-ceu" data-filtro-ceu="" aria-pressed="true">Todas</button>
            @foreach ($stacks['grupos'] as $chave => $grupo)
                <button type="button" class="filtro-ceu" data-filtro-ceu="{{ $chave }}" aria-pressed="false">{{ $grupo['rotulo'] }}</button>
            @endforeach
        </div>

        <div class="ceu-area mt-8">
        <div class="ceu reveal" data-ceu>
            <svg class="ceu-linhas" aria-hidden="true" focusable="false"></svg>

            @foreach ($stacks['grupos'] as $chave => $grupo)
                <span
                    class="ceu-grupo label-mono"
                    data-grupo="{{ $chave }}"
                    style="--x:{{ $grupo['x'] }};--y:{{ $grupo['y'] }};--mx:{{ $grupo['mx'] }};--my:{{ $grupo['my'] }};--cor:var(--{{ $grupo['cor'] }});color:var(--{{ $grupo['cor'] }})"
                >{{ $grupo['rotulo'] }}</span>
            @endforeach

            @foreach ($stacks['estrelas'] as $i => $estrela)
                @php
                    $grupo = $stacks['grupos'][$estrela['grupo']];
                    // Estrelas com mais evidências (projetos, repositórios, publicações) ficam um pouco maiores
                    $tamanho = 9 + 2 * min(count($estrela['projetos']) + count($estrela['links']), 4);
                @endphp
                <button
                    type="button"
                    class="estrela"
                    data-estrela="{{ $estrela['id'] }}"
                    data-grupo="{{ $estrela['grupo'] }}"
                    aria-pressed="false"
                    aria-describedby="ceuCartao"
                    style="--x:{{ $estrela['x'] }};--y:{{ $estrela['y'] }};--mx:{{ $estrela['mx'] }};--my:{{ $estrela['my'] }};--cor:var(--{{ $grupo['cor'] }});--tam:{{ $tamanho }}px;--i:{{ $i }}"
                >
                    <span class="estrela-ponto" aria-hidden="true"></span>
                    <span class="estrela-nome">{{ $estrela['nome'] }}</span>
                </button>
            @endforeach

        </div>

            {{-- Detalhes da estrela em foco: painel lateral no desktop, folha fixa no rodapé em telas menores --}}
            <div id="ceuCartao" class="ceu-cartao" role="status" aria-live="polite" hidden>
                <div data-ceu-vazio>
                    <p class="label-mono">{{ count($stacks['estrelas']) }} tecnologias &middot; {{ count($stacks['grupos']) }} constelações</p>
                    <p class="mt-3 font-display text-lg font-bold text-ink">Escolha uma estrela</p>
                    <p class="mt-2 text-sm leading-relaxed text-muted">
                        As linhas mostram o que costuma trabalhar junto. Estrelas maiores têm mais projetos,
                        repositórios ou publicações para você abrir.
                    </p>
                </div>
                <div data-ceu-detalhe hidden>
                    <button type="button" class="ceu-cartao-fechar" data-ceu-fechar aria-label="Fechar detalhes">&times;</button>
                    <p class="label-mono" data-ceu-grupo></p>
                    <p class="mt-2 font-display text-lg font-bold text-ink" data-ceu-nome></p>
                    <p class="mt-2 text-sm leading-relaxed text-muted" data-ceu-desc></p>
                    <p class="mt-3 text-sm leading-relaxed text-muted" data-ceu-ligacoes></p>

                    <div data-ceu-bloco-projetos hidden>
                        <p class="label-mono mt-5">No portfólio</p>
                        <div class="ceu-projetos mt-3" data-ceu-projetos></div>
                    </div>

                    <div data-ceu-bloco-links hidden>
                        <p class="label-mono mt-5">Fora do portfólio</p>
                        <div class="ceu-links mt-3" data-ceu-links></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/json" data-ceu-dados>
        {!! json_encode([
            'grupos' => collect($stacks['grupos'])->map(fn ($g) => ['rotulo' => $g['rotulo'], 'cor' => $g['cor']]),
            'estrelas' => collect($stacks['estrelas'])->map(fn ($e) => [
                'id' => $e['id'],
                'nome' => $e['nome'],
                'grupo' => $e['grupo'],
                'desc' => $e['desc'],
                'liga' => $e['liga'],
                'projetos' => collect($e['projetos'])->map(fn ($p) => [
                    'titulo' => $p['titulo'],
                    'subtitulo' => $p['subtitulo'],
                    'imagem' => $p['imagem'] ? asset($p['imagem']) : null,
                    'url' => route('projects.show', ['slug' => $p['slug']]),
                ]),
                'links' => $e['links'],
            ]),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
    </script>
</section>
