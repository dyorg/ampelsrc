<?php
	include_once("../includes/top.admin.func.php");
	include_once("class.php");
	
	$class = new classe;
	$dadosSubcategoria = $class->listarSubcategorias($array["dados"]["id_categoria"]);
?>
<select id="id_subcategoria" name="dados[id_subcategoria]" style="width: 98%;">
<option value="">Selecione um item</option>
<?php
	foreach($dadosSubcategoria as $valor)
	{
		if ($array["dados"]["id_subcategoria"] == $valor["id_subcategoria"])
			$selected = "selected=\"selected\"";
		else
			$selected = "";
	?>
	<option <?=$selected?> value="<?=htmlentities($valor["id_subcategoria"])?>"><?=htmlentities(utf8_decode($valor["nome_subcategoria"]))?></option>
	<?php
	}
	?>
</select>