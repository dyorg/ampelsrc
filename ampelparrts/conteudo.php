<table border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="200" align="center" valign="top" background="linha.gif" style="background-repeat: repeat-y;background-position: right; "> 
      <?               include "lateral.php"; ?>
    </td>
    <td width="800" valign="top"> 
      <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <?
              include "conecta.php";
if(@$_GET["conteudo"] == NULL)
{
echo "<br><font class=menu><a href=index.php>Home</a></font><br><br>";
include "foto.php";
include "inicio.php";
}
			  
if(@$_GET["conteudo"] == "contato")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Fale Conosco</font><br><br>";
include "fale_conosco.php";}

if(@$_GET["conteudo"] == "buscar")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Resultado de busca</font><br><br>";
include "buscar.php";}

if(@$_GET["conteudo"] == "buscar_advance")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Busca Avançada</font><br><br>";
include "buscar_advance.php";}

if(@$_GET["conteudo"] == "produtos")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Produtos</font><br><br>";
include "produtos.php";}

if(@$_GET["conteudo"] == "produtos_detalhes")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Produtos</font><br><br>";
include "produtos_detalhes.php";}

if(@$_GET["conteudo"] == "clientes")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Clientes</font><br><br>";
include "foto.php";
}

else{
$conteudo = $_GET["conteudo"];

if(@$_GET["conteudo"] == "localizacao")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Localização</font><br><br>";}

if(@$_GET["conteudo"] == "servicos")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Serviços</font><br><br>";}

if(@$_GET["conteudo"] == "empresa")
{
echo "<br><font class=menu><a href=index.php>Home</a> » Empresa</font><br><br>";}

$qr = "SELECT * FROM conteudo WHERE categoria='$conteudo' AND lingua='$_GET[lingua]'";
$sql = mysql_query($qr);
$inicial = mysql_fetch_array($sql);
echo "$inicial[texto]";
}
?>
          </td>
        </tr>
      </table> </td>
  </tr>
</table>



<p class="menu">&nbsp;</p>
