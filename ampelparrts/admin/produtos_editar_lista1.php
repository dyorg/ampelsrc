<link href="css.css" rel="stylesheet" type="text/css">
<body class="verdana10">
<?
include "conecta.php";
$sql = mysql_query("SELECT * FROM produtos ORDER BY `categoria` ASC ,`subcategoria` ASC");
$linha = mysql_num_rows($sql);
echo "<b>$linha resultado(s)</b><hr size=1 color=#f2f2f2>";
while ($r = mysql_fetch_array($sql))
{
extract($r);
if($foto1 ==""){$foto1="sem_imagem.jpg";}
echo "<table width=100% border=0 cellspacing=2 class=font_textos_medio_caixa_alta_negrito bgcolor=#f2f2f2>
  <tr><td width=2%><img src=../imagens/pequena$foto1 width=50></td>
    <td width=70%>$titulo</td>
    <td align=right><a href=produtos_editar_include.php?id=$id class=\"link_rodape\"><img src=btn_editar.jpg border=0></a>
<a href=?id=$id&apagar=sim class=\"link_rodape\" onClick=\"javascript:return confirm('Confirmar a exclusão?');\"><img src=btn_excluir.jpg border=0></a></td>
  </tr>
</table><hr size=1 color=#f2f2f2>";
}


if($_GET["apagar"]=="sim")
{
$id = $_GET["id"];
mysql_query("DELETE FROM produtos WHERE id = '$id'");
echo '<div id="Layerx" style="position:absolute; left:200px; top:200px; width:209px; height:57px; z-index:0; background-color: #f2f2f2; layer-background-color: #f2f2f2; border: 1px none #000000;"> 
  <div align="center"> <br>Salvando...<img src=redirecionar.gif></div></div>';
echo"<meta http-equiv=\"refresh\" content=\"0;url=produtos_editar_lista.php\">";
}
?>
</body>
