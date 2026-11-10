<?php

namespace App\Contracts;

interface PortfolioRepositoryInterface
{
    public function obterItensDaJornada(): array;

    public function obterProjetos(): array;

    public function obterProjetoPorSlug(string $slug): ?array;

    public function obterRedesSociais(): array;

    public function obterDepoimentos(): array;

    public function obterStacks(): array;
}
