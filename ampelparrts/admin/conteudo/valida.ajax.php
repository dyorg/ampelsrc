<?php
	include_once("../includes/top.admin.func.php");
	$tabela = "conteudo";
	
	$array["dados"]["descricao_portugues"]= stripslashes(str_replace("../../images/tinymce/", URL_SITE."/images/tinymce/", $array["dados"]["descricao_portugues"]));
	$array["dados"]["descricao_ingles"]= stripslashes(str_replace("../../images/tinymce/", URL_SITE."/images/tinymce/", $array["dados"]["descricao_ingles"]));
	$array["dados"]["descricao_espanhol"]= stripslashes(str_replace("../../images/tinymce/", URL_SITE."/images/tinymce/", $array["dados"]["descricao_espanhol"]));
	$array["dados"]["descricao_arabe"]= stripslashes(str_replace("../../images/tinymce/", URL_SITE."/images/tinymce/", $array["dados"]["descricao_arabe"]));
	$array["dados"]["descricao_frances"]= stripslashes(str_replace("../../images/tinymce/", URL_SITE."/images/tinymce/", $array["dados"]["descricao_frances"]));
	$array["dados"]["descricao_russo"]= stripslashes(str_replace("../../images/tinymce/", URL_SITE."/images/tinymce/", $array["dados"]["descricao_russo"]));
	
	
	if ($_REQUEST["validar"] == "bloqueio") {
		$registro = end(registro(CONEXAO, $tabela, "id", $_REQUEST["id"]));
		echo ($registro["bloqueado"] == 1) ? "nao" : "sim";
	}elseif (!$excluir) {
		if (empty($array["dados"]["titulo_portugues"])) {
			$mensagem .= "- Preencha o Título<br>";
			$erro = 1;
		}

		if (!$erro) {
			if ($array["acao"] == "inserir") {
				$array["dados"]["data_cadastro"] = date("Y-m-d H:i:s");
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
?>