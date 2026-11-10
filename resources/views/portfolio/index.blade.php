<x-layouts.app :socialLinks="$socialLinks ?? []" :contact="$contact ?? []">
    @include('sections.hero', ['contact' => [
        'linkedin' => $contact['linkedin'] ?? '',
    ]])

    @include('sections.letreiro', ['stacks' => $stacks])

    @include('sections.stack', ['stacks' => $stacks])

    @include('sections.depoimentos', ['testimonials' => $testimonials])

    @include('sections.projetos')

    @include('sections.outras-curiosidades', ['timeline' => $journey])

    @include('sections.contato', ['contact' => $contact ?? []])
</x-layouts.app>
