<link href="css.css" rel="stylesheet" type="text/css">
<body><fieldset class="negrito10"><legend style="color:8888888;">Recomende este produto</legend>
<?
include "mec_buscas.php";
echo"<center><img src=imagens/pequena$_GET[foto] border=0><br><br>$_GET[produto]</center>";

echo"<title>$_GET[produto]</title>";

    //validando form

   	if(!empty($_POST['nome']) AND !empty($_POST['email']))

    {

 	$nome = $_POST['nome'];

	$nomeamigo = $_POST['nomeamigo'];

	$email = $_POST['email'];

	$para = $_POST['para'];

	$comentario = $_POST['comentario'];

$msg.="<hr width=\"770\" size=\"20\" color=\"#000099\" align=\"left\"><br>";

$msg.="Ola $nomeamigo seu amigo $nome , visitou o site <a href=\"$mec_site\">$mec_site</a><br>

deixou o comentario:<br>

<b>$comentario</b><br>

e indicou o produto:<br>

<img src= $mec_site/imagens/pequena$_GET[foto] border=0><br><br>$_GET[produto]<br><br><b>R$: $_GET[valor]</b><br>visualize o produto <a href=\"$mec_site/index.php?conteudo=produtos_detalhes&id=$_GET[id]\"><b>aqui</b></a>";

$msg.="<br><hr width=\"770\" size=\"20\" color=\"#990000\" align=\"left\">";

$msg.="Cadastre - se em nosso site para receber e-mails com produtos promocionais.   <a href=\"$mec_site\">$mec_site</a><br>";

	$assunto = "$nome indicou o produto $_GET[produto]  do site $mec_site!!!Confira";

        //espaco



$headers.="From:$email\n";

$headers.= "X-Sender: $email\n";

$headers.= "Content-Type: text/html; charset=iso-8859-1\n";//Aqui o código que finalmente envia o seu email







	//espaco



	mail($para, $assunto,$msg,$headers);



	echo"<center><br><br>$nome sua mensagem foi enviada com sucesso para $nomeamigo <meta http-equiv=\"refresh\" content=\"1;url=javascript:close();\"></center>";

	}

	

  

  

   if(empty($_POST['nome']) AND empty($_POST['email']))

    {

  ?>

 

  <form method="POST">

Seu nome: <br>

  <input type="text" size="30" name="nome" class="imput10">

  <br>

Seu email: <br>

  <input type="text" size="30" name="email" class="imput10">

  <br>

Nome do seu amigo: <br>

  <input type="text" size="30" name="nomeamigo" class="imput10">

  <br>

Email do seu amigo: <br>

  <input type="text" size="30" name="para" class="imput10">

  <br>

  descri&ccedil;&atilde;o<br>

  <textarea rows="2" cols="28" name="comentario" class="imput10"></textarea>

  <br><br>

<input type="image" src="bt_enviar.gif" value="Botão">

</form>

 <?

 }

  ?>
</fieldset>
  </body>

  
