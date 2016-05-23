<?php
	define('TITULO_PAGINA',	'Conteudos');
	
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
	mysql_query("SET CHARACTER SET 'utf8';", $conexao)or die(mysql_error());
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
	<script type="text/javascript">$(function() { $("#tabsConfiguracao").tabs(); });	</script>
	<div id="tabsConfiguracao" style="width: 100%;">
        <ul>
            <li><a href="#tabs-1">Português</a></li>
            <li><a href="#tabs-2">Árabe</a></li>
            <li><a href="#tabs-3">Francês</a></li>
            <li><a href="#tabs-4">Espanhol</a></li>
            <li><a href="#tabs-5">Inglês</a></li>
        </ul>
        <div id="tabs-1">
			<p>
		      	Título: 
			  	<input id="titulo_portugues" type="text" name="dados[titulo_portugues]" value="<?=($class["titulo_portugues"])?>" style="width: 100%;" />
			</p>
			<br clear="all" />
			<h1>Descrição</h1>
			<textarea id="descricao_portugues" name="dados[descricao_portugues]" style="width: 100%; height: 240px;"><?=htmlentities($class["descricao_portugues"])?></textarea>
		</div>
		<div id="tabs-2">
			<p>
		      	Título: 
			  	<input id="titulo_arabe" type="text" name="dados[titulo_arabe]" value="<?=($class["titulo_arabe"])?>" style="width: 100%;" />
			</p>
			<br clear="all" />
			<h1>Descrição</h1>
			<textarea id="descricao_arabe" name="dados[descricao_arabe]" style="width: 100%; height: 240px;"><?=($class["descricao_arabe"])?></textarea>
		</div>
		<div id="tabs-3">
			<p>
		      	Título: 
			  	<input id="titulo_frances" type="text" name="dados[titulo_frances]" value="<?=htmlentities($class["titulo_frances"])?>" style="width: 100%;" />
			</p>
			<br clear="all" />
			<h1>Descrição</h1>
			<textarea id="descricao_frances" name="dados[descricao_frances]" style="width: 100%; height: 240px;"><?=htmlentities($class["descricao_frances"])?></textarea>
		</div>
		<div id="tabs-4">
			<p>
		      	Título: 
			  	<input id="titulo_espanhol" type="text" name="dados[titulo_espanhol]" value="<?=htmlentities($class["titulo_espanhol"])?>" style="width: 100%;" />
			</p>
			<br clear="all" />
			<h1>Descrição</h1>
			<textarea id="descricao_espanhol" name="dados[descricao_espanhol]" style="width: 100%; height: 240px;"><?=htmlentities($class["descricao_espanhol"])?></textarea>
		</div>
		<div id="tabs-5">
			<p>
		      	Título: 
			  	<input id="titulo_ingles" type="text" name="dados[titulo_ingles]" value="<?=htmlentities($class["titulo_ingles"])?>" style="width: 100%;" />
			</p>
			<br clear="all" />
			<h1>Descrição</h1>
			<textarea id="descricao_ingles" name="dados[descricao_ingles]" style="width: 100%; height: 240px;"><?=htmlentities($class["descricao_ingles"])?></textarea>
		</div>
	<br clear="all" />
	<a href="#" onclick="tinyMCE.triggerSave();xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>