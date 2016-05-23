<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Administração: Ampel Parts</title>
<script language="javascript" src="../script/padrao.js"></script>
	<link href="../css/menu.css" rel="stylesheet" type="text/css">
	<link href="../css/padraoAdmin.css" rel="stylesheet" type="text/css"> 
	<link href="../css/botoes.css" rel="stylesheet" type="text/css">
	
	<script language="javascript" src="../script/menu0.js"></script>
	<!-- Add-On Core Code (Remove when not using any add-on's) -->
	<style type="text/css">.qmfv{visibility:visible !important;}.qmfh{visibility:hidden !important;}</style><script type="text/JavaScript">var qmad = new Object();qmad.bvis="";qmad.bhide="";</script>
	<script language="javascript" src="../script/menu.js"></script>
	<link media="screen" rel="stylesheet" href="../css/colorbox.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<!-- JQUERY UI -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<link type="text/css" href="../css/jquery.ui.css" rel="stylesheet" />	
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
	<!--  GRID -->
	<link rel="stylesheet" type="text/css" href="../css/flexigrid.css">
	<script type="text/javascript" src="../js/flexigrid.js"></script>
	<!-- CALENDARIO !-->
	<link rel="stylesheet" type="text/css" href="../css/jsdatepick.css">
	<script type="text/javascript" src="../script/jsdatepick.js"></script>
	
</head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" bgcolor="#F2F2F2" onClick="document.body.className='none'">

<p id="titulo_sistema"><img src="../../images/gesis.png" /></p>
<table width="100%" border="0" cellpadding="10" cellspacing="10">
	<tr bgcolor="#FFFFFF"><td>    
<?php if ($_SESSION["session_id"] == md5(CHAVE_SESSION) ) { ?>
<ul id="qm0" class="qmmc">
	<li><a class="qmparent" href="javascript:void(0)">SISTEMA</a>
		<ul>
			<li><span class="qmtitle" >Segurança</span></li>
			<li><span class="qmdivider qmdividerx" ></span></li>        
			<li><a href="../seguranca/seguranca.list.php">Usuários</a></li>
			<li><span class="qmdivider qmdividerx" ></span></li>
			<li><a href="../seguranca/seguranca.deslogar.php">Sair</a></li>
		</ul>
	</li>
	<li><span class="qmdivider qmdividery" ></span></li>
	<li><a class="qmparent" href="../configuracao/index.php">BANNERS</a></li>	
	<li><span class="qmdivider qmdividery" ></span></li>
	<li><a class="qmparent" href="../conteudo/index.php">CONTEÚDO</a></li>
	<li><span class="qmdivider qmdividery" ></span></li>
	<li><a class="qmparent" href="../newsletter/index.php">NEWSLETTER</a>
	<li><span class="qmdivider qmdividery" ></span></li>
	<li><a class="qmparent" href="javascript:void(0)">PRODUTOS</a>
		<ul>
			<li><a href="../produtos_categoria/index.php">Categoria</a></li>
			<li><a href="../produtos/index.php">Produtos</a></li>
			<li><span class="qmtitle" >IMPORTAÇÃO</span></li>
			<li><span class="qmdivider qmdividerx" ></span></li>  
			<li><a href="../produtos_importados/index.php">Produtos</a></li>
			<li><a href="../importacao/importacao.form.php">Importar Arquivo</a></li>
		</ul>
	</li>
	<li><span class="qmdivider qmdividery" ></span></li>

	<li><a href="../seguranca/seguranca.deslogar.php">SAIR</a></li>

<li class="qmclear">&nbsp;</li></ul>
<?php } ?>
<script type="text/javascript">qm_create(0,false,0,250,false,false,false,false,false);</script>
</td></tr>
  <tr>
    <td height="20" class="descricao">Administração</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFFF" class="conteudo borda">
	<h1><?=$tituloPagina?></h1>
