<?php

namespace App\Services;

use App\Contracts\PortfolioRepositoryInterface;

class PortfolioService
{
    public function __construct(protected PortfolioRepositoryInterface $repositorio)
    {
    }

    public function obterDadosDaPagina(): array
    {
        return [
            'journey' => $this->repositorio->obterItensDaJornada(),
            'projects' => $this->repositorio->obterProjetos(),
            'socialLinks' => $this->repositorio->obterRedesSociais(),
            'testimonials' => $this->repositorio->obterDepoimentos(),
            'stacks' => $this->montarConstelacao(),
        ];
    }

    /**
     * Junta as stacks do repositório com os projetos que usam cada uma.
     * O vínculo vem das tags do próprio projeto (ex.: "Laravel 12" casa com "Laravel"),
     * mais os slugs listados à mão em 'projetos'.
     */
    private function montarConstelacao(): array
    {
        $stacks = $this->repositorio->obterStacks();
        $projetos = $this->repositorio->obterProjetos();

        $stacks['estrelas'] = array_map(function (array $estrela) use ($projetos) {
            $padrao = '/(?<![\w])' . preg_quote($estrela['nome'], '/') . '(?![\w])/iu';
            $manuais = $estrela['projetos'] ?? [];

            $estrela['projetos'] = array_values(array_map(
                fn (array $projeto) => [
                    'slug' => $projeto['slug'],
                    'titulo' => $projeto['title'],
                    'subtitulo' => $projeto['subtitle'] ?? '',
                    'imagem' => $projeto['image'] ?? null,
                ],
                array_filter($projetos, fn (array $projeto) => in_array($projeto['slug'], $manuais, true)
                    || (bool) preg_grep($padrao, $projeto['tags'] ?? []))
            ));
            $estrela['links'] = $estrela['links'] ?? [];

            return $estrela;
        }, $stacks['estrelas']);

        return $stacks;
    }

    public function obterProjetoPorSlug(string $slug): ?array
    {
        return $this->repositorio->obterProjetoPorSlug($slug);
    }
}
