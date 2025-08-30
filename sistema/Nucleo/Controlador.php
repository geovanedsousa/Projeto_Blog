<?php 

namespace sistema\Nucelo;

use sistema\Suporte\Twig;

class Controlador
{
    protected Twig $twig; 

    public function __construct(string $diretorio)
    {
        $this->twig= new Twig($diretorio);
    }
}

?>