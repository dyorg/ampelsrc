<link href="css.css" rel="stylesheet" type="text/css"> <?
//E-mail do remetente, pode ser substitu�do por uma vari�vel
$para= $_POST["para"];
$para1 = explode(',',$para);
//E-mail do destinat�rio, um email fixo para voc� receber os dados
$de= $_POST["de"];

//aqui envia para todos os emails.
for($i= 0 ; $i < count($para1)-1; $i++)
{
$usuario = substr($para1[$i], 0, strpos ($para1[$i], '@'));

$assunto = $_POST["assunto"];
$assunto = str_replace("%NOME%", "$usuario",$assunto);
$assunto = str_replace("%EMAIL%", "$para1[$i]",$assunto);
//mensagem-------------------------------------------------------
$mens = str_replace('\"',"", $_POST["descricao"]);
$mens = str_replace("%NOME%", "$usuario",$mens);
$mens = str_replace("%EMAIL%", "$para1[$i]",$mens);
//Aqui voc� monta o cabecalho do email, s�o os itens m�nimos obrigat�rios
$headers.= "From: $de\n";
//$headers.= "X-Sender: $de\n";
//$headers.= "Bcc: $para\r\n";
$headers.= "Content-Type: text/html; charset=iso-8859-1\n";//Aqui o c�digo que finalmente envia o seu email
mail("$para1[$i]",$assunto,$mens,$headers);

}

echo "<br><br><br><br><br><br><br><center class=negrito10>Email enviado com sucesso<br><a href=\"../forumadm.php\" class=\"verdana1\">Voltar para o Forum</a></center>";
?>


