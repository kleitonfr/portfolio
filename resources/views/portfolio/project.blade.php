<x-layouts.app :socialLinks="$socialLinks ?? []" :contact="$contact ?? []" :title="$project['title'] . ' — Kleiton Ferreira'" :description="$project['excerpt'] ?? null">

    <article class="bg-bg/70 px-6 py-20 md:px-12 md:py-28">
        <div class="mx-auto max-w-3xl">

            <a href="{{ route('home') }}#projetos" wire:navigate class="label-mono transition-colors hover:text-sun">
                &larr; Todos os projetos
            </a>

            @if(!empty($project['subtitle']))
                <p class="label-mono mt-10 text-sun">{{ $project['subtitle'] }}</p>
            @endif

            <h1 class="mt-4 titulo-secao font-extrabold text-balance text-ink">
                {{ $project['title'] }}
            </h1>

            @if(!empty($project['excerpt']))
                <p class="mt-6 text-lg leading-relaxed text-muted">{{ $project['excerpt'] }}</p>
            @endif

            @if($project['is_award'] && !empty($project['award_label']))
                <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-sun/40 bg-sun/10 px-4 py-2 label-mono !text-sun">
                    <span>&#9733;</span> {{ $project['award_label'] }}
                </div>
            @endif

            {{-- Metadados: papel, ano, status, cliente --}}
            @if(array_filter([$project['role'], $project['year'], $project['status'], $project['client']]))
                <div class="mt-8 flex flex-wrap gap-x-10 gap-y-5 border-t border-border pt-8">
                    @if(!empty($project['role']))
                        <div><span class="label-mono block">Papel</span><span class="mt-1 block text-sm font-semibold text-ink">{{ $project['role'] }}</span></div>
                    @endif
                    @if(!empty($project['year']))
                        <div><span class="label-mono block">Período</span><span class="mt-1 block text-sm font-semibold text-ink">{{ $project['year'] }}</span></div>
                    @endif
                    @if(!empty($project['status']))
                        <div><span class="label-mono block">Status</span><span class="mt-1 block text-sm font-semibold text-ink">{{ $project['status'] }}</span></div>
                    @endif
                    @if(!empty($project['client']))
                        <div><span class="label-mono block">Cliente</span><span class="mt-1 block text-sm font-semibold text-ink">{{ $project['client'] }}</span></div>
                    @endif
                </div>
            @endif

            @if(!empty($project['tags']))
                <div class="mt-8 flex flex-wrap gap-2">
                    @foreach($project['tags'] as $tag)
                        <span class="rounded-full border border-border px-3 py-1 text-xs text-muted">{{ $tag }}</span>
                    @endforeach
                </div>
            @endif

            {{-- Ações: site em produção, publicação no LinkedIn, repositório --}}
            @if(!empty($project['external_url']) || !empty($project['linkedin_url']) || !empty($project['repo_url']))
                <div class="mt-6 flex flex-wrap gap-3">
                    @if(!empty($project['external_url']))
                        <a href="{{ $project['external_url'] }}" target="_blank" rel="noopener noreferrer" class="btn-sm">Acessar o site &nearr;</a>
                    @endif
                    @if(!empty($project['linkedin_url']))
                        <a href="{{ $project['linkedin_url'] }}" target="_blank" rel="noopener noreferrer" class="btn-sm">Ver publicação no LinkedIn &nearr;</a>
                    @endif
                    @if(!empty($project['repo_url']))
                        <a href="{{ $project['repo_url'] }}" target="_blank" rel="noopener noreferrer" class="btn-sm">Ver repositório &nearr;</a>
                    @endif
                </div>
            @endif

            {{-- Capa --}}
            <div class="mt-12 aspect-video w-full overflow-hidden rounded-2xl border border-border bg-gradient-to-br from-surface2 to-bg">
                @if(!empty($project['image']))
                    <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center p-8 text-center font-display text-2xl font-extrabold text-ink/80">{{ $project['title'] }}</div>
                @endif
            </div>

            <div class="mt-16 space-y-14">

                {{-- Galeria de imagens (exclui a capa, já exibida no topo) — vem antes do texto --}}
                @php
                    $galleryItems = collect($project['gallery'] ?? [])
                        ->filter(fn ($item) => ($item['path'] ?? null) !== ($project['image'] ?? null))
                        ->values();
                @endphp
                @if($galleryItems->isNotEmpty())
                    <section>
                        <h2 class="text-2xl font-bold text-ink">Galeria</h2>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            @foreach ($galleryItems as $item)
                                <figure>
                                    <div class="overflow-hidden rounded-2xl border border-border {{ ($item['type'] ?? null) === 'before_after' ? 'sm:col-span-2 aspect-video' : 'aspect-[4/3]' }}">
                                        <img src="{{ asset($item['path']) }}" alt="{{ $item['caption'] ?? $project['title'] }}" loading="lazy" class="h-full w-full object-cover">
                                    </div>
                                    @if(!empty($item['caption']))
                                        <figcaption class="label-mono mt-2 text-center !normal-case !tracking-normal text-mutedDim">{{ $item['caption'] }}</figcaption>
                                    @endif
                                </figure>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if(!empty($project['description']))
                    <section>
                        <h2 class="text-2xl font-bold text-ink">Visão geral</h2>
                        <p class="mt-4 leading-relaxed text-muted">{{ $project['description'] }}</p>
                    </section>
                @endif

                @php
                    $narrative = [
                        'context'    => ['label' => 'Contexto',            'value' => $project['context']    ?? null],
                        'problem'    => ['label' => 'Problema & desafio',  'value' => $project['problem']    ?? null],
                        'objective'  => ['label' => 'Objetivo',            'value' => $project['objective']  ?? null],
                        'solution'   => ['label' => 'Solução',             'value' => $project['solution']   ?? null],
                        'process'    => ['label' => 'Processo',            'value' => $project['process']    ?? null],
                        'decisions'  => ['label' => 'Decisões relevantes', 'value' => $project['decisions']  ?? null],
                        'result'     => ['label' => 'Resultado',           'value' => $project['result']     ?? null],
                        'learnings'  => ['label' => 'Aprendizados',        'value' => $project['learnings']  ?? null],
                    ];
                @endphp

                @foreach ($narrative as $block)
                    @if(!empty($block['value']))
                        <section>
                            <h2 class="text-2xl font-bold text-ink">{{ $block['label'] }}</h2>
                            <p class="mt-4 leading-relaxed text-muted">{{ $block['value'] }}</p>
                        </section>
                    @endif
                @endforeach

                {{-- Vídeo demonstrativo --}}
                @if(!empty($project['video']))
                    <section>
                        <h2 class="text-2xl font-bold text-ink">Demonstração</h2>
                        <div class="mt-4 overflow-hidden rounded-2xl border border-border">
                            <video src="{{ asset($project['video']) }}" controls preload="metadata" class="w-full"></video>
                        </div>
                    </section>
                @endif

            </div>
        </div>
    </article>
</x-layouts.app>
