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

    /**
     * Stacks exibidas na constelação da home.
     *
     * Cada estrela tem posição em % dentro do "céu" — (x, y) no desktop e (mx, my) no mobile —
     * e a lista de estrelas a que se liga. Para adicionar uma tecnologia, basta incluir um item
     * aqui: a view e o JS desenham as linhas a partir destes dados.
     * 'projetos' é opcional e serve para apontar projetos cujas tags não citam a tecnologia pelo nome.
     * 'links' é opcional: evidências fora do portfólio — repositórios no GitHub ('repo') ou
     * publicações no LinkedIn ('post'). Aparecem no painel como links que abrem em nova aba.
     */
    public function obterStacks(): array
    {
        return [
            'grupos' => [
                'backend'  => ['rotulo' => 'Back-end',        'cor' => 'sun',    'x' => 21, 'y' => 6,  'mx' => 50, 'my' => 0.5],
                'frontend' => ['rotulo' => 'Front-end',       'cor' => 'pink',   'x' => 56, 'y' => 4,  'mx' => 50, 'my' => 22],
                'dados'    => ['rotulo' => 'Dados',           'cor' => 'aqua',   'x' => 45, 'y' => 96, 'mx' => 50, 'my' => 43],
                'devops'   => ['rotulo' => 'Versionamento e deploy', 'cor' => 'violet', 'x' => 82, 'y' => 6,  'mx' => 50, 'my' => 60],
                'ia'       => ['rotulo' => 'IA e automação',  'cor' => 'aqua',   'x' => 80, 'y' => 96, 'mx' => 50, 'my' => 77],
            ],
            'estrelas' => [
                // Back-end
                ['id' => 'php',        'nome' => 'PHP',        'grupo' => 'backend',  'x' => 9,  'y' => 32, 'mx' => 20, 'my' => 7,  'desc' => 'Linguagem base dos sistemas institucionais.', 'liga' => ['laravel']],
                ['id' => 'laravel',    'nome' => 'Laravel',    'grupo' => 'backend',  'x' => 21, 'y' => 20, 'mx' => 50, 'my' => 5,  'desc' => 'Framework principal no back-end.', 'liga' => ['rest-api', 'mysql', 'postgresql', 'sqlite'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'barbearia', 'desc' => 'Aplicação em Laravel 13 com Alpine.js.', 'url' => 'https://github.com/kleitonfr/barbearia'],
                    ['tipo' => 'repo', 'titulo' => 'sistema-de-solicitacao', 'desc' => 'Aplicação em Laravel 12.', 'url' => 'https://github.com/kleitonfr/sistema-de-solicitacao'],
                    ['tipo' => 'repo', 'titulo' => 'gcm_code', 'desc' => 'Credenciais da GCM em Laravel 12, com QR Code e PDF.', 'url' => 'https://github.com/kleitonfr/gcm_code'],
                ]],
                ['id' => 'rest-api',   'nome' => 'REST API',   'grupo' => 'backend',  'x' => 32, 'y' => 36, 'mx' => 80, 'my' => 8,  'desc' => 'Contratos de integração entre sistemas.', 'liga' => ['nestjs'], 'projetos' => ['nest-florestal'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'hono-api-worker', 'desc' => 'API em Hono para Cloudflare Workers, com Drizzle.', 'url' => 'https://github.com/kleitonfr/hono-api-worker'],
                ]],
                ['id' => 'nestjs',     'nome' => 'NestJS',     'grupo' => 'backend',  'x' => 25, 'y' => 58, 'mx' => 64, 'my' => 15, 'desc' => 'APIs em Node com arquitetura modular.', 'liga' => ['python', 'typescript', 'mysql']],
                ['id' => 'python',     'nome' => 'Python',     'grupo' => 'backend',  'x' => 11, 'y' => 64, 'mx' => 28, 'my' => 16, 'desc' => 'Scripts, automação e tratamento de dados.', 'liga' => ['php'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'apache-spark-rdd', 'desc' => 'Estudos de Apache Spark e PySpark com RDDs.', 'url' => 'https://github.com/kleitonfr/apache-spark-rdd'],
                    ['tipo' => 'repo', 'titulo' => 'dashboard_ecommerce_analysis', 'desc' => 'Análise e visualização de dados de e-commerce.', 'url' => 'https://github.com/kleitonfr/dashboard_ecommerce_analysis'],
                ]],

                // Front-end
                ['id' => 'html',       'nome' => 'HTML',       'grupo' => 'frontend', 'x' => 46, 'y' => 18, 'mx' => 22, 'my' => 28, 'desc' => 'Marcação semântica e acessível.', 'liga' => ['css'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'front_diario-oficial', 'desc' => 'Nova interface do Diário Oficial Eletrônico de Caraguatatuba.', 'url' => 'https://github.com/kleitonfr/front_diario-oficial'],
                ]],
                ['id' => 'css',        'nome' => 'CSS',        'grupo' => 'frontend', 'x' => 57, 'y' => 28, 'mx' => 50, 'my' => 26, 'desc' => 'Layout responsivo, mobile first.', 'liga' => ['figma', 'javascript'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'front_diario-oficial', 'desc' => 'Nova interface do Diário Oficial Eletrônico de Caraguatatuba.', 'url' => 'https://github.com/kleitonfr/front_diario-oficial'],
                ]],
                ['id' => 'figma',      'nome' => 'Figma',      'grupo' => 'frontend', 'x' => 67, 'y' => 16, 'mx' => 80, 'my' => 28, 'desc' => 'Prototipação e design system.', 'liga' => [], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'design-system-stii', 'desc' => 'Design tokens e utilities para Laravel, extraídos do Figma.', 'url' => 'https://github.com/kleitonfr/design-system-stii'],
                ]],
                ['id' => 'javascript', 'nome' => 'JavaScript', 'grupo' => 'frontend', 'x' => 51, 'y' => 46, 'mx' => 34, 'my' => 36, 'desc' => 'Interatividade no navegador.', 'liga' => ['typescript', 'html']],
                ['id' => 'typescript', 'nome' => 'TypeScript', 'grupo' => 'frontend', 'x' => 40, 'y' => 56, 'mx' => 68, 'my' => 37, 'desc' => 'Tipagem estática no front e no back.', 'liga' => [], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'hono-api-worker', 'desc' => 'API em Hono para Cloudflare Workers, com Drizzle.', 'url' => 'https://github.com/kleitonfr/hono-api-worker'],
                ]],

                // Dados
                ['id' => 'mysql',      'nome' => 'MySQL',      'grupo' => 'dados',    'x' => 44, 'y' => 76, 'mx' => 50, 'my' => 48, 'desc' => 'Banco relacional dos sistemas em produção.', 'liga' => ['postgresql', 'sqlite']],
                ['id' => 'postgresql', 'nome' => 'PostgreSQL', 'grupo' => 'dados',    'x' => 57, 'y' => 84, 'mx' => 76, 'my' => 54, 'desc' => 'Banco relacional para consultas mais elaboradas.', 'liga' => []],
                ['id' => 'sqlite',     'nome' => 'SQLite',     'grupo' => 'dados',    'x' => 33, 'y' => 86, 'mx' => 24, 'my' => 54, 'desc' => 'Banco leve e embutido — é o que roda este portfólio.', 'liga' => [], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'portfolio', 'desc' => 'O código deste site.', 'url' => 'https://github.com/kleitonfr/portfolio'],
                ]],

                // Versionamento e deploy
                ['id' => 'git',        'nome' => 'Git',        'grupo' => 'devops',   'x' => 79, 'y' => 32, 'mx' => 22, 'my' => 66, 'desc' => 'Versionamento do código.', 'liga' => ['github']],
                ['id' => 'github',     'nome' => 'GitHub',     'grupo' => 'devops',   'x' => 90, 'y' => 20, 'mx' => 52, 'my' => 64, 'desc' => 'Repositórios, revisão e deploy com Actions.', 'liga' => ['docker'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'github.com/kleitonfr', 'desc' => 'Perfil com todos os repositórios públicos.', 'url' => 'https://github.com/kleitonfr'],
                ]],
                ['id' => 'docker',     'nome' => 'Docker',     'grupo' => 'devops',   'x' => 88, 'y' => 46, 'mx' => 80, 'my' => 69, 'desc' => 'Ambientes reproduzíveis em contêiner.', 'liga' => ['git'], 'links' => [
                    ['tipo' => 'post', 'titulo' => 'Publicação sobre Docker', 'desc' => 'Publicação no LinkedIn.', 'url' => 'https://www.linkedin.com/feed/update/urn:li:ugcPost:7503246764586717184/'],
                ]],

                // IA e automação
                ['id' => 'n8n',        'nome' => 'n8n',        'grupo' => 'ia',       'x' => 68, 'y' => 62, 'mx' => 24, 'my' => 83, 'desc' => 'Automação de fluxos e integrações.', 'liga' => ['ai-agents', 'rest-api'], 'links' => [
                    ['tipo' => 'post', 'titulo' => 'Publicação sobre n8n', 'desc' => 'Publicação no LinkedIn.', 'url' => 'https://www.linkedin.com/feed/update/urn:li:ugcPost:7507543014681112576/'],
                ]],
                ['id' => 'ai-agents',  'nome' => 'AI Agents',  'grupo' => 'ia',       'x' => 80, 'y' => 74, 'mx' => 52, 'my' => 90, 'desc' => 'Agentes que executam tarefas com modelos de linguagem.', 'liga' => ['mcp'], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'my-first-agent', 'desc' => 'Agente com LangChain e Claude que escolhe entre ferramentas.', 'url' => 'https://github.com/kleitonfr/my-first-agent'],
                    ['tipo' => 'repo', 'titulo' => 'first-agent-with-mcp', 'desc' => 'Agente LangChain conectado a um servidor MCP próprio.', 'url' => 'https://github.com/kleitonfr/first-agent-with-mcp'],
                ]],
                ['id' => 'mcp',        'nome' => 'MCP',        'grupo' => 'ia',       'x' => 92, 'y' => 84, 'mx' => 80, 'my' => 83, 'desc' => 'Protocolo que conecta agentes de IA a ferramentas e dados.', 'liga' => [], 'links' => [
                    ['tipo' => 'repo', 'titulo' => 'first-agent-with-mcp', 'desc' => 'Agente LangChain conectado a um servidor MCP próprio.', 'url' => 'https://github.com/kleitonfr/first-agent-with-mcp'],
                ]],
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
