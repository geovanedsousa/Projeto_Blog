<?php 
//Arquivo index repomsável pela inicialização do sistema

require_once "sistema/configuracao.php";
include_once "./sistema/Nucleo/helpers.php";
include "./sistema/Nucleo/Mensagem.php";

//$msg = new Mensagem();
//echo $msg -> sucesso('Mensagem de sucesso')-> renderizar();
//echo (new Mensagem())-> erro ('Mensagem de erro')-> renderizar();

use sistema\Nucelo\Mensagem;

echo (new Mensagem)-> alerta('Mensagem de Alerta');
echo '<hr>';


?>
