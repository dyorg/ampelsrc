<meta http-equiv="refresh" content="1;URL=news.php">
<?php
include("funcoes.php");


$nome=$_POST['nome'];
$email=$_POST['email'];





#//retirando espa�os

   $nome=trim($nome);   
   $email=trim($email);
   
   
   
   
$erro=0;

#//verificar se h� email cadastrado no BD
   $s=mysql_query("SELECT * FROM news WHERE email='$email'");
   $mnr=mysql_num_rows($s);

if($mnr!=0){ echo '<center><font color="#FF0000">ATEN��O <BR>E-mail j� cadastrado em nosso banco de dados! <p> Por favor cadastre outro e-mail <a href=..//news.php><b> Voltar </b></a></font>'; $erro++; }

#//se n�o encontrar @
  if( !eregi("@", $email) ){
  echo '<center><font color="#FF0000">ATEN��O <BR>Email incorreto!</font>';
  $erro++; }
   
#//encontrar n�meros
  if( ereg("[0-9()-.,:;*&�!?|+}{/]", $nome) ){
  echo '<center><font color="#FF0000">ATEN��O <BR>Nome incorreto!</font>';
  $erro++; }

#//verificar se campo nome foi setado
  if(empty($nome)){
  echo '<center><font color="#FF0000">ATEN��O <BR>Campo nome em branco!</font>';
  $erro++; }


if($erro==0){
#//inseri no banco de dados se tudo for OK
   $i=mysql_query("INSERT INTO news (nome, email) VALUES ('$nome','$email')");
   echo '<center>Cadastro efetuado com sucesso!<br><br><br>
<body color=000066>
   <b>Nome:</b> '.$nome	.'<br>
   <b>Email:</b> '.$email.'';
   
}
?>
<html><head><title><?=$titulo?></title>
<link href="../links_css.css" rel="stylesheet" type="text/css">
</head>
<body></body></html>
