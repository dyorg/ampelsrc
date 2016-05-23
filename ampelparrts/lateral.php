<link href="css.css" rel="stylesheet" type="text/css"> 
 <form name="form1" method="post" action="index.php?conteudo=buscar">
  <br>
  <table width="185" height="74" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" background="fundo-de-busca-topada.jpg"> 
     
  <div align="center"><br>
          <br>
          <input name="palavra" type="text" class="imput-busca" size="25" onFocus="this.value=''" value="Digite o c&oacute;digo...">
    <input name="Submit" type="submit" class="botao5" value="ok">
          <span class="verdana10"><font size="1"><a href="index.php?conteudo=buscar_advance"></a></font></span></div>

</td>
</tr>
</table>
  <div align="center"><span class="verdana10"><font size="1"><a href="index.php?conteudo=buscar_advance"><u>Busca 
    avan&ccedil;ada</u></a></font></span> <br>
  </div>
</form>	   
<div align="center"></div>
<div align="center"></div>
<table width="96%" border="0" cellpadding="0" cellspacing="0">
  <tr class="verdana10"> 
    <td width="49%" height="5" align="center" class="negrito10"> 
      <?

				     	if(!empty($_POST['nome']) AND !empty($_POST['email']))

    {

 	$nome = $_POST['nome'];

	$nomeamigo = "$mec_buscas_url";



	$email = $_POST['email'];

	$para = "$mec_buscas_url";





	$comentario = $_POST['comentario'];



$msg.="<hr width=\"770\" size=\"20\" color=\"#cccccc\" align=\"left\"><br>";



$msg.="<font face=Verdana, Arial, Helvetica, sans-serif size=2>
Dados:<br>

Nome :$_POST[nome]<br>

Empresa: $_POST[empresa]<br>

Email : $_POST[email]<br>

Messenger : $_POST[messenger]<br>

Telefone : $_POST[telefone]<br>

Cidade : $_POST[cidade]<br>

Comentario: $_POST[comentario]<br>";

$msg.="<br><hr width=\"770\" size=\"20\" color=\"#cccccc\" align=\"left\"></font>";

	$assunto = "Formulário de $nome enviado pelo site";







        //espaco



$headers.="From:$email\n";

$headers.= "X-Sender: $email\n";

$headers.= "Content-Type: text/html; charset=iso-8859-1\n";//Aqui o código que finalmente envia o seu email







	//espaco



	mail($para, $assunto,$msg,$headers);



	echo"<center><br><br>$nome sua mensagem foi enviada com sucesso para $nomeamigo</center>";

	}

				  

	

	   if(empty($_POST['nome']) AND empty($_POST['email']))

    {			  

	?>
      <br> 
      <table width="14%" border="0" cellpadding="2" cellspacing="0">
        <form method="post" >
          <tr align="center"> 
            <td  height=25 colspan="2"><font color="#000000" size="2" face="arial"><strong>Solicite 
              um Or&ccedil;amento</strong></font></td>
          </tr>
          <tr> 
            <td width="63"  height=2 class="verdana10"><div align="right"><font size="1" face="arial"><strong>Nome:</strong></font></div></td>
            <td width="120" bordercolor="#FFFFCC"><input name="nome" type="text" class="imput10" id="Nome3" size="20" maxlength="50"  ></td>
          </tr>
          <tr> 
            <td height=2 class="verdana10"><div align="right"><strong><font size="1" face="Arial, Helvetica, sans-serif">Empresa: 
                </font></strong></div></td>
            <td bordercolor="#FFFFCC"> <input name="empresa" type="text" class="imput10" id="empresa" size="20" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td class="verdana10"> <div align="right"><strong><font size="1" face="Arial, Helvetica, sans-serif">Email: 
                </font></strong></div></td>
            <td bordercolor="#FFFFCC"> <input name="email" type="text" class="imput10" id="email" size="20" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td class="verdana10"><div align="right"><strong><font size="1" face="Arial, Helvetica, sans-serif">Messenger:</font></strong></div></td>
            <td bordercolor="#FFFFCC"><input name="messenger" type="text" class="imput10" id="messenger" size="20" maxlength="50"></td>
          </tr>
          <tr> 
            <td class="verdana10"> <div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><strong>Telefone:</strong> 
                </font></div></td>
            <td bordercolor="#FFFFCC"> <input name="telefone" type="text" class="imput10" id="telefone" size="20" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td class="verdana10"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><strong>Cidade:</strong> 
                </font></div></td>
            <td><input name="cidade" type="text" class="imput10" id="cidade" size="20" maxlength="50"></td>
          </tr>
          <tr> 
            <td height="67" class="verdana10"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><strong>Produto: 
                </strong> </font></div></td>
            <td> <textarea name="comentario" cols="19" rows="5" class="imput10" id="comentario"></textarea> 
            </td>
          </tr>
          <tr> 
            <td colspan="2"><div align="center"> 
                <input name="submit"  type="submit" class="botao10" id="submit"  value="Enviar">
              </div></td>
          </tr>
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr align="center"> 
            <td height="25" colspan="2"> <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="185" height="200">
                <param name="movie" value="contats-lateral.swf">
                <param name="quality" value="high">
                <embed src="contats-lateral.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="185" height="200"></embed></object> 
            </td>
          </tr>
          <tr align="center"> 
            <td height="25" colspan="2" > 
              <? if(!empty($mec_msn)) {echo "<a href=\"msnim:chat?contact=$mec_msn\" class=link_topada><img src=\"msnadd.jpg\" border=\"0\"> </a>";} ?>
            </td>
          </tr>
          <tr align="center"> 
            <td height="25" colspan="2" class="verdana10">&nbsp;</td>
          </tr>
        </form>
      </table>
      <? } ?>
    </td>
  </tr>
</table>

        