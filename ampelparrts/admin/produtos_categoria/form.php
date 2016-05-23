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
	mysql_query("SET CHARACTER SET 'utf8';", $conexao)or die(mysql_error());
	include_once("class.php");
	
	$class = new classe;
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<script language="javascript" type="text/javascript" src="../plugin/tinymce/js/tinymce/tinymce.min.js"></script>
<script language="javascript" type="text/javascript" src="../plugin/tinymce/init.js"></script>
<form id="form01" name="form01" method="post" onsubmit="tinyMCE.triggerSave();xajax_ajaxValida(xajax.getFormValues('form01')); return ">
<?php
	$class->id = $_REQUEST["id"];
	$class = $class->formulario("categoria");
?>
	<h1>Dados Gerais</h1>
	<script type="text/javascript">$(function() { $("#tabsConfiguracao").tabs(); });	</script>
	<div id="tabsConfiguracao" style="width: 100%;">
        <ul>
            <li><a href="#tabs-1">Português</a></li>
            <li><a href="#tabs-2">Árabe</a></li>
            <li><a href="#tabs-3">Francês</a></li>
            <li><a href="#tabs-4">Espanhol</a></li>
            <li><a href="#tabs-5">Inglês</a></li>
            <li><a href="#tabs-6">Russo</a></li>
        </ul>
        <div id="tabs-1">
			<p>
		      	Nome Categoria:
		      	<input id="nome_portugues" type="text" name="dados[nome_portugues]" value="<?=($class["nome_portugues"])?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-2">
			<p>
		      	Nome Categoria:
		      	<input id="nome_arabe" type="text" name="dados[nome_arabe]" value="<?=($class["nome_arabe"])?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-3">
			<p>
		      	Nome Categoria:
		      	<input id="nome_frances" type="text" name="dados[nome_frances]" value="<?=htmlentities(utf8_decode($class["nome_frances"]))?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-4">
			<p>
		      	Nome Categoria:
		      	<input id="nome_espanhol" type="text" name="dados[nome_espanhol]" value="<?=htmlentities(utf8_decode($class["nome_espanhol"]))?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-5">
			<p>
		      	Nome Categoria:
		      	<input id="nome_ingles" type="text" name="dados[nome_ingles]" value="<?=htmlentities(utf8_decode($class["nome_ingles"]))?>" style="width: 100%;" /> 
			</p>
		</div>

		<div id="tabs-6">
			<p>
		      	Nome Categoria:
		      	<input id="nome_russo" type="text" name="dados[nome_russo]" value="<?=htmlentities(utf8_decode($class["nome_russo"]))?>" style="width: 100%;" /> 
			</p>
		</div>

	</div>
	<p>
      	Ordem: 
	  	<input id="ordem" type="text" name="dados[ordem]" value="<?=htmlentities(utf8_decode($class["ordem"]))?>" style="width: 100%;" />
	</p>
	<p>
		<label>Status: </label>
		<br clear="all" />
		<label>
			<input type="radio" name="dados[status]" id="ativo_sim" value="1" <? if ($class["status"] == "1" || $class["status"] == "") echo "checked=\"checked\"";?> />
			Sim
		</label>
		<label>
			<input type="radio" name="dados[status]" id="ativo_nao" value="0" <? if ($class["status"] == "0") echo "checked=\"checked\"";?> />
			N&atilde;o
		</label> 
	</p>
	<br clear="all" />
	<a href="#" onclick="tinyMCE.triggerSave();xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>