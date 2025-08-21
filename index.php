<?php 

//Arquivo index repomsável pela inicialização do sistema
require 'vendor/autoload.php';

echo sistema\Nucleo\Helpers::saudacao();
echo '<hr>';
var_dump(sistema\Nucleo\Helpers::validarCfp('082.948.085-47'))


?>