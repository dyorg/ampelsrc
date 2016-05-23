<?php
	include_once("../includes/top.admin.func.php");
	$tabela = "produto_importados";
	if (!$excluir) {
		if (empty($array["dados"]["titulo"])) {
			$mensagem .= "- Preencha o Título<br>";
			$erro = 1;
		}
		//print_r($array["dados"]); die();
		
		if (!$erro) {
			if ($array["acao"] == "inserir") {
				//$array["dados"]["data_cadastro"] = date("Y-m-d H:i:s");
				$idReg = inserirRegistro(CONEXAO, $tabela, $array["dados"]);	
			} else {
				$idReg = $array["id"];
				alterarRegistro(CONEXAO, $tabela, "id", $array["id"], $array["dados"]);	
			}
		} else {
			echo $mensagem;
		}
	} else {
		$dadosExcluir["status"] = 0;
		alterarRegistro(CONEXAO, $tabela, "id", $excluir, $dadosExcluir);	
	}
?>