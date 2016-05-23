<?
	require_once("../../xajax/xajax_core/xajax.inc.php");
	$xajax = new xajax();
	
	// $xajax -> configure('debug', true); 
	$xajax -> registerFunction("validarLogin");
	function validarLogin($array) {
		$objResponse = new xajaxResponse();

		include_once("../includes/top.admin.func.php");
		if ( ($array["seguranca_login"] != "" &&  $array["seguranca_senha"] == "") || ($array["seguranca_login"] == "" &&  $array["seguranca_senha"] != "") ) {
			$objResponse -> script("mensagemGrow('Acesso', 'Preencha corretamente os campos!', 'alerta');");
		} 
		
		if ( ($array["seguranca_login"] != "") and ($array["seguranca_senha"] != "") ) {
			$sql = "SELECT
					*
				FROM
					usuario
				WHERE
					usuario_login = '".$array["seguranca_login"]."' AND 
					usuario_senha = '".md5($array["seguranca_senha"])."' AND
					usuario_ativo = 1";
			
			$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
			
			if ($dadosRetorno[0]['usuario_login'] != "") {		
				/* Define o limitador de cache para 'private' */ 
				session_cache_limiter('private');  
				/* Define o limite de tempo do cache em 4 horas */ 
				session_cache_expire(240);	
				$_SESSION["session_id"] = md5(CHAVE_SESSION);
				$_SESSION["SegurancaId"] = $dadosRetorno[0]['usuario_id'];	  
				$_SESSION["SegurancaLogin"] = $dadosRetorno[0]['usuario_login'];	  
				$_SESSION["SegurancaNome"] = $dadosRetorno[0]['usuario_nome'];		
				$_SESSION["SegurancaPermissao"] = $dadosRetorno[0]['usuario_permissao'];		
				$objResponse -> script("mensagemGrow('Acesso', '".utf8_encode("Login efeutado com sucesso!<br>Aguarde estamos redirecionando para página inicial.")."', 'ok');setTimeout(\"location.href='../index.html'\",2000);");
			} else {
				$objResponse -> script("mensagemGrow('Acesso', '".utf8_encode("Login ou senha inválidos!")."', 'alerta');");
			}	
		}

		return $objResponse;
	}
	$xajax->processRequest();
	
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");
	
	$xajax -> printJavascript("../../xajax/");	
	
?>	
<br /><br />
<center>
<table align="center" width="550px" id="formLogin">
<tr><td>
  <form id="form01" name="form01" method="post" onsubmit="xajax_validarLogin(xajax.getFormValues('form01')); return false; ">
      <h1>Acesso Restrito</h1>
      <fieldset>      
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="31%" align="center"><em><img src="../images/security_keyandlock.png" width="128" height="128" /></em></td>
              <td width="69%"><table class="formulario">
                <tr>
                  <th>&nbsp;</th>
                  <td>Login:</td>
                  <td><input id="seguranca_login" type="text" name="seguranca_login" value="<?=$_REQUEST["seguranca_login"]?>" style="width: 300px;" onkeydown="javascript:EnterTab('seguranca_senha',event)" /></td>
                </tr>
                <tr>
                  <th></th>
                  <td>Senha:</td>
                  <td><input name="seguranca_senha" type="password" id="seguranca_senha" style="width: 300px;" value=""  /></td>
                </tr>
                <tr>
                  <td colspan="3">
                  	<input type="submit" value="Validar" />
                    </th>
                  </td>
                </tr>
              </table></td>
            </tr>
          </table>
      </fieldset>
  </form>
</td></tr></table>
<br /><br />
</center>
<?php
include("../includes/rod.admin.inc.php");
include("../includes/rod.admin.func.php");
?>