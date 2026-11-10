@props(['contact' => []])

<section id="contato" class="relative overflow-hidden bg-bg/60 px-6 py-24 md:px-12 md:py-32">
    {{-- Grade em perspectiva correndo para o horizonte (decorativa) --}}
    <div class="grade-horizonte" aria-hidden="true"></div>

    <div class="relative z-10 mx-auto max-w-6xl">
        <div class="reveal">
            <x-section-label index="05">Vamos trabalhar juntos?</x-section-label>
        </div>
        <h2 class="reveal mx-auto mt-6 max-w-3xl text-center titulo-secao font-extrabold text-balance text-ink md:mx-0 md:text-left">
            Fale <span class="text-spectrum">comigo</span>
        </h2>
        <p class="reveal mx-auto mt-5 max-w-xl text-center text-muted md:mx-0 md:text-left">
            Aberto a projetos, parcerias e oportunidades que envolvam tecnologia com propósito.
        </p>

        <div class="reveal mt-12 grid gap-4 md:grid-cols-2">
            @if(!empty($contact['email']))
                <a href="mailto:{{ $contact['email'] }}" class="group flex items-center justify-between rounded-2xl border border-border bg-surface p-8 transition-colors hover:border-sun">
                    <span>
                        <span class="label-mono block">E-mail</span>
                        <span class="mt-2 block break-all font-display text-lg font-bold text-ink">{{ $contact['email'] }}</span>
                    </span>
                    <span class="text-xl text-sun transition-transform group-hover:translate-x-1">&rarr;</span>
                </a>
            @endif

            @if(!empty($contact['whatsapp']))
                <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="group flex items-center justify-between rounded-2xl border border-border bg-surface p-8 transition-colors hover:border-aqua">
                    <span>
                        <span class="label-mono block">WhatsApp</span>
                        <span class="mt-2 block font-display text-lg font-bold text-ink">Conversa direta</span>
                    </span>
                    <span class="text-xl text-aqua transition-transform group-hover:translate-x-1">&rarr;</span>
                </a>
            @endif
        </div>
    </div>
</section>
