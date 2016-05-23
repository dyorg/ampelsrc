<div class="index">
    <div class="nosso_negocio">
    	<?php
			$conteudo->id = "9";
			$info = $conteudo->dados();
			//echo utf8_encode($info[0]["descricao_".$_SESSION["idioma"]]);
			echo ($info[0]["descricao_".$_SESSION["idioma"]]);
		?>
    </div>
    <br style="clear:both" /><br style="clear:both" /><br style="clear:both" />
    <?php
		$conteudo->id = "7";
		$info = $conteudo->dados();
		//echo utf8_encode($info[0]["descricao_".$_SESSION["idioma"]]);
		echo ($info[0]["descricao_".$_SESSION["idioma"]]);
	?>
</div>