<link href="links_css.css" rel="stylesheet" type="text/css">

<body class="font_textos_medio_caixa_alta_negrito">
<h2><font face="Verdana, Arial, Helvetica, sans-serif">L</font><font face="Verdana, Arial, Helvetica, sans-serif">ogos 
  de 
  <?=$_GET["tipo"]?>
  </font></h2>
<?

include "conecta.php";

$sql = mysql_query("SELECT * FROM banners where tipo='$_GET[tipo]' ORDER BY `banners`.`id` ASC");



$linha = mysql_num_rows($sql);



while ($r = mysql_fetch_array($sql))

{

$id = $r['id'];

$foto_g = $r['foto_g'];

$link = $r['link'];

echo "<table width=100% border=0 cellspacing=2 class=verdana10 bgcolor=#f2f2f2>

  <tr>

    <td width=20%><img src=../imagens/$foto_g height=50></td><td><a href=$link target=_blank>$link</a></td>

    <td align=right> 
<a href=banners_editar.php?id=$id><img src=btn_editar.jpg border=0></a>
<a href=?id=$id&apagar=sim&tipo=$_GET[tipo] class=\"link_rodape\" onClick=\"javascript:return confirm('Confirmar a exclusão?');\"><img src=btn_excluir.jpg border=0></a></td>

  </tr>

</table><hr size=1 color=#f2f2f2>";

}





if(@$_GET["apagar"]=="sim")

{

$id = $_GET["id"];

mysql_query("DELETE FROM banners WHERE id = '$id'");

echo '<div id="Layerx" style="position:absolute; left:200px; top:200px; width:209px; height:57px; z-index:0; background-color: #f2f2f2; layer-background-color: #f2f2f2; border: 1px none #000000;"> 

  <div align="center"> <br>Salvando...<img src=redirecionar.gif></div></div>';

echo"<meta http-equiv=\"refresh\" content=\"0;url=banners_excluir.php?tipo=$_GET[tipo]\">";

}

?>
</body>