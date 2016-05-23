<?php
	include_once("../includes/top.admin.func.php");
	$tabela = "produto_categoria";
	if (!$excluir) {
		// VALIDA NOME
		if (empty($array["dados"]["nome"])) {
			$mensagem .= "- Preencha o Nome<br>";
			$erro = 1;
		}  
			
		if (!$erro) {
			if ($array["acao"] == "inserir") {
				inserirRegistro(CONEXAO, $tabela, $array["dados"]);	
			} else {
				alterarRegistro(CONEXAO, $tabela, "id", $array["id"], $array["dados"]);	
			}
		} else {
			echo $mensagem;
		}
	} else {
		$dadosExcluir["status"] = 0;
		alterarRegistro(CONEXAO, $tabela, "id", $excluir, $dadosExcluir);	
	}

	include_once("../includes/rod.admin.func.php");
?>