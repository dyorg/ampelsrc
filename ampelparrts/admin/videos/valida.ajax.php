<?php
	include_once("../includes/top.admin.func.php");
	if (!$excluir) {

		if (empty($array["dados"]["nome"])) {
			$mensagem .= "- Preencha o Nome<br>";
			$erro = 1;
		}  

		if (empty($array["dados"]["url"])) {
			$mensagem .= "- Preencha a URL<br>";
			$erro = 1;
		}  


		# AJUSTES DE ACENTUAÇÃO
		if ($array["dados"])
			foreach ($array["dados"] as $index => $valor)
				$array["dados"][$index] = utf8_encode($valor);


		if (!$erro) {
			if ($array["acao"] == "inserir") {
				inserirRegistro(CONEXAO, "video", $array["dados"]);
			} else {
				alterarRegistro(CONEXAO, "video", "id", $array["id"], $array["dados"]);					
			}
		} else {
			echo $mensagem;
		}
	} else {
		excluirRegistro(CONEXAO, "video", "id", $_REQUEST["excluir"]);		
	}
	include_once("../includes/rod.admin.func.php");
?>