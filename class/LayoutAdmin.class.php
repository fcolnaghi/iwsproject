<?php
	class LayoutAdmin extends HTML {
		public function EstruturaPainel() {
			session_start();
			
			$clienteDAO = new ClienteDAO();
			$usuario = $_SESSION['usuario'];
			$menu = $_GET["menu"];
			$acao = $_GET["act"];
			
			$cliente = $clienteDAO->getUsuarioPorNome("Oiter Busca");
			
			$this->Painel($cliente,$usuario,$menu,$acao);
		}
		
		public function EstruturaLogin() {
			$clienteDAO = new ClienteDAO();			
			
			$cliente = $clienteDAO->getUsuarioPorNome("Oiter Busca");

			$this->Login($cliente);
		}
	}
?>