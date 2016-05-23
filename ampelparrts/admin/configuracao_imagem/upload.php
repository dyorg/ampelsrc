<?php
	$tabela = "configuracao_imagem";
	include_once("../includes/top.admin.func.php");
	$tituloPagina = "Configuração - Imagem";
	include_once("../includes/top.popup.admin.inc.php");
	include_once("../../classes/class.upload.php");
	include_once("class.php");

	if(isset($acao))
		switch($acao) {
			case "inserir":

				for ($cont = 1; $cont <= 3; $cont++) {
					$handle = new Upload($_FILES['arquivo'.$cont]);
					if ($handle->uploaded) {
		
						$explodir = explode(".", $_FILES["arquivo".$cont]["name"]);
						$extensao = end($explodir);
						$novo_nome_img = date("dmY_H_i_s");
						$imagem1["imagem"] = $novo_nome_img.".".$extensao;
						$imagem1["tipo"] = $_REQUEST["tipo"];
						$imagem1["idioma"] = $_REQUEST["idioma"];
						$imagem1["url"] = $_REQUEST["url".$cont];
						/*
						if ($_REQUEST["tipo"] == "banner1") {
							$tamanho_x = 710;
							$tamanho_y = 235;
						} else {
							$tamanho_x = 470;
							$tamanho_y = 180;

						}
						*/
						$imagem_id = inserirRegistro($conexao, $tabela, $imagem1);
				
						# IMAGEM ORIGINAL			
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						//$handle->Process("../../images/_configuracao/_original");
						$handle->Process("../../images/_configuracao/");
						
						/*
						$handle->image_resize         = true;
						$handle->image_x              = $tamanho_x;
						$handle->image_y              = $tamanho_y;
						$handle->image_ratio          = true;
						$handle->image_ratio_fill	   = true;
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_configuracao/");
						*/
						
						if ($handle->processed) {	
							echo "<script>window.opener.mensagemGrow('".$tituloPagina."', '".utf8_decode("Imagem cadastrada com sucesso!")."', 'ok');</script>";				
							echo "<script>window.opener.$('#dataGrid').flexReload();</script>";
							echo "<script>window.location.href='form.php?tipo=".$_REQUEST["tipo"]."&idioma=".$_REQUEST["idioma"]."';</script>";				
						} else {
							excluirRegistro($conexao, $tabela, "id", $imagem_id);	
							echo "<script>window.opener.mensagemGrow('".$tituloPagina."', '".utf8_decode("Não foi possível enviar a imagem!")."', 'alerta');</script>";				
							echo "<script>window.opener.$('#dataGrid').flexReload();</script>";
							echo "<script>window.location.href='form.php?tipo=".$_REQUEST["tipo"]."&idioma=".$_REQUEST["idioma"]."';</script>";				
						}
					} 
				}
				break;
				
			case "excluir":
				$sql = "SELECT * FROM ".$tabela." WHERE id = '".$_REQUEST["id"]."'";
				$dadosExcluir = montaVetor(executaSql($conexao, $sql));
				@ unlink("../../images/_configuracao/".$_REQUEST["id"].$dadosExcluir[0]["imagem"]);
				excluirRegistro($conexao, $tabela, "id", $_REQUEST["id"]);	
				echo "<script>window.opener.mensagemGrow('".utf8_encode($tituloPagina)."', 'Imagem excluída com sucesso!', 'ok');</script>";				
				echo "<script>window.opener.$('#dataGrid').flexReload();</script>";
				echo "<script>window.location.href='form.php?tipo=".$_REQUEST["tipo"]."';</script>";				
 				break;
	}
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>