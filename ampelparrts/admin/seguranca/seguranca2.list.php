<?php
	require_once("../../xajax/xajax_core/xajax.inc.php");
	$xajax = new xajax();
	// $xajax -> configure('debug', true);
	$xajax -> registerFunction("ajaxExcluirSeguranca");
	function ajaxExcluirSeguranca($excluir) {
		$objResponse = new xajaxResponse();
		ob_start();
		   include("permissao.valida.ajax.php");
		ob_end_clean();
		$objResponse -> script("location.reload();");

		return $objResponse;
	}

	$xajax->processRequest();

	# TAMANHO DAS JANELAS
	$janela_widht = 400;
	$janela_height = 300;
	$tituloPagina = "Segurança - Usuarios";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");

	$db = new EyeMySQLAdap(SERVIDOR, USUARIO, SENHA, BANCODEDADOS);
	$x = new EyeDataGrid($db, '../images/');
	$x->setQuery("usuario_id, usuario_nome, usuario_login,usuario_email, usuario_ativo", "usuario", 'usuario_id');
	$x->allowFilters(true);
	$x->setColumnHeader('usuario_id', 'ID', ' width="10%" ', false);
	$x->setColumnHeader('usuario_nome', 'Nome', ' width="20%" ');
	$x->setColumnHeader('usuario_login', 'Login', ' width="24%" ');	
	$x->setColumnHeader('usuario_email', 'E-Mail', ' width="34%" ');
	$x->setColumnHeader('usuario_ativo', 'Ativo', ' width="7%" ');		
	
	$x->setColumnType('usuario_ativo', EyeDataGrid::TYPE_ARRAY, array('0' => 'Não', '1' => 'Sim'));
	$x->setColumnType('usuario_id', EyeDataGrid::TYPE_ONCLICK, ' javascript: popup(\'seguranca.form.php?id=%_P%\', \'usuario\', '.$janela_widht.', '.$janela_height.');');
	$x->setColumnType('nome', EyeDataGrid::TYPE_ONCLICK, ' javascript: popup(\'seguranca.form.php?id=%_P%\', \'usuario\', '.$janela_widht.', '.$janela_height.');');
	
	$x->showReset();
	$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, " javascript: popup('seguranca.form.php?id=%_P%', 'permissao', ".$janela_widht.", ".$janela_height.");");
	$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "if (confirm('Tem certeza que deseja excluir o registro: %nome%?')) { xajax_ajaxExcluirSeguranca('%_P%'); return false; }");	
	$x->showCreateButton("javascript: popup('seguranca.form.php', 'seguranca', ".$janela_widht.", ".$janela_height.");", EyeDataGrid::TYPE_ONCLICK, 'Novo Cadastro');
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<?php
$x->printTable();
?>
<?php
include("../includes/rod.admin.inc.php");
include("../includes/rod.admin.func.php");
?>