<?php

namespace vitor96k;

class User{

	private $nome;

	public function __construct(){
		$this->nome = "Vitor";
	}

	public function getNome(){
		echo "Meu nome é ".$this->nome;
	}
}
?>