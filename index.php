<?php 
//Arquivo index repomsável pela inicialização do sistema

require_once "sistema/configuracao.php";
include_once "helpers.php";
include "./sistema/Nucleo/Mensagem.php";

$msg = new Mensagem();
echo $msg -> renderizar();
echo '<hr>';
var_dump($msg);




?>
