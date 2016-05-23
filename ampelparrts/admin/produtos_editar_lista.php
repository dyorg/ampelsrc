<? include "conecta.php";?>
<link href="css.css" rel="stylesheet" type="text/css">
<body topmargin="0" rightmargin="0" leftmargin="0" bottommargin="0">
<div align="center"> </div>
<form name="form1" method="post" action="">
  <div align="center">
    <table width="687" border="0" align="center" cellpadding="5" cellspacing="0" class="verdana10">
      <tr bgcolor="e8e8e8"> 
        <td width="159" valign="top"> Categoria</td>
        <td width="150" valign="top">T&iacute;tulo</td>
        <td width="152" valign="top">Destaque Inicial </td>
        <td width="88" valign="top">Dispon&iacute;vel </td>
        <td width="88" rowspan="2" valign="middle" bgcolor="#f2f2f2"> <div align="right"> 
            <input name="Submit" type="submit" class="botao10" value="Filtrar...">
          </div></td>
      </tr>
      <tr bgcolor="#f2f2f2"> 
        <td valign="top"> 
          <?
		
$sql = mysql_query("SELECT * FROM menu_produtos ORDER BY `menu_produtos`.`categoria` ASC");
$linha = mysql_num_rows($sql);
if(@$_POST["categoria"]=="")
{$catx="Todas as categorias";}
else{
$catx=$_POST["categoria"];}

echo"<select name=\"categoria\" class=\"imput10\">";
echo "<option value=\"$catx\">$catx</option>";
echo "<option value=\"Todas as categorias\">-----------------</option>";
echo "<option value=\"Todas as categorias\">Todas as categorias</option>";
while ($r = mysql_fetch_array($sql))
{
$categoria = $r['categoria'];
$sub = $r['subcategoria'];
$catx="$categoria-$sub\\n";
$categoriaxx.="<a href=\"#dados\" onclick= \"javascript: return insere('$catx')\">.: $categoria » $sub</a><br>";

echo "<option value=\"$categoria-$sub\">$categoria-$sub</option>";

}
echo"</select>";



?>
        </td>
        <td valign="top"> <input name="palavra" type="text" class="imput10" id="palavra" value="<? echo @$_POST["palavra"]; ?>" size="50"></td>
        <td valign="top"><select name="ini" class="imput10" id="ini">
            <option value="<? echo @$_POST["ini"]; ?>"> 
            <? if(@$_POST["ini"] == 1){echo "sim";} if(@$_POST["ini"] == 2){echo "nao";} ?>
            </option>
            <option value="">---</option>
            <option value="1">sim</option>
            <option value="2">nao</option>
          </select></td>
        <td valign="top" bgcolor="#f2f2f2"><select name="disp" class="imput10" id="disp">
            <option value="<? echo @$_POST["disp"]; ?>"><? echo @$_POST["disp"]; ?></option>
            <option value="">---</option>
            <option value="sim">sim</option>
            <option value="nao">nao</option>
          </select></td>
      </tr>
    </table>
  </div>
</form>
<div align="center">
  <?

   if(@!$_POST["palavra"] AND @!$_POST["categoria"] AND @!$_POST["ini"] AND @!$_POST["lat"] AND @!$_POST["disp"])
	  {
	  
$pagina = @$_GET["pagina"];
$sql = mysql_query("SELECT * FROM produtos");
        $total = mysql_num_rows($sql);
          $limite = 10;
         $inicio = $pagina * $limite;
         $divisao = ceil($total / $limite);
		 
$qr = "SELECT * FROM produtos ORDER BY `categoria` ASC ,`subcategoria` ASC LIMIT $inicio, $limite ";
   }else
   {
	  $categoria = $_POST["categoria"];
	  $ini = $_POST["ini"];
	  $lat = $_POST["lat"];
	  $disp = $_POST["disp"];
    $palavra = str_replace(" ", "%", $_POST['palavra']);

if(!empty($_POST["palavra"])){ 
$apalavra="AND titulo LIKE '%$palavra%'";
 }

if(!empty($_POST["ini"])){ 
$bpalavra="AND nivel='$_POST[ini]'";
 }
 
 if(!empty($_POST["lat"])){ 
$cpalavra="AND destaque_lateral='$_POST[lat]'";
 }
 
 if(!empty($_POST["disp"])){ 
$dpalavra="AND disponivel='$_POST[disp]'";
 }

if($categoria != "Todas as categorias"){
$categoriax = explode("-",$categoria);
$categoriay = $categoriax[0];
$categoriaz= $categoriax[1];
$epalavra="AND categoria ='$categoriay'"; 
if(!empty($categoriaz)){
$fpalavra="AND subcategoria ='$categoriaz'"; 
}
}

        /* Altera os espaços adicionando no lugar o simbolo % */

@       $qr = "SELECT * FROM produtos WHERE id!='' $apalavra $bpalavra $cpalavra $dpalavra $epalavra  $fpalavra ORDER BY `categoria` ASC ,`subcategoria` ASC";   
	  $sq = mysql_query($qr);
	   $total = mysql_num_rows($sq);
   }


$sq = mysql_query($qr);
echo "<center class=verdana12><b>$total resultado(s).</b></center><hr color=#f2f2f2 width=\"750\" align=center>";

while ($r = mysql_fetch_array($sq))
{
extract($r);
if($foto1 ==""){$foto1="sem_imagem.jpg";}
echo "<table width=750 border=0 cellspacing=2 class=verdana10 bgcolor=#f2f2f2 align=center>
  <tr><td width=2%><img src=../imagens/pequena$foto1 width=120></td>
    <td width=70%><b>Categoria:</b> $categoria <br><b>Subcategoria:</b> $subcategoria<br><b>Título:</b> $titulo<br><b>Preço:</b> R$ " . number_format($valor_menor, 2, ',','.')."
	<br><b>Destaque na página inicial:</b>"; if($nivel == 1){echo "sim";}else{echo "não"; }
	echo
	"<br><b>Quantidade:</b> $quantidade<br><b>Disponível:</b> $disponivel<br><b>Visítas no produto:</b> $visitas
	</td>
    <td align=right><a href=produtos_editar_include.php?id=$id class=\"link_rodape\"><img src=btn_editar.jpg border=0></a> 
<a href=?id=$id&apagar=sim class=\"link_rodape\" onClick=\"javascript:return confirm('Confirmar a exclusão?');\"><img src=btn_excluir.jpg border=0></a></td>
  </tr>
</table><hr color=#f2f2f2 width=\"750\" align=center>";
}


if(@$_GET["apagar"]=="sim")
{
$id = $_GET["id"];
mysql_query("DELETE FROM produtos WHERE id = '$id'");
echo '<div id="Layerx" style="position:absolute; left:200px; top:200px; width:209px; height:57px; z-index:0; background-color: #f2f2f2; layer-background-color: #f2f2f2; border: 1px none #000000;"> 
  <div align="center"> <br>Salvando...<img src=redirecionar.gif></div></div>';
echo"<meta http-equiv=\"refresh\" content=\"0;url=produtos_editar_lista.php\">";
}
?>
</div>
<p align="center"><font  class="verdana10"> 
  <?
//paginacao segunda parte
 if(@!$_POST["palavra"] AND @!$_POST["categoria"] AND @!$_POST["ini"] AND @!$_POST["lat"] AND @!$_POST["disp"])
 {
 echo "<center>";
if($pagina > 0) {
  $menos = $pagina - 1;
  $url = "?pagina=$menos";
  echo "<a href=\"$url\" title=\"VOLTAR\"> « </a> |";
}

for($i = 0;$i < $divisao;$i++ )
{
$ix=$i + 1;
if($pagina == $i)
{echo "<a href =?pagina=$i title=\"PAGINA\"> <b>$ix</b> </a> | " ;}
else{echo "<a href =?pagina=$i title=\"PAGINA\">$ix</a> | " ;}
}

if($pagina < $divisao) {
  $mais = $pagina + 1;
  $url = "?pagina=$mais";

  echo "<a href=\"$url\" title=\"AVANCAR\"> » </a>";
}
echo "</center>";
}



?>
  </font> </p>
</body>
