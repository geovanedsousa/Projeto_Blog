<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

<?php 
//Arquivo index repomsável pela inicialização do sistema

require_once "sistema/configuracao.php";
include_once "helpers.php";
include "./sistema/Nucleo/Mensagem.php";

$msg = new Mensagem();
echo $msg -> sucesso('Mensagem de sucesso')-> renderizar();
echo '<hr>';
echo $msg -> erro('Mensagem de erro')-> renderizar();
echo '<hr>';
echo $msg -> alerta('Mensagem de alerta')-> renderizar();
echo '<hr>';
echo $msg -> informa('Mensagem de informação')-> renderizar();
echo '<hr>';
//var_dump($msg);




?>
