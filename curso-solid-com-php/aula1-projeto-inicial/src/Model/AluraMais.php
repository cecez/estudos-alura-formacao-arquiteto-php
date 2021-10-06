<?php

namespace Alura\Solid\Model;

use JetBrains\PhpStorm\Pure;

class AluraMais extends Video implements Pontuavel
{
    private $categoria;

    public function __construct(string $nome, string $categoria)
    {
        parent::__construct($nome);
        $this->categoria = $categoria;
    }

    public function recuperarUrl(): string
    {
        return str_replace(' ', '-', strtolower($this->categoria));
    }

    #[Pure] public function recuperarPontuacao(): int
    {
        return $this->minutosDeDuracao() * 2;
    }
}
