<?php
	//$produto->pagina = $pagina; 
	#Página, categoria / subcategoria / listagem geral
	$paginaProduto = $parametros[$indice+1];
	//echo "Pagina:".$paginaProduto."<br>";
	if ($paginaProduto == "categoria" || $paginaProduto == "subcategoria") {
		$pagina = ($parametros[($indice+3)] == "") ? "1" : $parametros[($indice+3)];		
	}
	//echo "Paginacao: ".$pagina;
	$produto->pagina = $pagina; 
	$produto->orderBy = " id ASC " ;
	if ($paginaProduto == "categoria") {
		$produto->where = " id_categoria = ".$parametros[$indice+2]." " ;
		$categoria = $produto->categoria($parametros[$indice+2]);
	} elseif ($paginaProduto == "subcategoria") {
		$subcategoria = $produto->categoriasub($parametros[$indice+2]);
		$categoria = $produto->categoria($subcategoria[0]["id_categoria"]);
		$produto->where = " id_subcategoria = ".$parametros[$indice+2]." " ;
	}
	$listar = $produto->listar();
?>
<div class="interna produtos">
	<?php include(PATH_ABSOLUTO."paginas/menu.produto.php"); ?>
	<div id="conteudoProduto">
	    <div class="titulo">
	    	<p>
	        	<?php
	    		if ($paginaProduto == "subcategoria") {
	    			echo ($subcategoria[0]["nome_".$_SESSION["idioma"]."_subcategoria"] != "" ? $subcategoria[0]["nome_".$_SESSION["idioma"]."_subcategoria"] : ($categoria[0]["nome_".$_SESSION["idioma"]] != "" ? $categoria[0]["nome_".$_SESSION["idioma"]] : $_LANGUAGE[$_SESSION["idioma"]]["pagina_produtos"]["titulo_todos"]));
	        	} else {
		        	echo ($categoria[0]["nome_".$_SESSION["idioma"]] != "" ? $categoria[0]["nome_".$_SESSION["idioma"]] : $_LANGUAGE[$_SESSION["idioma"]]["pagina_produtos"]["titulo_todos"]);
	        	}
	    		?>
	    	</p>
	        <hr />
	    </div>
	    <div class="grid">
	    	<?php
	    	if (count($listar) > 0) {
	        	foreach ($listar as $valor) {
		        	$listarIMG = $produto->imagem($valor["id"]);
	            	?>
	            	<div class="produto margem">
		            	<div class="img">
							<?php
								if (count($listarIMG) > 0) {
									foreach ($listarIMG as $indice => $valImgNot) {
										if ($indice > 0) {
											?><a class="fancybox" rel="group_<?=$valor["id"]?>" href="<?=URL_SITE?>images/_produto/<? if (file_exists($listarIMG[0]["id_produto"]."/gg/".$valImgNot["id"].$valImgNot["imagem"])) { echo $listarIMG[0]["id_produto"]."/gg/".$valImgNot["id"].strtoupper($valImgNot["imagem"]); } else { echo $listarIMG[0]["id_produto"]."/gg/".$valImgNot["id"].strtolower($valImgNot["imagem"]); }?>"></a><?php
										}
									}
							?>
									<a class="fancybox" rel="group_<?=$valor["id"]?>" href="<?=URL_SITE?>images/_produto/<? if (file_exists($listarIMG[0]["id_produto"]."/gg/".$listarIMG[0]["id"].$valor["imagem"])) { echo $listarIMG[0]["id_produto"]."/gg/".$listar[0]["id"].strtoupper($listarIMG[0]["imagem"]); } else { echo $listarIMG[0]["id_produto"]."/gg/".$listarIMG[0]["id"].strtolower($listarIMG[0]["imagem"]); }?>"><img src="<?=URL_SITE?>images/_produto/<? if (file_exists($listarIMG[0]["id_produto"]."/p/".$listarIMG[0]["id"].$valor["imagem"])) { echo $listarIMG[0]["id_produto"]."/p/".$listarIMG[0]["id"].strtoupper($listarIMG[0]["imagem"]); } else { echo $listarIMG[0]["id_produto"]."/p/".$listarIMG[0]["id"].strtolower($listarIMG[0]["imagem"]); }?>" alt="" /></a>
							<?php } else { ?>
		                    		<img src="<?=URL_SITE?>images/sem_imagem.png" height="114" />
		                    <?php } ?>
		                    
						</div>
		                <hr />
		                <p class="cod">código: <?=$valor["codigo"]?></p>
		                <p class="nome"><?=utf8_encode($valor["titulo"])?></p>
		            </div>
	            	<?php
	        	}
	        	$paginacao->quantidadePaginas = $produto->quantidadePaginas();
				$paginacao->paginaAtual = $pagina; 
				if ($paginaProduto == "categoria" || $paginaProduto == "subcategoria") {
					$paginacao->pagina = "produtos/".$paginaProduto."/".$parametros[$indice+2];
				} else {
					$paginacao->pagina = "produtos";
				}
				
				echo ($produto->quantidadePaginas() > 1) ? "<br clear='all' /><br />".$paginacao->montarLinks() : "";
	
	    	} else {
	        	echo "Nenhum produto encontrado.";
	    	}
	    	?>
	        <br style="clear:both" />
	    </div>
	</div>
    <br style="clear:both" />
</div>