<?php

/*
 * Classe DAO para a tabela agenda.
 * Data Access Object que ir� fazer opera��es na tabela Agenda (b�sica: Insert, Update, Delete e Lista)
 */

class DepartamentoDAO extends PDOConnectionFactory {
	//ir� receber a conex�o
	public $conex = null;
	
	//construtor
	public function DepartamentoDAO() {
		$this->conexao = PDOConnectionFactory::getConnection();
	}
	
	//realiza uma inser��o
	public function Insere( $departamento ) {
		try {
				// preparo a query de inser�ao - Prepare Statement				
				$stmt = $this->conexao->prepare("INSERT INTO departamentos (iddepartamento, departamento) VALUES (?, ?)");
				// valores encapsulados nas vari�veis da classe AdmDepartamentos.
				// sequencia de �ndices que representa cada valor de minha query
				$stmt->bindValue(1, $departamento->getIdDepartamento());
				$stmt->bindValue(2, $departamento->getDepartamento());				
				
				// executo a query preparada
				$stmt->execute();
				
				//fecho a conex�o
				$this->conexao = null;
				
		//caso ocorra um erro, retorna o erro
		}catch ( PDOException $ex ) { echo "Erro:".$ex->getMessage(); }
	}
	
	//realiza um Update
	public function Update( $departamento, $condicao ) {
		try {
				// preparo a query de update - Prepare Statement
				$stmt = $this->conexao->prepare("UPDATE departamentos SET departamento=? WHERE iddepartamento=?");
				$this->conexao->beginTransaction();
				
				$stmt->bindValue(1, $departamento->getDepartamento());				
				$stmt->bindValue(2, $condicao);
				
				// executo a query preparada
				$stmt->execute();
				
				$this->conexao->commit();
				
				//fecho a conex�o
				$this->conexao = null;
				
		//caso ocorra um erro, retorna o erro
		}catch ( PDOException $ex ) { echo "Erro:".$ex->getMessage(); }
	}
	
	//remove um registro
	public function Deleta( $iddepartamento ) {
		try {
				// executo a query
				$num = $this->conexao->exec("DELETE FROM departamentos WHERE iddepartamento=$iddepartamento");
				// caso seja execuado ele retorna o n�mero de rows que foram afetadas.
				if($num >= 1) { return $num; } else { return 0; }
				
				
		//caso ocorra um erro, retorna o erro
		}catch ( PDOException $ex ) { echo "Erro:".$ex->getMessage(); }
	}
	
	public function getDepartamentosPorId($id) {
		$sql = "SELECT * FROM departamentos WHERE iddepartamento = ".$id;
		$stmt = $this->conexao->prepare($sql);
		//$stmt->bindValues(1,$id);
		
		$stmt->execute();
		
		$searchResults = array();
		
		while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
			$temp = new Departamento();
			$temp->setIdDepartamento($rs->iddepartamento);
			$temp->setDepartamento($rs->departamento);
			
			array_push($searchResults, $temp);
		} 
		
		if(count($rs) > 1) {
			return $searchResults;
		} else {
			return $temp;
		}
	}

	function Pag() {
		$sql = "SELECT * FROM departamentos LIMIT 0,10";
		$stmt = $this->conexao->prepare($sql);
		
		$stmt->execute();
		
		
		$registros = $stmt->rowCount(PDO::FETCH_OBJ);
		$temp = new Paginacao();
		
		$temp->setRegistrosPorPagina($registros);
			
		return $temp;
	}
	
	//mostra os registros
	public function Lista() {
		$sql = "SELECT * FROM departamentos";
		$stmt = $this->conexao->prepare($sql);	
		$stmt->execute();
		
		$searchResults = array();
		
		while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
			$temp = new Departamento();
			$temp->setIdDepartamento($rs->iddepartamento);
			$temp->setDepartamento($rs->departamento);
			
			array_push($searchResults, $temp);
		} 
		
		if(count($searchResults) > 1) {
			return $searchResults;
		} else {
			return $temp;
		}
	}
	
	/*function pegarPaginas($qtd) {
		//� esse o nome da tabela ?
		$sql = "SELECT * FROM departamentos";
		$stmt = $this->conexao->prepare($sql);
		
		$stmt->execute();
		
		$rs = $stmt->fetch(PDO::FETCH_OBJ);
		print_r($rs);
		
		//echo $registros;
		
		//$paginas = ceil($registros / $qtd);
		
		//return $searchResults;
	}*/
	
	//mostra os registros
	public function Paginacao($order,$limit) {
		$temp = new Departamento();
		$sql = "SELECT * FROM departamentos $order LIMIT 0,$limit";
		$stmt = $this->conexao->prepare($sql);	
		
		//$stmt->bindValue(':order', $order, PDO::PARAM_STR);;	
		//$stmt->bindValue(':limitfim', $limit, PDO::PARAM_INT);	
		
		$stmt->execute();
		
		$registrosPorPagina = $stmt->rowCount(PDO::FETCH_OBJ);
		
		$searchResults = array();
		
		while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
			
			$temp->setIdDepartamento($rs->iddepartamento);
			$temp->setDepartamento($rs->departamento);
			$temp->setRegistrosPorPagina($registrosPorPagina);
			
			array_push($searchResults, $temp);
		} 
		
		if(count($searchResults) > 1) {
			return $searchResults;
		} else {
			return $temp;
		}
	}
	
}

?>