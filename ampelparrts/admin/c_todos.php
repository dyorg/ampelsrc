<table width="100%" height="50" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#f2f2f2">
  <tr>
    <form name="form1" method="post" action="">
      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
        Cole o c&oacute;digo aqui<br>
        </font>
        <textarea name="texto" cols="80" rows="3" wrap="VIRTUAL" id="texto"></textarea>
        <br>
        <input type="submit" name="Submit" value="enviar">
</td></form>
  </tr>
</table>
<br>
<?
include "conecta.php";
mysql_query("DELETE FROM produtos WHERE titulo =''");
$datab = date('Y-m-d');
//so mostra se tiver o endereco
if(@$_POST["texto"]){

$div=$_POST["texto"];
$div = str_replace('"', "",$div);
$div = str_replace("'", "",$div);
$div = str_replace("\n", "", $div);

$string =$div ;
$separa = explode("<table border=0 width=100% height=17>",$string);
$n = 0;
foreach($separa as $fim)
{
if(!empty($fim))
{
$n++;
preg_match_all("/<font face=VERDANA size=1>(.*?)<\/font>/", $fim, $return0);
$imprime0 = strip_tags($return0[1][0]);
$imprime1 = strip_tags($return0[1][1]);
$imprime2 = strip_tags($return0[1][2]);
$imprime3 = strip_tags($return0[1][3]);
$imprime4 = strip_tags($return0[1][4]);
echo "$n. a)$imprime0 b)$imprime1 c)$imprime2 d)$imprime3 e)$imprime4<br>";
//salva os produtos
mysql_query("INSERT INTO `produtos` (titulo,data,texto,detalhes,categoria,subcategoria,nivel,quantidade) VALUES
('$imprime1','$datab','$imprime0','Código:$imprime0 <br>$imprime1 <br>Para saber mais informações deste produto, entre em contato conosco!!!','$imprime3','$imprime2','2','1')");
}
}
}
?>



