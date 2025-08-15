<?php 
//Arquivo index repomsável pela inicialização do sistema

require_once "sistema/configuracao.php";
include_once "./sistema/Nucleo/Helpers.php";
include "./sistema/Nucleo/Mensagem.php";
include "./sistema/Nucleo/Controlador.php";

use sistema\Nucelo\Controlador;

$controlador= new Controlador('admin');
echo '<hr>';
var_dump($controlador);

echo '<hr>';


?>
