<?php 
//Arquivo index repomsável pela inicialização do sistema

require_once "sistema/configuracao.php";
include_once "./sistema/Nucleo/Helpers.php";
include "./sistema/Nucleo/Mensagem.php";

use sistema\Nucelo\Helpers;
//use sistema\Nucelo\Mensagem;
//echo (new Mensagem)-> alerta('Mensagem de Alerta');

echo Helpers:: saudacao();
echo '<hr>'; 
echo Helpers::dataAtual();
echo '<hr>';


?>
