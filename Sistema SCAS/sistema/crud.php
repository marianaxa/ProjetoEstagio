<?php 

	class Crud{

		private $pdo;
		private $numRows;
		private $array;

		public function __construct(){

			try {
				
				$this->pdo = new PDO("mysql:host=localhost;dbname=lasfac2", "root", "root");
			} catch (PDOException $e) {
				echo "Falha ao se conectar com o banco! <br><br>";

				echo "Erro: ".$e->getMessage();
			}
		}

//select pro cargo
		public function selectCargo($sql){
			$query = $this->pdo->query($sql);

			$this->arrayCargo = $query->fetchAll();
		}

		public function resultCargo(){
			return $this->array;
		}
//fim select pro cargo

		public function insertComId($tabela, $vetor){

			if((!empty($tabela)) && (is_array($vetor) && count($vetor) > 0 )){
				$sql = "INSERT INTO ".$tabela." SET ";
				$dados = array() ;

				foreach ($vetor as $chave => $valor) {
					$dados[] = $chave." = '".addcslashes($valor, "")."'";
				}

				$sql = $sql.implode(", ", $dados);

				$this->pdo->query($sql);

				//$q = SELECT LAST_INSERT_ID();
				//return $q;
			}
		}


//		
		public function select($sql){

			$query = $this->pdo->query($sql);

			$this->numRows = $query->rowCount();

			$this->array = $query->fetchAll();
		}

		public function result(){
			return $this->array;
		}

		public function numRows(){

			return $this->numRows;
		}

		public function insert($tabela, $vetor){

			if((!empty($tabela)) && (is_array($vetor) && count($vetor) > 0 )){
				$sql = "INSERT INTO ".$tabela." SET ";
				$dados = array() ;

				foreach ($vetor as $chave => $valor) {
					$dados[] = $chave." = '".addcslashes($valor, "")."'";
				}

				$sql = $sql.implode(", ", $dados);

				$this->pdo->query($sql);
			}
		}

		public function update($tabela, $vetor, $where = array(), $condicional = "AND"){

			if(!empty($tabela) && (is_array($vetor) && count($vetor) > 0) && is_array($where)){

				$sql = "UPDATE ".$tabela." SET ";
				$dados = array() ;

				foreach ($vetor as $chave => $valor) {
					$dados[] = $chave." = '".addcslashes($valor, "")."'";
				}

				$sql = $sql.implode(", ", $dados);

				if (count($where) >0) {
					$dados = array() ;

					foreach ($where as $chave => $valor) {
						$dados[] = $chave." = '".addcslashes($valor, "")."'";
					}

					$sql = $sql." WHERE ".implode(" ".$condicional." ", $dados);
				}
				$this->pdo->query($sql);
			}
		}

		public function delete($tabela, $where, $condicional = "AND"){
			if(!empty($tabela) && (is_array($where) && count($where))){
				$sql = "DELETE FROM ".$tabela;


				if (count($where) >0) {
					$dados = array() ;

					foreach ($where as $chave => $valor) {
						$dados[] = $chave." = '".addcslashes($valor, "")."'";
					}

					$sql = $sql." WHERE ".implode(" ".$condicional." ", $dados);
				}
				$this->pdo->query($sql);
			}
		}
	}

 ?>