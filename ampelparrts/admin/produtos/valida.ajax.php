<?php
	include_once("../includes/top.admin.func.php");
	$tabela = "produto";
	if (!$excluir) {
		if (empty($array["dados"]["titulo"])) {
			$mensagem .= "- Preencha o Título<br>";
			$erro = 1;
		}

		if (empty($array["dados"]["id_categoria"])) {
			$mensagem .= "- Selecione uma categoria<br>";
			$erro = 1;
		}
		
		// VALIDA O PRECO
		if ($array["dados"]["preco_de"])
			$array["dados"]["preco_de"] = valorToSql($array["dados"]["preco_de"]);
	
		// VALIDA O PRECO
		if ($array["dados"]["preco_por"])
			$array["dados"]["preco_por"] = valorToSql($array["dados"]["preco_por"]);

		
		if (!$erro) {
			if ($array["acao"] == "inserir") {
				$array["dados"]["data_cadastro"] = date("Y-m-d H:i:s");
				$idReg = inserirRegistro(CONEXAO, $tabela, $array["dados"]);	
			} else {
				$idReg = $array["id"];
				# LIMPANDO CARACTERISTICAS CONFORME O COLOCADO NO CADASTRO DO PRODUTO
				executaSql(CONEXAO, "DELETE FROM produto_x_caracteristica WHERE id_produto = ".$array["id"]);
				
				# LIMPANDO COR CONFORME O COLOCADO NO CADASTRO DO PRODUTO
				executaSql(CONEXAO, "DELETE FROM produto_x_cor WHERE id_produto = ".$array["id"]);
			
				alterarRegistro(CONEXAO, $tabela, "id", $array["id"], $array["dados"]);	
			}
			
			#SEO METAS
			if ($array["dados_seo"]["meta_title"] != "" || $array["dados_seo"]["meta_tag"] != "" || $array["dados_seo"]["meta_description"] != "") {
				if ($array["seo_acao"] == "inserir") {
					$array["dados_seo"]["data_cadastro"] = date("Y-m-d H:i:s");
					$array["dados_seo"]["pagina"] = "movel-planejado";
					$array["dados_seo"]["identificador"] = $idReg;
					inserirRegistro(CONEXAO, "seo_meta", $array["dados_seo"]);	
				} else {
					alterarRegistro(CONEXAO, "seo_meta", "id", $array["seo_id"], $array["dados_seo"]);	
				}
			}
			
		} else {
			echo $mensagem;
		}
	} else {
		$dadosExcluir["status"] = 0;
		alterarRegistro(CONEXAO, $tabela, "id", $excluir, $dadosExcluir);	
	}
?>