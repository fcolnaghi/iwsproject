<?php
	class LayoutAdministracao extends AdministracaoHTML  {
		public function EstruturaAdministracao($acao) {
			switch ($acao) {
				case "mostra":
					$this->AdministracaoMostra("Verificar Usu�rios");
				break;
				case "add":
					$this->AdministracaoADD("Criar Usu�rios","return valida_usuario();","act/Administracao.act.php?acao=add","usuario","post");
				break;
				case "altera":
					$this->AdministracaoALT("Alterar Usu�rio","return valida_altusuario();","act/Administracao.act.php?acao=alt","altusuario","post");
				break;
			}
		}
	}
?>