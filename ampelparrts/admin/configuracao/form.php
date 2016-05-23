<?php
	define('TITULO_PAGINA',	'Produtos Categoria');
	
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
			$objResponse -> script("mensagemGrow('".utf8_encode(TITULO_PAGINA)."', '".$res."', 'alerta');");
		}

		return $objResponse;
	}
	$xajax->processRequest();

	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.popup.admin.inc.php");

	include_once("class.php");

	$class = new classe;
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<form id="form01" name="form01" method="post" onsubmit="xajax_ajaxValida(xajax.getFormValues('form01')); return false;">
<?php
	$class->id = $_REQUEST["id"];
	$class = $class->formulario();
?>
	<h1>Dados Gerais</h1>
	<p>
      	Nome Categoria: 
	  	<input id="nome" type="text" name="dados[nome]" value="<?=htmlentities($class["nome"])?>" style="width: 100%;" />
	</p>
	
	<br clear="all" />
	<a href="#" onclick="xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>