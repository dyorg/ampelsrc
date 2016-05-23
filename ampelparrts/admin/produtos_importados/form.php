<?php
	define('TITULO_PAGINA',	'Importação Produtos');
	
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
	
	
	$xajax->processRequest();

	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.popup.admin.inc.php");

	include_once("class.php");

	$class = new classe;
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
      	Título: 
	  	<input id="titulo" type="text" maxlength="255" name="dados[titulo]" value="<?=($class["titulo"])?>" style="width: 100%;" />
	</p>
	<p>
      	Marca: 
	  	<input id="marca" type="text" maxlength="255" name="dados[marca]" value="<?=($class["marca"])?>" style="width: 100%;" />
	</p>
	<p>
      	Descrição: 
	  	<input id="descricao" type="text" maxlength="255" name="dados[descricao]" value="<?=($class["descricao"])?>" style="width: 100%;" />
	</p>
	<p>
      	Código Visivel: 
	  	<input id="codigo" type="text" maxlength="255" name="dados[codigo]" value="<?=($class["codigo"])?>" style="width: 100%;" />
	</p>
	<p>
      	Códigos Invisiveis (usados para a busca): 
	  	<input id="codigo_invisivel" type="text" name="dados[codigo_invisivel]" value="<?=($class["codigo_invisivel"])?>" style="width: 100%;" />
	</p>
	<br clear="all" />
	<a href="#" onclick="tinyMCE.triggerSave();xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>


<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>