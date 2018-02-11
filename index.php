<?php

require_once("vendor/autoload.php");

$app = new Slim\App();

$app->get('/', function (){

	$pagina = new vitor96k\Pagina();
	$pagina->setTpl("index");    

});

$app->run();


?>