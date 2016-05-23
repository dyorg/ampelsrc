<?php
	include_once("../includes/top.admin.func.php");
	$tabela = "newsletter";
	
	if ($excluir) {
		$dadosExcluir["status"] = 0;
		alterarRegistro(CONEXAO, $tabela, "id", $excluir, $dadosExcluir);	
	}
?>