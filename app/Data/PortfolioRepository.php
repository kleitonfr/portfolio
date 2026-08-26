<?php

namespace App\Data;

use App\Contracts\PortfolioRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PortfolioRepository implements PortfolioRepositoryInterface
{
    public function obterItensDaJornada(): array
    {
        return [
            [
                'period' => '2019 — 2020',
                'title' => 'Iniciação Científica',
                'desc' => 'Desenvolvi o artigo "O valor propagandístico da Fake News", aprofundando meus conhecimentos em pesquisa acadêmica, análise crítica e interpretação de dados. A experiência também fortaleceu minhas habilidades de escrita científica, argumentação e comunicação, além de proporcionar a apresentação dos resultados em eventos acadêmicos.',
                'direction' => 'left',
                'tags' => ['Aprendizado contínuo', 'Análise', 'Pesquisa', 'CNPQ'],
            ],
            [
                'period' => '2019 — 2021',
                'title' => 'Estágio de Administração',
                'desc' => 'Análise diária de documentos, registro e acompanhamento em planilha excel e alimentação de banco de dados. Atendimento ao público, cadastro e acompanhamento da agenda de pacientes do dia, busca ativa por telefone.',
                'direction' => 'right',
                'tags' => ['Responsabilidade', 'Organização', 'Adaptabilidade'],
            ],
            [
                'period' => '2021 — 2022',
                'title' => 'Estoquista',
                'desc' => 'Era responsável por receber, conferir e armazenar mercadorias, recepcionar o transportador, bem como o controle e cadastro da DANFE em sistema ERP.',
                'direction' => 'left',
                'tags' => ['Organização', 'Atenção aos detalhes', 'ERP', 'Controle de NF'],

            ],

            [
                'images' => ['image-1', 'image-2'],
            ],

            [
                'period' => '2022 — 2023',
                'title' => 'Agente Administrativo — SESEP',
                'desc' => 'Atuei como Agente Administrativo na Secretaria de Serviço Público, desempenhando atividades administrativas e de organização de informações. Nesse período, desenvolvi um dashboard para automatizar a consolidação de dados e a geração de relatórios mensais, contribuindo para maior eficiência, agilidade na análise de indicadores e apoio à tomada de decisões.',
                'direction' => 'right',
                'tags' => ['Gestão Pública', 'Resolução de problemas', 'Inovação'],
                'images' => ['image-1', 'image-2', 'image-3'],
            ],

            [
                'images' => ['image-1', 'image-2'],
            ],

            [
                'period' => '2023 — 2024',
                'title' => 'Analista Service Desk — STII',
                'desc' => 'Liderei o ranking interno de chamados solucionados por três meses consecutivos, atuando em múltiplos grupos: Sistemas, Helpdesk, Segurança de Rede e Embras-Atendimentos.',
                'direction' => 'left',
                'tags' => ['Suporte Técnico', 'Liderança', 'Excelência no atendimento'],
            ],

            [
                'images' => ['image-1', 'image-2', 'image-3'],
            ],

            [
                'period' => '2025 — 2026',
                'title' => 'Desenvolvedor Fullstack',
                'desc' => 'Portal + software de governança para exercício de direitos LGPD. OAuth 2.0 + PKCE gov.br, 3 conexões de banco, acessibilidade e-MAG.',
                'direction' => 'right',
                'tags' => ['Desenvolvimento de Sistemas', 'Sistemas WEB', 'API', 'PHP', 'Laravel', 'SQL'],
            ],
        ];
    }

    public function obterProjetos(): array
    {
        return DB::connection('sqlite')->table('projects')->orderBy('position')->get()->map(function ($projeto) {
            return $this->mapearProjeto($projeto);
        })->all();
    }

    public function obterProjetoPorSlug(string $slug): ?array
    {
        $projeto = DB::connection('sqlite')->table('projects')->where('slug', $slug)->first();

        return $projeto ? $this->mapearProjeto($projeto) : null;
    }

    public function obterRedesSociais(): array
    {
        return [
            ['label' => 'GitHub', 'url' => 'https://github.com/kleitonfr', 'icon' => 'GH'],
            ['label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/kleiton-ferreira', 'icon' => 'in'],
            ['label' => 'E-mail', 'url' => 'mailto:kleiton.sfr@gmail.com', 'icon' => '@'],
        ];
    }

    public function obterDepoimentos(): array
    {
        return [
            [
                'image' => 'img/Comentarios/chefe.jpg',
                'role' => 'Gestor(a) direto(a)',
            ],
            [
                'image' => 'img/Comentarios/colegaDeTrabalho.jpg',
                'role' => 'Colega de trabalho',
            ],
            [
                'image' => 'img/Comentarios/colegaDeHackathon.jpg',
                'role' => 'Colega de hackathon',
            ],
        ];
    }

    private function mapearProjeto(object $projeto): array
    {
        return [
            'id' => $projeto->id,
            'title' => $projeto->title,
            'subtitle' => $projeto->subtitle,
            'excerpt' => $projeto->excerpt,
            'description' => $projeto->description,
            'tags' => json_decode($projeto->tags, true) ?: [],
            'image' => $projeto->image,
            'slug' => $projeto->slug,
            'is_featured' => (bool) $projeto->is_featured,

            // Metadados do case
            'role' => $projeto->role ?? null,
            'year' => $projeto->year ?? null,
            'status' => $projeto->status ?? null,
            'client' => $projeto->client ?? null,

            // Estrutura narrativa (nem todo projeto preenche tudo)
            'context' => $projeto->context ?? null,
            'problem' => $projeto->problem ?? null,
            'objective' => $projeto->objective ?? null,
            'solution' => $projeto->solution ?? null,
            'process' => $projeto->process ?? null,
            'decisions' => $projeto->decisions ?? null,
            'result' => $projeto->result ?? null,
            'learnings' => $projeto->learnings ?? null,

            // Mídia
            'gallery' => json_decode($projeto->gallery ?? '[]', true) ?: [],
            'video' => $projeto->video ?? null,

            // Links externos
            'external_url' => $projeto->external_url ?? null,
            'linkedin_url' => $projeto->linkedin_url ?? null,
            'repo_url' => $projeto->repo_url ?? null,

            // Reconhecimento
            'is_award' => (bool) ($projeto->is_award ?? false),
            'award_label' => $projeto->award_label ?? null,
        ];
    }
}
