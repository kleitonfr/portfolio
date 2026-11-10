/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                // As cores vêm das variáveis CSS de resources/css/app.css (canais RGB),
                // para que o modo de alto contraste troque a paleta inteira de uma vez.
                // Identidade (mantida — acento único, usado com moderação)
                sun:    'rgb(var(--sun-rgb) / <alpha-value>)',
                pink:   'rgb(var(--pink-rgb) / <alpha-value>)',
                aqua:   'rgb(var(--aqua-rgb) / <alpha-value>)',
                violet: 'rgb(var(--violet-rgb) / <alpha-value>)',

                // Tema escuro
                bg:       'rgb(var(--bg-rgb) / <alpha-value>)',
                surface:  'rgb(var(--surface-rgb) / <alpha-value>)',
                surface2: 'rgb(var(--surface2-rgb) / <alpha-value>)',
                border:   'var(--border)',
                ink:      'rgb(var(--ink-rgb) / <alpha-value>)',
                muted:    'rgb(var(--muted-rgb) / <alpha-value>)',
                mutedDim: 'rgb(var(--muted-dim-rgb) / <alpha-value>)',
            },
            // Tamanhos de texto multiplicados por --escala (barra de acessibilidade).
            // line-height sem unidade, para acompanhar o tamanho quando o texto é ampliado.
            fontSize: {
                xs:    ['calc(.75rem * var(--escala))',   { lineHeight: '1.35' }],
                sm:    ['calc(.875rem * var(--escala))',  { lineHeight: '1.45' }],
                base:  ['calc(1rem * var(--escala))',     { lineHeight: '1.5' }],
                lg:    ['calc(1.125rem * var(--escala))', { lineHeight: '1.55' }],
                xl:    ['calc(1.25rem * var(--escala-titulo))',  { lineHeight: '1.4' }],
                '2xl': ['calc(1.5rem * var(--escala-titulo))',   { lineHeight: '1.3' }],
                '3xl': ['calc(1.875rem * var(--escala-titulo))', { lineHeight: '1.2' }],
            },
            fontFamily: {
                display: ['"Syne"', 'sans-serif'],
                body:    ['"Plus Jakarta Sans"', 'sans-serif'],
                mono:    ['"JetBrains Mono"', 'monospace'],
            },
            animation: {
                'fadeUp':    'fadeUp .7s ease forwards',
                'marquee':   'marquee 32s linear infinite',
            },
            keyframes: {
                fadeUp:  { from:{ opacity:'0', transform:'translateY(28px)' }, to:{ opacity:'1', transform:'translateY(0)' } },
                marquee: { from:{ transform:'translateX(0)' }, to:{ transform:'translateX(-50%)' } },
            },
        },
    },
    plugins: [],
};
