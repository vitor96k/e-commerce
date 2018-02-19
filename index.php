<?php

require_once("vendor/autoload.php");

$app = new Slim\App();


$app->get('/', function ($request, $response, $args) {

	$pagina = new vitor96k\Pagina();
	$pagina->setTpl("index");    

});

$app->get('/admin', function (){

	$pagina = new vitor96k\PaginaAdmin();
	$pagina->setTpl("index"); 

});

$app->run();


?>