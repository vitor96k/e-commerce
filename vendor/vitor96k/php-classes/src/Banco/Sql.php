<?php 

namespace vitor96k\Banco;

class Sql {

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_ecommerce";

	private $conn;

	// Faz a conexao com o banco
	public function __construct(){

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);
	}

	// Atribui todos parametros a uma query
	private function setParams($statement, $parameters = array()){

		foreach ($parameters as $key => $value){			
			$this->bindParam($statement, $key, $value);
		}
	}

	// Atribui apenas um parametro a query
	private function bindParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}

	// Realiza alguma operacao no banco sem retornar algo
	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
	}

	// Realiza uma operacao no banco e retorna uma resposta
	public function select($rawQuery, $params = array()):array{

		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}

 ?>
