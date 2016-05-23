<?php
	include_once("../includes/top.admin.func.php");

	if ($excluir) {
		excluirRegistro(CONEXAO, "configuracao_imagem", "id", $excluir);
	}

	include_once("../includes/rod.admin.func.php");
?>