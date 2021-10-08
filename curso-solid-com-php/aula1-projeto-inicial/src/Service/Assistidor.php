<?php

namespace Alura\Solid\Service;

use Alura\Solid\Model\AluraMais;
use Alura\Solid\Model\Assistivel;
use Alura\Solid\Model\Curso;

class Assistidor
{
    public function assiste(Assistivel $conteudo)
    {
        $conteudo->assistir();
    }
}
