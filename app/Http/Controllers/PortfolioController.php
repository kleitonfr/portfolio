<?php

namespace App\Http\Controllers;

use App\Services\PortfolioService;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function __construct(protected PortfolioService $portfolioService)
    {
    }

    public function exibirPaginaInicial(): View
    {
        $dadosDaPagina = $this->portfolioService->obterDadosDaPagina();

        return view('portfolio.index', [
            'journey' => $dadosDaPagina['journey'],
            'socialLinks' => $dadosDaPagina['socialLinks'],
            'testimonials' => $dadosDaPagina['testimonials'],
            'stacks' => $dadosDaPagina['stacks'],
            'contact' => $this->montarContato($dadosDaPagina),
        ]);
    }

    public function exibirProjeto(string $slug): View
    {
        $dadosDaPagina = $this->portfolioService->obterDadosDaPagina();
        $projeto = $this->portfolioService->obterProjetoPorSlug($slug);

        abort_if($projeto === null, 404);

        return view('portfolio.project', [
            'project' => $projeto,
            'socialLinks' => $dadosDaPagina['socialLinks'],
            'contact' => $this->montarContato($dadosDaPagina),
        ]);
    }

    /**
     * Monta o array de contato exibido no footer (compartilhado por todas as páginas).
     */
    private function montarContato(array $dadosDaPagina): array
    {
        return [
            'email' => 'kleiton.sfr@gmail.com',
            'whatsapp' => 'https://wa.me/5512997968787',
            'linkedin' => $dadosDaPagina['socialLinks'][1]['url'] ?? '',
            'github' => $dadosDaPagina['socialLinks'][0]['url'] ?? '',
            'location' => 'Caraguatatuba · São Paulo · Brasil',
        ];
    }
}
