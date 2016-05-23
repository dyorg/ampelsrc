<?php
	define('TITULO_PAGINA',	'Produtos');
	
	require_once("../../xajax/xajax_core/xajax.inc.php");
	$xajax = new xajax();
	$xajax -> configure('debug', false);
	
	$xajax -> registerFunction("ajaxValida");
	function ajaxValida($array) {
		$objResponse = new xajaxResponse();
		ob_start();
		   include("valida.ajax.php");
			$res = ob_get_contents();
		ob_end_clean();

		if (!$erro) {
			$objResponse -> script("window.opener.mensagemGrow('".utf8_encode(TITULO_PAGINA)."', 'Registro gravado com sucesso!', 'ok');window.opener.$('#dataGrid').flexReload();window.close();");
		} else {
			$objResponse -> script("mensagemGrow('".utf8_encode(TITULO_PAGINA)."', '".utf8_encode($res)."', 'alerta');");
		}

		return $objResponse;
	}
	
	$xajax -> registerFunction("ajaxSelectCategoria2");
	function ajaxSelectCategoria2($array) {
		$objResponse = new xajaxResponse();
		ob_start();
			include("subcategoria.ajax.php");
			$res = ob_get_contents();
		ob_end_clean();
		$objResponse -> assign("divSubcategoria", "innerHTML", $res);
		return $objResponse;
	}
	
	$xajax->processRequest();

	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.popup.admin.inc.php");

	include_once("class.php");

	$class = new classe;
	$listaCategoria = $class->listarCategorias();
	//print_r($listaCategoria);
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<script language="javascript" type="text/javascript" src="../plugin/tinymce/js/tinymce/tinymce.min.js"></script>
<script language="javascript" type="text/javascript" src="../plugin/tinymce/init.js"></script>
<form id="form01" name="form01" method="post" onsubmit="tinyMCE.triggerSave();xajax_ajaxValida(xajax.getFormValues('form01')); return false;">
<?php
	$class->id = $_REQUEST["id"];
	$class = $class->formulario();
?>	
	<h1>Dados Gerais</h1>
	<p>
      	Categoria:
	  	<!--<select id="id_categoria" name="dados[id_categoria]"  style="width: 98%;" onchange="xajax_ajaxSelectCategoria2(xajax.getFormValues('form01')); return false;"  >!-->
	  	<select id="id_categoria" name="dados[id_categoria]"  style="width: 98%;" onchange="xajax_ajaxSelectCategoria2(xajax.getFormValues('form01')); return false;"  >
			<option value="">Selecione uma opção abaixo</option>
			<?php foreach ($listaCategoria as $valor) { ?>
					<option <? if ($class["id_categoria"] == $valor["id"]) echo "selected=\"selected\""; ?> value="<?=($valor["id"])?>"><?=utf8_encode($valor["nome_portugues"])?></option>
			<?php } ?>
		</select>		
	</p>
	<p>
		<label>Sub-Categoria:</label>
		<div id="divSubcategoria"><select id="id_subcategoria" name="dados[id_subcategoria]" style="width: 98%;"><option value="">Sem dados</option></select></div>
	</p>
	<p>
      	Código: 
	  	<input id="codigo" type="text" maxlength="40" name="dados[codigo]" value="<?=($class["codigo"])?>" style="width: 100%;" />
	</p>
	<p>
      	Título: 
	  	<input id="titulo" type="text" maxlength="100" name="dados[titulo]" value="<?=($class["titulo"])?>" style="width: 100%;" />
	</p>
	<!--
	<br clear="all" />
	<h1>Descrição:</h1>
	<textarea id="descricao" name="dados[descricao]" style="width: 100%; height: 240px;"><?=($class["descricao"])?></textarea>
	!-->
	<br clear="all" />
	<a href="#" onclick="tinyMCE.triggerSave();xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>

<?php if ($_REQUEST["id"]) { ?>
<form name="alterar" id="alterar" style="display: none">
	<input type="hidden" name="dados[id_categoria]" value="<?=$class["id_categoria"]?>" />
	<input type="hidden" name="dados[id_subcategoria]" value="<?=$class["id_subcategoria"]?>" />
</form>
<script language="javascript">
	xajax_ajaxSelectCategoria2(xajax.getFormValues('alterar'));
</script>
<?php } else { ?>
<script language="javascript">
	xajax_ajaxSelectCategoria2(xajax.getFormValues('form01'));
</script>
<?php } ?>


<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>