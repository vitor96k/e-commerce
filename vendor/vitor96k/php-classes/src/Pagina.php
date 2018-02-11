<?php

namespace vitor96k;

use Rain\Tpl;

class Pagina{

	private $tpl;
	private $opcoes;
	private $padrao = [
		"dados" => []
	];

	private function setDados($dados = array()){
		foreach ($dados as $chave => $valor){
			$this->tpl->assign($chave,$valor);
		}
	}
	
	public function __construct($opt = array()){


		//Configuracoes iniciais para usar o Rain/TPL
		$config = array(
    		"tpl_dir"       => $_SERVER['DOCUMENT_ROOT']."/e-commerce/views/",
    		"cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/e-commerce/views-cache/"
		);	

		Tpl::configure($config);
		$this->tpl = new Tpl;

		//Mescla a configuracao padrao com o que é informado
		$this->opcoes = array_merge($this->padrao,$opt);

		// Atribui as opcoes no TPL
		$this->setDados($this->opcoes["dados"]);

		// Printa para o usuario
		$this->tpl->draw("header");

	}

	public function setTpl($nome,$dados = array(), $retornoHTML = false){

		$this->setDados($dados);
		$this->tpl->draw($nome,$retornoHTML);
	}

	public function __destruct(){
		$this->tpl->draw("footer");
	}
}


?>

