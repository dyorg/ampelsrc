<?php
	define('TITULO_PAGINA',	'Vídeos');
	
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
      	Título: 
	  	<input id="nome" type="text" name="dados[nome]" value="<?=htmlentities(utf8_decode($class["nome"]))?>" style="width: 100%;" />
	</p>
	<p>
      	URL Video (youtube): 
	  	<input id="url" type="text" name="dados[url]" value="<?=htmlentities(utf8_decode($class["url"]))?>" style="width: 100%;" />
	</p>
	<p>
      	Descrição: 
      	<textarea id="descricao" name="dados[descricao]" style="width: 100%; height: 80px;"><?=htmlentities(utf8_decode($class["descricao"]))?></textarea>
	</p>
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
	<a href="#" onclick="xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>