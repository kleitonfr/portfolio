<section id="depoimentos" class="border-b border-border bg-surface/70 px-6 py-24 md:px-12 md:py-32">
    <div class="mx-auto max-w-6xl">
        <div class="reveal">
            <x-section-label index="02">Quem viveu de perto</x-section-label>
        </div>
        <h2 class="reveal mx-auto mt-6 max-w-3xl text-center titulo-secao font-extrabold text-balance text-ink md:mx-0 md:text-left">
            Depoimentos
        </h2>
        <p class="reveal mx-auto mt-5 max-w-2xl text-center text-muted md:mx-0 md:text-left">
            Mensagens reais de gestão, time e hackathon
        </p>

        <div class="reveal comments-grid mt-14">
            @foreach ($testimonials as $testimonial)
                <div class="comment-item">
                    <button
                        type="button"
                        class="comment-frame"
                        data-lightbox-trigger
                        data-lightbox-src="{{ asset($testimonial['image']) }}"
                        aria-label="Ampliar depoimento — {{ $testimonial['role'] }}"
                    >
                        <img src="{{ asset($testimonial['image']) }}" alt="Depoimento — {{ $testimonial['role'] }}" loading="lazy">
                    </button>
                    <p class="comment-role">{{ $testimonial['role'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Lightbox — reaproveitado por qualquer imagem com data-lightbox-trigger na página --}}
    <div id="lightbox" class="lightbox-overlay" role="dialog" aria-modal="true" aria-label="Imagem ampliada">
        <button type="button" class="lightbox-close" id="lightboxClose" aria-label="Fechar">&times;</button>
        <img id="lightboxImage" src="" alt="">
    </div>
</section>
