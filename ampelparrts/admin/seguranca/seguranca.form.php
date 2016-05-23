<?php
	require_once("../../xajax/xajax_core/xajax.inc.php");

	$xajax = new xajax();

	// $xajax -> configure('debug', true);
	$xajax -> registerFunction("ajaxValidaSeguranca");

	function ajaxValidaSeguranca($array) {
		$objResponse = new xajaxResponse();
		ob_start();
		   include("seguranca.valida.ajax.php");
			$res = ob_get_contents();
		ob_end_clean();
		
		if (!$erro) {
			$objResponse -> script("window.opener.mensagemGrow('".utf8_encode("Usuários")."', 'Registro gravado com sucesso!', 'ok');window.opener.$('#dataGrid').flexReload();window.close();");
		} else {
			$msg = ($mensagemDeErro == "") ? "" : utf8_encode($mensagemDeErro);
			$objResponse -> script("window.opener.mensagemGrow('".utf8_encode("Usuários")."', '".$msg."', 'alerta');");
		}

		return $objResponse;
	}

	$xajax->processRequest();

	$tituloPagina = "Formulário: Usuários";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.popup.admin.inc.php");

	include_once("seguranca.class.php");

	$seguranca = new seguranca;
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<div id="seguranca"></div>
<form id="form01" name="form01" method="post">
<?php
	$seguranca->seguranca_id = $_REQUEST["id"];
	$seguranca = $seguranca->formulario("seguranca");
?>
	<h1>Dados Gerais</h1>
  	<p>
  		<label>Nome:</label>
  		<input id="nome" type="text" name="seguranca[usuario_nome]" value="<?=htmlentities($seguranca["usuario_nome"])?>" />
  	</p>
  	<p>
  		<label>E-mail:</label>
  		<input id="email" type="text" name="seguranca[usuario_email]" value="<?=htmlentities($seguranca["usuario_email"])?>" />
  	</p>
  	<p>
  		<label>Login:</label>
  		<input id="login" type="text" name="seguranca[usuario_login]" value="<?=htmlentities($seguranca["usuario_login"])?>" />
  	</p>
  	<p>
  		<label>Senha:</label>
  		<input id="senha" type="password" name="seguranca[usuario_senha]" value="<?=htmlentities($seguranca["usuario_senha"])?>" />
  	</p>  	
  	<p>
		<label>Ativo: </label>
		<br clear="all" />
		<label>
			<input type="radio" name="seguranca[usuario_ativo]" id="ativo_sim" value="1" <? if ($seguranca["usuario_ativo"] == "1") echo "checked=\"checked\"";?> />
			Sim
		</label>
		<label>
			<input type="radio" name="seguranca[usuario_ativo]" id="ativo_nao" value="0" <? if ($seguranca["usuario_ativo"] == "0") echo "checked=\"checked\"";?> />
			N&atilde;o
		</label> 
	</p>
	<br clear="all" />
	<a href="#" onclick="xajax_ajaxValidaSeguranca(xajax.getFormValues('form01'));" class="button"><span class="btn_save">Salvar</span></a>
</form>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>