<?
session_start();
session_destroy();
?>
<html>
<head>
<link href="css.css" rel="stylesheet" type="text/css" />
<script> 
    function mudaPadrao(){ 
      document.meuFormulario.nome.focus(); 
    } 
   </script> 


</head>
<BODY topmargin="0" marginheight="0" onLoad="javascript:mudaPadrao();"">
<form method="POST" action="conferesenha.php" name="meuFormulario">
  <table width="100%" height="100%" border="0" cellspacing="2">
    <tr> 
      <td height="20"><img src="banerpainel.jpg" width="436" height="62"></td>
    </tr>
    <tr>
      <td height="15" bgcolor="#f2f2f2" class="tabelaverdana">&nbsp;</td>
    </tr>
    <tr> 
      <td bgcolor="#e2e2e2"> <br> <br> 
        <table width="25%" border="0" align="center" cellspacing="0" bgcolor="#FFFFFF">
          <tr> 
            <td width="17%" class="tabelaverdana">&nbsp;</td>
            <td width="78%" class="tabelaverdana">Logar </td>
          </tr>
          <tr> 
            <td><span class="negrito10">nome</span></td>
            <td><input name="nome" type="text" class="imput10" size="30" onFocus="style.backgroundColor='#ffff99'" onBlur="style.backgroundColor=''"></td>
          </tr>
          <tr> 
            <td><span class="negrito10">senha</span></td>
            <td> <input name="senha" type="password" class="imput10" size="30" onFocus="style.backgroundColor='#ffff99'" onBlur="style.backgroundColor=''">
            </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input name="submit" type="submit" class="imput10" value="Logar"></td>
          </tr>
          <tr> 
            <td class="tabelaverdana">&nbsp;</td>
            <td class="tabelaverdana">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td height="15" class="tabelaverdana">Copyright &copy; 2010, Todos os direitos 
        reservados By Guimaster</td>
    </tr>
  </table>
</form>
</body>
</html>
