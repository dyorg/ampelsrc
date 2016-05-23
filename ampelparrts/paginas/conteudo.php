<?php
	$conteudo->id = $id;
	$info = $conteudo->dados();
	#PEGAR O CLASS CORRETO
	$class = "quem_somos";
	if ($id == 2) $class = "servicos";
?>
<div class="interna <?=$class?>">
	<div class="titulo">
    	<p><?=($info[0]["titulo_".$_SESSION["idioma"]])?></p>
        <hr />
    </div>
    <?=($info[0]["descricao_".$_SESSION["idioma"]])?>
</div>
