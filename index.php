<?php 

//Arquivo index repomsável pela inicialização do sistema
require 'vendor/autoload.php';


$document = new \Bissolli\ValidadorCpfCnpj\CPF('123.456.789.00');

var_dump($document->isValid());

?>
