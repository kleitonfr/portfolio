@props(['title' => null, 'description' => null, 'socialLinks' => [], 'contact' => []])

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    {{-- Reaplica as preferências de acessibilidade antes da primeira pintura (evita "piscar") --}}
    <script>
        (function () {
            try {
                var p = JSON.parse(localStorage.getItem('kf:a11y') || '{}');
                var raiz = document.documentElement;
                if (p.escala) raiz.style.setProperty('--escala', p.escala);
                if (p.contraste) raiz.classList.add('alto-contraste');
                if (p.movimento) raiz.classList.add('sem-movimento');
            } catch (e) {}
        })();
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $description ?? 'Portfólio de Kleiton Ferreira — Desenvolvedor Full Stack & Designer. Soluções digitais com impacto real para o setor público.' }}" />
    <meta name="keywords" content="Kleiton Ferreira, desenvolvedor, full stack, Laravel, PHP, LGPD, Caraguatatuba, portfólio, UX, design" />
    <meta property="og:title" content="{{ $title ?? 'Kleiton Ferreira — Dev Full Stack & Designer' }}" />
    <meta property="og:description" content="Transformando problemas reais em soluções digitais." />
    <meta name="theme-color" content="#0B0B10" />
    <title>{{ $title ?? 'Kleiton Ferreira — Dev Full Stack & Designer' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet" />

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden bg-bg font-body text-ink">
    <a href="#conteudo" class="pular-conteudo">Pular para o conteúdo</a>

    {{-- Céu contínuo: fica fixo atrás de todas as seções e páginas (resources/js/starfield.js).
         @persist evita recriar o canvas a cada navegação com wire:navigate. --}}
    @persist('ceu')
        <div class="ceu-global" aria-hidden="true">
            <canvas id="starfield" class="cosmic-stars"></canvas>
            <div class="nebula nebula--violet"></div>
            <div class="nebula nebula--aqua"></div>
            <div class="nebula nebula--pink"></div>
            <div class="ceu-luz"></div>
        </div>
        <div class="progresso-leitura" aria-hidden="true"></div>
    @endpersist

    <x-navbar />

    <main id="conteudo" tabindex="-1" class="relative z-[1]">
        {{ $slot }}
    </main>

    <x-footer :socialLinks="$socialLinks ?? []" :contact="$contact ?? []" />

    {{-- @persist mantém estes elementos vivos nas navegações com wire:navigate --}}
    @persist('acessibilidade')
        <x-acessibilidade />

        {{-- VLibras — widget oficial de tradução para Libras (https://vlibras.gov.br).
             Fica oculto e nem é baixado até a pessoa ativar "Libras (VLibras)" na barra de
             acessibilidade; resources/js/acessibilidade.js monta o widget aqui dentro. --}}
        <div id="vlibrasRaiz"></div>
    @endpersist

    @livewireScripts
</body>
</html>
