<?php 

namespace sistema\Control;

use sistema\Nucelo\Controlador;

class SiteControl extends Controlador
{

   public function __construct(string $diretorio)
   {
      parent::__construct('templates/site/views');
   }

   public function index(): void
   {
    echo 'página index';
   }
   public function sobre(): void
   {
    echo 'página sobre';
   }
}

?>