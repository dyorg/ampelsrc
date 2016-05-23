<link href="css.css" rel="stylesheet" type="text/css">
<body TOPMARGIN="0" LEFTMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
<?
//<body onload="javascript:window.resizeTo('700','650');" >
include "conecta.php";
$id = $_GET["id"];
$fot = $_GET["fot"];
$sql = mysql_query("SELECT * FROM produtos WHERE id = $id");
$r = mysql_fetch_array($sql);
extract($r);
if ($foto1 == null AND $foto2 == null AND $foto3 == null AND $foto4 == null)
{
echo"<center><img src=\"imagens/grandesem_imagem.jpg\" border=\"0\"></center>";
return;
}
?>
<table width="481" height="470" border="0" align="center"  cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="477" valign="top" align="center"> 
      <?
	  
	  
	  
if ($foto1 != null AND $foto2 != null)
{
echo"<a href=foto2.php?id=$id&fot=$foto1><img src=\"imagens/pequena$foto1\" border=\"0\" width=\"70\"></a> &nbsp;";
}

if ($foto2 != null)
{
echo"<a href=foto2.php?id=$id&fot=$foto2><img src=\"imagens/pequena$foto2\" border=\"0\" width=\"70\"></a> &nbsp;";
}

if ($foto3 != null)
{
echo"<a href=foto2.php?id=$id&fot=$foto3>F<img src=\"imagens/pequena$foto3\" border=\"0\" width=\"70\"></a> &nbsp;";
}

if ($foto4 != null)
{
echo"<a href=foto2.php?id=$id&fot=$foto4><img src=\"imagens/pequena$foto4\" border=\"0\" width=\"70\"></a> &nbsp;";
}

echo "<br>";
if($foto1 == $fot)
{
echo "<img src=\"imagens/grande$foto1\">";
}

if($foto2 == $fot)
{
echo "<img src=\"imagens/grande$foto2\">";
}

if($foto3 == $fot)
{
echo "<img src=\"imagens/grande$foto3\">";
}

if($foto4 == $fot)
{
echo "<img src=\"imagens/grande$foto4\">";
}
?>
<div class="negrito10"><? echo $titulo;?></div>

      </td></tr></table> 

