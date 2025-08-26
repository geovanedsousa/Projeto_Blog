<?php 

//Rotas
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('sistema\Control');

SimpleRouter::get(URL_SITE, 'SiteControl@index');
SimpleRouter::get(URL_SITE.'sobre', 'SiteControl@sobre');

SimpleRouter::start();

?>