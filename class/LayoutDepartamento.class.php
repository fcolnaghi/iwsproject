<?php
	class LayoutDepartamento extends DepartamentoHTML {
		public function EstruturaDepartamento($acao) {
			switch ($acao) {
				case "mostra":
					$this->DepartamentoMostra("Verificar Departamentos");
				break;
				case "add":
					//$this->ADDALTBanner();
				break;
				case "altera":
					//$this->AdministracaoALT("Alterar Usu�rio","return valida_altusuario();","act/Administracao.act.php?acao=alt","altusuario","post");
				break;
			}
		}
	}
?>