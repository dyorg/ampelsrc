<link href="css.css" rel="stylesheet" type="text/css"><?
include "conecta.php";
if(@$_GET["mudar"])

{
$mudar = $_GET["mudar"];
mysql_query("UPDATE banners SET link='$_POST[link]' WHERE id='$mudar'");
echo"Alterado com sucesso!!!";
return;
}
?>

<body class="verdana10">
<h2>Editar</h2>
<?

$sql = mysql_query("SELECT * FROM banners WHERE id='$_GET[id]'");
$linha = mysql_num_rows($sql);
$r = mysql_fetch_array($sql);
$id = $r['id'];
$link = $r['link'];
$foto_g = $r['foto_g'];
?>
<img name="logo" src="../imagens/<?=$foto_g?>" width="100" alt="" style="background-color: #CCCCCC"> 
<table width=500 border=0 cellpadding="5" cellspacing=0 bgcolor=#fafafa class=verdana10>
  <form name=atualizar action="?mudar=<? echo $id; ?>" method=POST>
    <tr> 
      <td width="17%">Link:</td>
      <td width="332%" colspan="2"><input name="link" type="text" class="imput10" id="link" value ="<? echo "$link"; ?>" size="70"></td>
    <tr> 
      <td colspan="3"><div align="center"> 
          <input name="Submit" type="submit" class="botao10" value="Alterar">
        </div></td>
  </form>
</table>
</body>