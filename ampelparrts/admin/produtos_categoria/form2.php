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
	$dadosCategoria = $class->listarCategoria();
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<form id="form01" name="form01" method="post" onsubmit="xajax_ajaxValida(xajax.getFormValues('form01')); return false;">
<?php
	$class->id = $_REQUEST["id_subcategoria"];
	$class = $class->formulario("subcategoria");
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
		      	Nome Sub-Categoria:
		      	<input id="nome_portugues_subcategoria" type="text" name="dados[nome_portugues_subcategoria]" value="<?=($class["nome_portugues_subcategoria"])?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-2">
			<p>
		      	Nome Sub-Categoria:
		      	<input id="nome_arabe_subcategoria" type="text" name="dados[nome_arabe_subcategoria]" value="<?=($class["nome_arabe_subcategoria"])?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-3">
			<p>
		      	Nome Sub-Categoria:
		      	<input id="nome_frances_subcategoria" type="text" name="dados[nome_frances_subcategoria]" value="<?=htmlentities(utf8_decode($class["nome_frances_subcategoria"]))?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-4">
			<p>
		      	Nome Sub-Categoria:
		      	<input id="nome_espanhol_subcategoria" type="text" name="dados[nome_espanhol_subcategoria]" value="<?=htmlentities(utf8_decode($class["nome_espanhol_subcategoria"]))?>" style="width: 100%;" /> 
			</p>
		</div>
		<div id="tabs-5">
			<p>
		      	Nome Sub-Categoria:
		      	<input id="nome_ingles_subcategoria" type="text" name="dados[nome_ingles_subcategoria]" value="<?=htmlentities(utf8_decode($class["nome_ingles_subcategoria"]))?>" style="width: 100%;" /> 
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
      	Categoria: 
		<select id="id_categoria" name="dados[id_categoria]" style="width:100%;">
			<?php foreach($dadosCategoria as $valor) {	?>
			<option <?=($valor["id"]==$class["id_categoria"])?'selected="selected"':'';?> value="<?=$valor["id"]?>"><?=($valor["nome_portugues"])?></option>
			<?php }	?>
	    </select>	
	</p>
	<p>
      	Ordem: 
	  	<input id="ordem_subcategoria" type="text" name="dados[ordem_subcategoria]" value="<?=htmlentities(utf8_decode($class["ordem_subcategoria"]))?>" style="width: 100%;" />
	</p>
	<p>
		<label>Status: </label>
		<br clear="all" />
		<label>
			<input type="radio" name="dados[status_subcategoria]" id="ativo_sim" value="1" <? if ($class["status_subcategoria"] == "1" || $class["status_subcategoria"] == "") echo "checked=\"checked\"";?> />
			Sim
		</label>
		<label>
			<input type="radio" name="dados[status_subcategoria]" id="ativo_nao" value="0" <? if ($class["status_subcategoria"] == "0") echo "checked=\"checked\"";?> />
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