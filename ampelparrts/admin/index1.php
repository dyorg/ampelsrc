<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>**PAINEL ADMINISTRATIVO**</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="links_css.css" rel="stylesheet" type="text/css">
<SCRIPT language="JavaScript"> 

function abresite(URL) 
{ 
window.open(URL,'meio','top=0,left=0, width=800 , height=600 ,status = yes, menubar = no, scrollbars = yes, location = no, resizable=yes');

} 
</script>
<? include "conecta.php"; ?>
</head>

<body>
<table width="100%" height="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC">
  <tr bgcolor="#FFFFFF"> 
    <td height="1" colspan="2"><img src="banerpainel.jpg" width="436" height="62"></td>
  </tr>
  <tr> 
    <td width="17%" valign="top" bgcolor="#f2f2f2"> 
      <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
        <tr> 
          <td height="30" bgcolor="#FFFFFF"> <div align="center"> </div>
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Empresa(Portugu&ecirc;s)</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=empresa&lingua=portugues');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Empresa(Espanhol)</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=empresa&lingua=espanhol');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Empresa(Ingl&ecirc;s)</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=empresa&lingua=ingles');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Servi&ccedil;os</strong></font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>(Portugu&ecirc;s)</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=servicos&lingua=portugues');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Servi&ccedil;os</strong></font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>(Espanhol)</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=servicos&lingua=espanhol');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Servi&ccedil;os</strong></font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>(Ingl&ecirc;s)</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=servicos&lingua=ingles');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><div align="left"><strong><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Categorias</strong></font> 
              </strong></div>
            <div align="center"> <strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><strong><a href="javascript:void(0);" onClick="javascript:abresite('menu_produtos_inserir.php?tipo=excluir');"><img src="btn_editar.jpg" border="0"></a></strong></strong></font></strong></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Importar 
            base de Produtos</strong></font> <div align="center"></div>
            <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><font size="1"><strong><font face="Verdana, Arial, Helvetica, sans-serif"><a href="#" onClick="javascript:abresite('importar_base.php');"><img src="btn_inserir.jpg" border="0"></a></font></strong></font></strong></font></strong></font><font size="1" face="Arial, Helvetica, sans-serif"><strong><font size="1"><strong><font face="Verdana, Arial, Helvetica, sans-serif"></font></strong></font></strong></font></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Produtos</strong></font> 
            <div align="center"></div>
            <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><font size="1"><strong><font face="Verdana, Arial, Helvetica, sans-serif"><a href="#" onClick="javascript:abresite('produtos_inserir_include.php');"><img src="btn_inserir.jpg" border="0"></a></font></strong></font></strong></font></strong></font><a href="#" onClick="javascript:abresite('produtos_editar_lista.php');"><img src="btn_editar.jpg" border="0" class="link_topada"></a><font size="1" face="Arial, Helvetica, sans-serif"><strong><font size="1"><strong><font face="Verdana, Arial, Helvetica, sans-serif"></font></strong></font></strong></font></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marcas 
            de clientes</strong></font> <div align="center"></div>
            <div align="center"></div>
            <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="#" onClick="javascript:abresite('banners_inserir.php?tipo=clientes');"><img src="btn_inserir.jpg" border="0"></a> 
              </strong></font><a href="#" onClick="javascript:abresite('banners_excluir.php?tipo=clientes');"><img src="btn_editar.jpg" width="37" height="16" border="0"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Marcas 
            de produtos</strong></font> <div align="center"></div>
            <div align="center"></div>
            <div align="center"><font size="3" face="Verdana, Arial, Helvetica, sans-serif"><strong><a href="#" onClick="javascript:abresite('banners_inserir.php?tipo=produtos');"><img src="btn_inserir.jpg" border="0"></a> 
              </strong></font><a href="#" onClick="javascript:abresite('banners_excluir.php?tipo=produtos');"><img src="btn_editar.jpg" width="37" height="16" border="0"></a></div></td>
        </tr>
        <tr bgcolor="#f2f2f2"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Localiza&ccedil;&atilde;o</strong></font> 
            <div align="center"></div>
            <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('conteudo_editar.php?conteudo=localizacao');"><img src="btn_editar.jpg" border="0" class="link_topada"></a></div>
            <div align="center"></div></td>
        </tr>
        <tr bordercolor="#999999" bgcolor="#fafafa"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Admin 
            Site</strong></font> <div align="center"></div>
            <div align="center"><a href="#" onClick="javascript:abresite('mec_buscas_editar.php');"><img src="btn_editar.jpg" border="0"></a></div>
            <div align="center"></div></td>
        </tr>
        <tr bgcolor="#fafafa"> 
          <td height="30"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Site</strong></font> 
            <div align="center"><strong><font face="Verdana, Arial, Helvetica, sans-serif"><span class="font_textos_medio"><a href="../index.php" target="_blank"><img src="btn_listar.jpg" border="0"></a></span></font></strong></div></td>
        </tr>
      </table>
    </td>
    <td width="83%" valign="top"> 
      <iframe src="#" name="meio" width="100%" height="100%" scrolling="yes" frameborder="0"></iframe>
      &nbsp;</td>
  </tr>
</table>
</body>
</html>

