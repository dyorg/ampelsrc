<link href="links_css.css" rel="stylesheet" type="text/css">
<?php include("news.php"); ?>

<div align="center">
<P><br>
  <h3> <font face="Verdana, Arial, Helvetica, sans-serif">Lista de E-mails cadastrados
    pelo News </font></h3>
  </div>
<table width="100%" border="0" bordercolor="#CCCCCC" cellpadding="2" cellspacing="2" bgcolor="cccccc">
  <tr bgcolor="cccccc">
    <td width="8%" valign="top">
      <div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Cod</font></b></div></td>
    <td width="31%" valign="top"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></b></td>
    <td width="45%" valign="top"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail</font></b></td>
    <td width="8%" valign="top">
      <div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Editar</font></b></div></td>
    <td width="8%" valign="top">
      <div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Deletar</font></b></div></td>
  </tr>
</table>
<div>
  <?php
include "funcoes.php";
$sql = mysql_query("SELECT * FROM news Order by id DESC");
$linha = mysql_num_rows($sql);

while ($r = mysql_fetch_array($sql))
{
$id = $r['id'];
$nome = $r['nome'];
$email = $r['email'];



echo "<center><table width=\"100%\" border=\"0\" bordercolor=\"#ffffff\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#f1f1f1\">
  <tr>

    <td  width=\"8%\"><CENTER> <b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$id</font></b></CENTER></td>



    <td width=\"31%\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$nome</font></b></td>



    <td  width=\"45%\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=mailto:$email class=link_topada>$email</a</font></b>	</td>
	 <td  width=\"8%\"><CENTER> <a href=editar_news_novo.php?id=$id class=\"link_rodape\"><img src=btn_editar.jpg border=0></a> </CENTER> </td>
	  <td  width=\"8%\"><CENTER> <b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=deletar_news.php?id=$id class=\"link_rodape\"><img src=btn_excluir.jpg border=0></a></font></b></CENTER></td>



  </tr>

  </table><div></center>





  " ;





}

?>
</div>
<hr width="100%" size="1" color="#CCCCCC">
<h3 align="center"> <font face="Verdana, Arial, Helvetica, sans-serif">Lista de
  E-mails para usar no Outlook com C&oacute;pia Oculta<br>
  </font><br>
  <?php
include "funcoes.php";
$sql = mysql_query("SELECT * FROM news Order by Id DESC");
$linha = mysql_num_rows($sql);

while ($r = mysql_fetch_array($sql))
{
$id = $r['id'];
$nome = $r['nome'];
$email = $r['email'];








echo "<td width=\"500\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$email,<div></font></b></td>
" ;
}

?>
  <?php

echo "
<hr width=\"100%\" size=\"1\" color=\"#CCCCCC\">
<div class=font_textos_medio>  <b> $linha </b> endereço(s) de e-mail(s) cadastrados no news-letters até hoje!  </div> "
;?></div>
  </h3>

