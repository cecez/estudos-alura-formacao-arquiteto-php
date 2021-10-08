<?php

namespace Alura\Solid\Model;

use JetBrains\PhpStorm\Pure;

class AluraMais extends Video implements Pontuavel, Assistivel
{
    private $categoria;

    public function __construct(string $nome, string $categoria)
    {
        parent::__construct($nome);
        $this->categoria = $categoria;
    }

    public function recuperarUrl(): string
    {
        return 'https://videos.alura.com.br/'. new Slug($this->categoria) . '/' . new Slug($this->nome);
    }

    #[Pure] public function recuperarPontuacao(): int
    {
        return $this->minutosDeDuracao() * 2;
    }
}
