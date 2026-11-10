@props(['project' => [], 'accent' => 'aqua'])

@php
    $accentText = [
        'sun' => 'text-sun',
        'pink' => 'text-pink',
        'aqua' => 'text-aqua',
        'violet' => 'text-violet',
    ][$accent] ?? 'text-aqua';

    $accentBorder = [
        'sun' => 'hover:border-sun',
        'pink' => 'hover:border-pink',
        'aqua' => 'hover:border-aqua',
        'violet' => 'hover:border-violet',
    ][$accent] ?? 'hover:border-aqua';
@endphp

<a
    href="{{ route('projects.show', ['slug' => $project['slug']]) }}"
    class="group reveal card-brilho flex flex-col overflow-hidden rounded-2xl border border-border bg-surface transition-colors {{ $accentBorder }}"
>
    <div class="relative aspect-[4/3] w-full overflow-hidden bg-gradient-to-br from-surface2 to-bg">
        @if(!empty($project['image']))
            <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
        @else
            <div class="flex h-full items-center justify-center p-6 text-center font-display text-lg font-extrabold text-ink/80">{{ $project['title'] }}</div>
        @endif

        @if(!empty($project['is_award']))
            <span class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full bg-sun px-3 py-1 label-mono !text-[#0b0b10]">&#9733; Premiado</span>
        @endif
    </div>

    <div class="flex flex-1 flex-col gap-3 p-7">
        <span class="label-mono {{ $accentText }}">{{ $project['subtitle'] ?: $project['title'] }}</span>
        <h3 class="text-xl font-bold text-ink">{{ $project['title'] }}</h3>
        <p class="flex-1 text-sm leading-relaxed text-muted">{{ $project['excerpt'] }}</p>

        @if(!empty($project['tags']))
            <div class="flex flex-wrap gap-2 pt-1">
                @foreach(array_slice($project['tags'], 0, 3) as $tag)
                    <span class="rounded-full border border-border px-3 py-1 text-xs text-muted">{{ $tag }}</span>
                @endforeach
            </div>
        @endif

        <span class="mt-2 text-sm font-semibold text-ink transition-transform group-hover:translate-x-1">Abrir &rarr;</span>
    </div>
</a>
