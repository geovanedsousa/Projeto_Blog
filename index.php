<?php 
//Arquivo index repomsável pela inicialização do sistema

require_once "sistema/configuracao.php";
include_once "./sistema/Nucleo/helpers.php";
include "./sistema/Nucleo/Mensagem.php";


//use sistema\Nucelo\Mensagem;
//echo (new Mensagem)-> alerta('Mensagem de Alerta');

$hel = new Helpers();
var_dump($hel-> validarCfp(57272934808));
echo '<hr>';


?>
