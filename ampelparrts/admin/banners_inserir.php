<link href="css.css" rel="stylesheet" type="text/css">   

<CENTER>
  <h2><font face="Verdana, Arial, Helvetica, sans-serif">Cadastrar logos de <?=$_GET["tipo"]?></font></h2>
  </CENTER>
<p>
<LI>Para incluir uma logo, localize a imagem no seu computador e clique em <strong>AVANÇAR 
  >></strong><br>
  <form action = "banners_inserir.php?tipo=<?=$_GET["tipo"]?>" method = "post" enctype = "multipart/form-data" name = "form1" >
    <p> <strong> Foto: </strong> 
      <input type = "file" name = "arquivo" class="imput10">
      <input type = "submit" name = "Submit" value = "Avançar >> " class="imput10">
    </p>
  </form>
  <hr size=1 color="c90000">
  <?php


//se existir o arquivo










if(isset($_FILES["arquivo"])){

$arquivo = $_FILES["arquivo"];

$arquivo_nome =$arquivo["name"];









		if(!isset($_FILES['arquivo']['name']) || empty($_FILES['arquivo']['name'])) {
			echo $erro.=" Informe um arquivo.<br> ";
		}
		if (@ereg("[](><){}:;,!?*%&$@]", $_FILES['arquivo']['name'])){
			echo $erro.=" O arquivo contem caracteres invalidos<br> ";
		}
		if($_FILES['arquivo']['size'] > 1000000){
			echo $erro.=" Imagem com no mamimo 1 Megas<br> ";
		}
	
		if(!is_file($_FILES['arquivo']['tmp_name'])){
			echo $erro.=" Selecione o arquivo para ser enviado<br> ";
		}
		if(is_dir($_FILES['arquivo']['name'])){
			echo $erro.=" Selecione um arquivo para ser enviado<br> ";
		}
		if (!isset($erro)){
		// vai enviar agora
			if (!copy($_FILES['arquivo']['tmp_name'], "../imagens/".$_FILES['arquivo']['name'])){
				echo " Erro ao enviar<br> ";
			}
		}

















// Faz o upload da imagem

//move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);





echo "

<form method=\"post\" name=\"form1\" action=\"cadastrando_foto_banners.php?tipo=$_GET[tipo]\">

<center> 
<table class=body  width=100%>
<tr>
<td align=center> 

<center>
<p> 

<div class=\"negrito10\"> 
<img src=\"../imagens/$arquivo_nome\" width=\"100\">
<input type=\"hidden\" name=\"foto_g\"  value=\"$arquivo_nome\" class=imput10 size=50>
</div>



<P>

<div class=\"negrito10\"> Link:<br> 
<input type=\"text\" name=\"link\" class=imput10 size=50> 
</div>

<P>


</select>
<input type=\"submit\" name=\"Submit\" value=\"Cadastrar\" class=\"negrito10\">

</form>

</td>
</tr>
</table>
</center> 

";

}

;?>
