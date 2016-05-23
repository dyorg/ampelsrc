
<div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Lista 
  de E-mails cadastrados pelo News</font></strong><br>
  <br>
  
  
  
   <center><table width="500" border="1" bordercolor="#ffffff" cellpadding="0" cellspacing="2" bgcolor="#ffcc33"> 
  <tr>

    <td valign="top" width="10%"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Cod</font></b></td>



    <td valign="top" width="34%"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome</font></b></td>



    <td valign="top" width="56%"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail</a></font></b></td>

  </tr>  

  </table><div></center>
  
  
  
  
  <?php
include "funcoes.php";
$sql = mysql_query("SELECT * FROM news");
$linha = mysql_num_rows($sql);
			  
while ($r = mysql_fetch_array($sql))
{
$id = $r['id'];
$nome = $r['nome'];
$email = $r['email'];



echo "<center><table width=\"500\" border=\"1\" bordercolor=\"#ffffff\" cellpadding=\"0\" cellspacing=\"2\" bgcolor=\"#EAEAEA\"> 
  <tr>

    <td valign=\"top\" width=\"10%\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=novapag_news_lista_deletar.php?id=$id class=\"link_rodape\">$id</a></font></b></td>



    <td valign=\"top\" width=\"34%\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=novapag_news_lista_deletar.php?id=$id class=\"link_rodape\">$nome</a></font></b></td>



    <td valign=\"top\" width=\"36%\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=novapag_news_lista_deletar.php?id=$id class=\"link_rodape\">$email</a></font></b></td>

 <td valign=\"top\" width=\"20%\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=deletar_news.php?id=$id class=\"link_rodape\"><img src=imagens/btn_deletar.jpg border=0></a></font></b></td>

  </tr>  

  </table><div></center>" ;        
           
	



}
			
?>
</div>
<hr width="500">

<br>
<div align="center"> <strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Lista de E-mails para usar no Outlook 
  com C&oacute;pia Oculta</font></strong><br>
  <br>
  <?php
include "funcoes.php";
$sql = mysql_query("SELECT * FROM news");
$linha = mysql_num_rows($sql);
			  
while ($r = mysql_fetch_array($sql))
{
$id = $r['id'];
$nome = $r['nome'];
$email = $r['email'];



  
           
	


echo "<td width=\"500\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$email,<div></font></b></td>" ;      
}
			
?>
</div>
