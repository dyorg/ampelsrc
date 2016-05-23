<?php
	include_once("../includes/top.admin.func.php");
	
	// print_rr($array);
		
	# REMOVE OS ESPAÇO DESNECESSÁRIOS
	if ($array["seguranca"])
		foreach ($array["seguranca"] as $index => $valor)
			$array["seguranca"][$index] = trim(addslashes($valor));

	if (!$excluir) {

		// VALIDA NOME
		if (empty($array["seguranca"]["usuario_nome"])) {
			$mensagemDeErro .= "- Preencha o Nome<br>";
			$erro = 1;
		}  
		
		// VALIDA LOGIN
		if (empty($array["seguranca"]["usuario_login"])) {
			$mensagemDeErro .= "- Preencha o Login<br>";
			$erro = 1;
		}  

		// VALIDA SENHA
		if (empty($array["seguranca"]["usuario_senha"])) {
			$mensagemDeErro .= "- Preencha o Senha<br>";
			$erro = 1;
		}  
					
		if (!$erro) {
			
			if (strlen($array["seguranca"]["usuario_senha"]) < 32) 
				$array["seguranca"]["usuario_senha"] = md5($array["seguranca"]["usuario_senha"]);			
				
			if ($array["acao"] == "inserir") {
				inserirRegistro(CONEXAO, "usuario", $array["seguranca"]);
			} else {
				alterarRegistro(CONEXAO, "usuario", "usuario_id", $array["id"], $array["seguranca"]);
				
			}
		}
	} else {
		excluirRegistro(CONEXAO, "usuario", "usuario_id", $excluir);
	}

	include_once("../includes/rod.admin.func.php");
?>