<link href="css.css" rel="stylesheet" type="text/css"> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="verdana10"> 
    <td width="49%" height="5"> 
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

	$assunto = "Formulário de $nome enviado pelo site - $_POST[assunto]";







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
      <table width="34%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
        <form method="post" >
          <tr> 
            <td  height=2 class="verdana10">&nbsp;</td>
            <td bordercolor="#FFFFCC">&nbsp;</td>
          </tr>
          <tr> 
            <td width="96"  height=2 class="verdana10"><div align="center"><strong>Nome:</strong></div></td>
            <td width="536" bordercolor="#FFFFCC"><input name="nome" type="text" class="imput10" id="Nome3" size="50" maxlength="50"  ></td>
          </tr>
          <tr> 
            <td height=2 class="verdana10"><div align="center"><strong>Empresa: 
                </strong></div></td>
            <td bordercolor="#FFFFCC"> <input name="empresa" type="text" class="imput10" id="empresa" size="50" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td class="verdana10"> <div align="center"><strong>Email: </strong></div></td>
            <td bordercolor="#FFFFCC"> <input name="email" type="text" class="imput10" id="email" size="50" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td class="verdana10"><div align="center"><strong>Messenger:</strong></div></td>
            <td bordercolor="#FFFFCC"><input name="messenger" type="text" class="imput10" id="messenger" size="50" maxlength="50"></td>
          </tr>
          <tr> 
            <td class="verdana10"> <div align="center"><strong>Telefone: </strong></div></td>
            <td bordercolor="#FFFFCC"> <input name="telefone" type="text" class="imput10" id="telefone" size="50" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td class="verdana10"><div align="center"><strong>Cidade: </strong></div></td>
            <td><input name="cidade" type="text" class="imput10" id="cidade" size="50" maxlength="50"></td>
          </tr>
          <tr> 
            <td height=2 class="verdana10"> <div align="center"><strong>Assunto: 
                </strong></div></td>
            <td> <input name="assunto" type="text" class="imput10" id="assunto" size="50" maxlength="50"> 
            </td>
          </tr>
          <tr> 
            <td height="67" class="verdana10"><div align="center"><strong>Informa&ccedil;&otilde;es: 
                </strong></div></td>
            <td> <textarea name="comentario" cols="49" rows="5" class="imput10" id="comentario"></textarea> 
            </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input name="submit"  type="submit" class="botao10" id="submit"  value="Enviar">
            </td>
          </tr>
        </form>
      </table>
      <? } ?>
    </td>
  </tr>
  <tr class="verdana10"> 
    <td height="5"><p align="center" class="verdana10"><font color="000000" face="Verdana, Arial, Helvetica, sans-serif"><br>
        </font></p>
      <table width="96%" border="0" align="center" cellpadding="5" cellspacing="5" class="verdana10">
        <tr bgcolor="#fafafa"> 
          <td width="78%" bgcolor="#f2f2f2" class="verdana10"><strong><font color="000000" face="Verdana, Arial, Helvetica, sans-serif"><strong>Entre 
            em contato através dos telefones:</strong></font></strong></td>
        </tr>
        <tr bgcolor="#fafafa"> 
          <td class="verdana10"><strong><? echo $mec_telefones;?></strong></td>
        </tr>
      </table>
      <br> 
      <table width="96%" border="0" align="center" cellpadding="5" cellspacing="5" class="verdana10">
        <tr bgcolor="#f1f1f1"> 
          <td width="81%"> <div align="left" class="verdana10"><strong>Endere&ccedil;o:<font color="c90000"> 
              </font></strong></div></td>
        </tr>
        <tr align="center" bgcolor="#fafafa"> 
          <td class="verdana10"><div align="left"><strong><font color="c90000"><? echo $mec_rodape; ?></font></strong></div></td>
        </tr>
      </table>
      <p class="verdana10"></p></td>
  </tr>
</table>

