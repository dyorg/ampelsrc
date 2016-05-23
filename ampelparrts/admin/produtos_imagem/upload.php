<?php
	$tabela = "produto_imagem";
	include_once("../includes/top.admin.func.php");
	include_once("../../classes/class.upload.php");
	include_once("class.php");
	$acao = $_REQUEST["acao"];

	if(isset($acao))
		switch($acao) {
			case "inserir":
					$handle = new Upload($_FILES['file']);
					if ($handle->uploaded) {
		
						$explodir = explode(".", $_FILES['file']["name"]);
						$extensao = end($explodir);
						$novo_nome_img = date("dmY_H_i_s");
						$imagem1["id_produto"] = $_REQUEST["id_produto"];
						$imagem1["imagem"] = $novo_nome_img.".".$extensao;				
						$imagem_id = inserirRegistro($conexao, $tabela, $imagem1);
				
						# IMAGEM ORIGINAL			
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_produto/_original");
						
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_produto/".$_REQUEST["id_produto"]."/gg");
						
						$handle->image_resize         = true;
						$handle->image_x              = 500;
						$handle->image_y              = 500;
						$handle->image_ratio          = true;
						$handle->image_ratio_fill	   = true;
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_produto/".$_REQUEST["id_produto"]."/g");
						
						$handle->image_resize         = true;
						$handle->image_x              = 600;
						$handle->image_y              = 450;
						$handle->image_ratio          = true;
						$handle->image_ratio_fill	   = true;
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_produto/".$_REQUEST["id_produto"]."/gp");
						
						$handle->image_resize         = true;
						$handle->image_x              = 213;
						$handle->image_y              = 114;
						$handle->image_ratio          = true;
						$handle->image_ratio_fill	   = true;
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_produto/".$_REQUEST["id_produto"]."/p");
						
						$handle->image_resize         = true;
						$handle->image_x              = 90;
						$handle->image_y              = 90;
						$handle->image_ratio          = true;
						$handle->image_ratio_fill	   = true;
						$handle->file_new_name_body   = $imagem_id.$novo_nome_img;
						$handle->Process("../../images/_produto/".$_REQUEST["id_produto"]."/t");
						
		
						if ($handle->processed) {	
							echo "<script>window.opener.mensagemGrow('".utf8_encode($tituloPagina)."', '".utf8_decode("Imagem cadastrada com sucesso!")."', 'ok');</script>";				
							echo "<script>window.opener.$('#dataGrid').flexReload();</script>";
							echo "<script>window.location.href='form.php?id_produto=".$_REQUEST["id_produto"]."';</script>";				
						} else {
							excluirRegistro($conexao, "produto_imagem", "id", $imagem_id);	
							echo "<script>window.opener.mensagemGrow('".utf8_encode($tituloPagina)."', '".utf8_decode("Não foi possível enviar a imagem!")."', 'alerta');</script>";				
							echo "<script>window.opener.$('#dataGrid').flexReload();</script>";
							echo "<script>window.location.href='form.php?id_produto=".$_REQUEST["id_produto"]."';</script>";				
						}
					} 
				
				break;
				
			case "excluir":
			
				$sql = "SELECT * FROM ".$tabela." WHERE id = '".$_REQUEST["id"]."'";
				$dadosExcluir = montaVetor(executaSql($conexao, $sql));
				@unlink("../../images/_produto/".$dadosExcluir[0]["id_produto"]."/p/".$_REQUEST["id"].$dadosExcluir[0]["imagem"]);
				@unlink("../../images/_produto/".$dadosExcluir[0]["id_produto"]."/t/".$_REQUEST["id"].$dadosExcluir[0]["imagem"]);
				@unlink("../../images/_produto/".$dadosExcluir[0]["id_produto"]."/g/".$_REQUEST["id"].$dadosExcluir[0]["imagem"]);
				@unlink("../../images/_produto/".$dadosExcluir[0]["id_produto"]."/gp/".$_REQUEST["id"].$dadosExcluir[0]["imagem"]);
				@unlink("../../images/_produto/".$dadosExcluir[0]["id_produto"]."/gg/".$_REQUEST["id"].$dadosExcluir[0]["imagem"]);
				excluirRegistro($conexao, $tabela, "id", $_REQUEST["id"]);	
				
 				break;
 				
			case "alterarOrdem":
			
				$sql = "UPDATE produto_imagem SET ordem = ".$_REQUEST["ordem"]." WHERE id = '".$_REQUEST["id"]."'";
				executaSql($conexao, $sql);				
 				break;
 				
 			case "listarHTML":
				$imagem = new imagem;
				$imagem->id = $_REQUEST["id"];
				$imagem->id_produto = $_REQUEST["id_produto"];
				
				$imagem->vetorArray["ordenar"] = "id";
				$imagem->vetorArray["por"] = "ASC";
				$imagem->valida();
				$dadosImagem = $imagem->listar();	
				
				
				if ($dadosImagem[0]["id"]) {
					foreach ($dadosImagem as $index => $valor) {
			?>
					<div class="img_item" id="list_img_<?=$valor["id"]?>">
						<img src="../../images/_produto/<? if (file_exists($valor["id_produto"]."/p/".$valor["id"].$valor["imagem"])) { echo $valor["id_produto"]."/p/".$valor["id"].strtoupper($valor["imagem"]); } else { echo $valor["id_produto"]."/p/".$valor["id"].strtolower($valor["imagem"]); }?>" width="75" />
		  				<p><a href="javascript: if (confirm('Tem certeza que deseja excluir essa imagem? ')) {  excluirImagem(<?=$valor["id"]?>, <?=$valor["id_produto"]?>); }"><img src="../images/icones/btn-deletar.gif" width="25" height="25" border="0" /></a></p>
		  			</div>
			<?php
					}
				} else {
					echo "<div class='img_item'>Nenhuma imagem cadastrada.</div>";
				}		
				
						
 				break;
	}
?>