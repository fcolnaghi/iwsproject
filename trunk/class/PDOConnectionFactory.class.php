<?php
class PDOConnectionFactory{
	//recebe a conex�o
	public $conexao = null;
	//qual o banco de dados
	public $dbType = "mysql";
	
	//par�metros de conex�o
	// quando n�o for necess�rio deixe em branco apenas com as aspas duplas ""
	public $host = "localhost";
	public $user = "root";
	public $senha = "root";
	public $db = "oiter";
	
	public $hostConstrutor = "localhost";
	public $userConstrutor = "root";
	public $senhaConstrutor = "root";
	public $dbConstrutor = "construtor";
	
	/*public $host = "mysql03.clicknobairro.com.br";
	public $user = "clicknobairro2";
	public $senha = "dados010101";
	public $db = "clicknobairro2";
	
	public $hostConstrutor = "mysql04.clicknobairro.com.br";
	public $userConstrutor = "clicknobairro3";
	public $senhaConstrutor = "dados010101";
	public $dbConstrutor = "clicknobairro3";*/
	
	//seta a persist�ncia da conex�o
	public $persistent = false;
	
	//new PDOConnectionFactory( true ) <--- conex�o persistente
	//new PDOConnectionFactory()       <--- conexao n�o persistente
	public function PDOConnectionFactory( $persistent=false ) {
		// verifico a persist�ncia da conexao
		if($persistent != false) { $this->persistent = true; }
	}
	
	public function getConnection() {
		try {
			//realiza a conex�o
			$this->conexao = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db, $this->user, $this->senha,array( PDO::ATTR_PERSISTENT => $this->persistent ));
			// realizado com sucesso, retorna conectado
			return $this->conexao;
		// caso ocorra um erro, retorna o erro;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
	
	public function getConnectionConstrutor() {
		try {
			//realiza a conex�o
			$this->conexao = new PDO($this->dbType.":host=".$this->hostConstrutor.";dbname=".$this->dbConstrutor, $this->userConstrutor, $this->senhaConstrutor,array( PDO::ATTR_PERSISTENT => $this->persistent ));
			// realizado com sucesso, retorna conectado
			return $this->conexao;
		// caso ocorra um erro, retorna o erro;
		}catch ( PDOException $ex ){  echo "Erro: ".$ex->getMessage(); }
	}
	
	// desconecta
	public function Close() {
		if($this->conexao != null)
			$this->conexao = null;
	}
}
?>