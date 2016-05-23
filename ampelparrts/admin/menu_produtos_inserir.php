
<center> <h2> Inserir Categoria no Menu Produtos </h2></center>



<link href="links_css.css" rel="stylesheet" type="text/css">  




<P>



<?php







echo " 



<center>

<table>

<tr>

<td width=250 align=center>













<form method=\"post\" name=\"form1\" action=\"cadastrando_menu_produtos.php?tipo=categoria\">









<div class=\"font_textos_medio\"> Categoria  

<input type=\"text\" name=\"categoria\" class=formularios_g> <br>

Cria uma nova página como Empresa <br>  Serviços <br> Informações <br> Etc... </div>

  





<input type=\"submit\" name=\"Submit\" value=\"Enviar\" class=formularios_pequeno_para_botao_enviar>

</form>



</tr>

</td>

</table>



</center> 



";









?>



<HR>

 <center> <h2> Inserir Sub-Categoria no Menu Produtos </h2></center>

<center>

<table>

<tr>

<td width=500 align=center>













<form method="post" name="form2" action="cadastrando_menu_produtos.php?tipo=subcategoria">





<div class="font_textos_medio"> Categoria:

<?

include "conecta.php";

$sql0 = mysql_query("SELECT * FROM menu_produtos ORDER BY `menu_produtos`.`categoria` ASC");

$categoria1 = '';

echo"<select name=\"categoria\" class=\"formularios_g\">";

while ($r = mysql_fetch_array($sql0))

{

$categoria = $r['categoria'];

if(substr_count($categoria1,$categoria) == 0)

{

$categoria1.= "$categoria ,";



echo "<option value=\"$categoria\">$categoria</option>"; }

}

echo"</select>";



?>





Sub-Categoria:

<input type="text" name="subcategoria" class=formularios_g>

</div>

<input type="submit" name="Submit" value="Enviar" class=formularios_pequeno_para_botao_enviar>

</form>



</tr>

</td>

</table>



</center>



<P>

<HR>





















































<?







echo"

<center> 



<h2> Listar ou Excluir Categoria de Menu Produtos </h2>











<table width=50% border=0>

<tr>

<td width=5%> 

<div class=\"font_textos_medio\"><strong>ID: </strong>  <div>

</td>







<td width=80%> 

<div class=\"font_textos_medio\"><strong> Categoria: </strong>  <div>

</td> 



<td width=15%>

<div class=\"font_textos_medio\"><strong> Botão: </strong>  <div>

</td>



</tr>

</table>

</center>



";











;?>









<?

include "conecta.php";

$sql = mysql_query("SELECT * FROM menu_produtos ORDER BY `menu_produtos`.`categoria` ASC");



$linha = mysql_num_rows($sql);



while ($r = mysql_fetch_array($sql))

{

$id = $r['id'];



$categoria = $r['categoria'];

$subcategoria = $r['subcategoria'];









echo "







<center>



<table width=50% border=0>

<tr>

<td width=5%> 

<div class=\"font_textos_medio\">  $id  <div>

</td>





<td width=80%> 

<div class=\"font_textos_medio\">$categoria - $subcategoria <div>

</td> 









<td width=15%>

<a href=menu_produtos_excluir_deletando.php?id=$id class=\"link_rodape\"><img src=btn_excluir.jpg border=0></a>

</td>



</tr>

</table>

</center> 

<hr size=1>





";





}





?>



<hr>

