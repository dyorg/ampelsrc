<?php
	include_once("../includes/top.admin.func.php");
	if (!$excluir) {
		if ($array["tabela"] == "categoria") {
			if (empty($array["dados"]["nome_portugues"])) {
				$mensagem .= "- Preencha o Nome<br>";
				$erro = 1;
			}  
		} else {
			if (empty($array["dados"]["nome_portugues_subcategoria"])) {
				$mensagem .= "- Preencha o Nome<br>";
				$erro = 1;
			}  	
		}
		/*
		# AJUSTES DE ACENTUAÇÃO
		if ($array["dados"])
			foreach ($array["dados"] as $index => $valor)
				$array["dados"][$index] = ($valor);
		*/

		if (!$erro) {
			if ($array["acao"] == "inserir") {
				inserirRegistro(CONEXAO, "produto_".$array["tabela"], $array["dados"]);
			} else {
				if ($array["tabela"] == "categoria") {
					alterarRegistro(CONEXAO, "produto_categoria", "id", $array["id"], $array["dados"]);	
				} else {
					alterarRegistro(CONEXAO, "produto_subcategoria", "id_subcategoria", $array["id_subcategoria"], $array["dados"]);	
				}
				
			}
		} else {
			echo $mensagem;
		}
	} else {
		if ($_REQUEST["tabela"] == "categoria") {
			excluirRegistro(CONEXAO, "produto_categoria", "id", $_REQUEST["excluir"]);
		} else {
			excluirRegistro(CONEXAO, "produto_subcategoria", "id_subcategoria", $_REQUEST["excluir"]);	
		}
		
	}
	include_once("../includes/rod.admin.func.php");
?>