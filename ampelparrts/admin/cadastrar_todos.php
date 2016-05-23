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
//so mostra se tiver o endereco
if(@$_POST["texto"]){

$ch = curl_init();
// informar URL e outras funções ao CURL
curl_setopt($ch, CURLOPT_URL, $_POST["texto"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Acessar a URL e retornar a saída
$output = curl_exec($ch);
// liberar
curl_close($ch);



//$div=$_POST["texto"];
$div=$output;
$div = str_replace('"', "",$div);
$div = str_replace("'", "",$div);
$div = str_replace("\n", "", $div);

$string =$div ;
preg_match_all("/<body>(.*?)<\/body>/", $string, $return);
$fimx =$return[1][0];

$separa = explode("<table border=0 width=100% height=17>",$fimx);
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
echo "$n. $imprime0 $imprime1 $imprime2 $imprime3 $imprime4<br>";
//salva os produtos
//mysql_query("INSERT INTO `produtos` (nomecadastro,emailcadastro,senhacadastro,titulo,data,texto,detalhes,bairro,cidade,estado,endereco,cep,contatos,site,categoria,link,logo) VALUES
//('$titulo','$email','12345678','$titulo','$datax','$textolongo','$textocurto','$bairro','$cidadefim','$estadofim','$endereco','$cep','$telefone','http://$site','$categoria','$frase','$logo')");
}
}
}
?>



