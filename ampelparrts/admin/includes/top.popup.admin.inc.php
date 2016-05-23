<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">!-->
<meta charset="utf-8">

<title>Administração: Instituição</title>
		<!-- JQUERY UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<link type="text/css" href="../css/jquery.ui.css" rel="stylesheet" />
	
	<script language="javascript" src="../script/padrao.js"></script>
	<link href="../css/botoes.css" rel="stylesheet" type="text/css">
	<link href="../css/padraoAdmin.css" rel="stylesheet" type="text/css">
	<link href="../css/padraoFormulario.css" rel="stylesheet" type="text/css">
	<link href="../css/padraoListagem.css" rel="stylesheet" type="text/css">
	<link href="../css/dhtmlgoodies_calendar.css?random=20051112" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="../script/dhtmlgoodies_calendar.js?random=20060118"></script>
	
	<link rel="stylesheet" type="text/css" media="all" href="../css/jsDatePick_ltr.min.css" />
	<script type="text/javascript" src="../script/jsDatePick.min.1.2.js"></script>
	<!-- GROW -->
	<link rel="stylesheet" href="../css/jquery.jgrowl.css" type="text/css" />
	<script type="text/javascript" src="../js/jquery.jgrowl.js"></script>
	<script type="text/javascript">
		function mensagemGrow(titulo, mensagem, tipo) {
			if (tipo=='ok') {
				msg = titulo+'<table border="0" width="100%" style="color:#fff;text-shadow:0 0px 0px #333;"><tr><td valign="middle"><img src="../../images/icones/grow_ok.png" /></td><td>'+mensagem+'</td></tr></table>';
			} else if (tipo=='alerta') {
				if (mensagem == '') 
					mensagem = 'Ocorreu algum problema na alteração do registro, tente novamente.';
				msg = titulo+'<table border="0" width="100%" style="color:#fff;text-shadow:0 0px 0px #333;"><tr><td valign="middle"><img src="../../images/icones/grow_alerta.png" /></td><td>'+mensagem+'</td></tr></table>';
			}
			$.jGrowl(msg);
		}
		//<![CDATA[
		$.jGrowl.defaults.pool = 5;
		//]]>
		</script>
	</script>
	
	<!-- PADRAO NOVAS TELAS -->
	<link href="../css/novoPadraoTelas.css" rel="stylesheet" type="text/css">
	
	<!-- CALENDARIO !-->
	<link rel="stylesheet" type="text/css" href="../css/jsdatepick.css">
	<script type="text/javascript" src="../script/jsdatepick.js"></script>

	<!-- PULOAD !-->
	<style type="text/css">@import url(../js/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>
	<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
	<script type="text/javascript" src="../js/plupload.full.js"></script>
	<script type="text/javascript" src="../js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
	<script type="text/javascript" src="../js/i18n/pt-br.js"></script>


</head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" bgcolor="#F2F2F2" onClick="document.body.className='none'">
<table width="100%" height="100%" cellspacing="2">
  <tr>
    <td valign="top" bgcolor="#FFFFFF" class="conteudo borda">
<?php
	if (TITULO_PAGINA)
		echo "<h1>".TITULO_PAGINA."</h1>";
?>