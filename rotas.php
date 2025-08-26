<?php 

//Rotas
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('sistema\Control');

SimpleRouter::get('blog/', 'SiteControl@index');
SimpleRouter::get('blog/sobre', 'SiteControl@sobre');

SimpleRouter::start();

?>