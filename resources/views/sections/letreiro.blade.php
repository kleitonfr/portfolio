@props(['stacks' => ['estrelas' => []]])

{{-- Letreiro com os nomes das stacks passando (Y2K). É só enfeite: o conteúdo real está na
     constelação logo abaixo, por isso a faixa inteira é aria-hidden. A lista aparece duas
     vezes para o loop fechar sem emenda (a animação anda exatamente metade da largura). --}}
<div class="letreiro" aria-hidden="true">
    <div class="letreiro-trilho">
        @for ($volta = 0; $volta < 2; $volta++)
            @foreach ($stacks['estrelas'] as $i => $estrela)
                <span class="letreiro-item {{ $i % 3 === 0 ? 'letreiro-item--cheio' : '' }}">{{ $estrela['nome'] }}</span>
                <x-brilho class="letreiro-brilho" />
            @endforeach
        @endfor
    </div>
</div>
