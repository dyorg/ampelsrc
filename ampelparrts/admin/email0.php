<HTML>

<HEAD>
<TITLE></TITLE>
<script language=javascript>
function SomenteNumero(e){

   				 var tecla=(window.event)?event.keyCode:e.which;

    			if((tecla > 47 && tecla < 58)) return true;

				else{ return false;}  }


function Iniciar() {



       editor.document.designMode = 'On'



         document.forms["formEdit"].onsubmit=function(){

         document.getElementById("descricao").value=editor.document.body.innerHTML

         return true

        }

}

function ver() {

document.getElementById("descricao").value=editor.document.body.innerHTML

}

function ver1(e) {

editor.document.body.innerHTML=document.getElementById("descricao").value

}



function hr() {



    editor.document.execCommand('InsertHorizontalRule');

     }





	 function table() {

 var div = document.getElementById("tabela");

            div.className = "some";

     }



function table1(table1) {

var div = document.getElementById("tabela");

var tabela1 = document.getElementById("tabela10").value;

var tabela="<table style=\"width: 100%; border-collapse: collapse\" border=1 cellspacing=0 cellpadding=3 bordercolor=#000000 bgcolor=" + table1 +">" + tabela1 + "</table>";

    editor.document.body.innerHTML=editor.document.body.innerHTML + tabela;

	div.className = "aparece";

	document.getElementById("tabela10").value =" ";

	document.getElementById("cortabela").value =" ";

     }



	 function link1() {



    document.execCommand("CreateLink",null);

     }





	 function imagem() {

imagePath = prompt('Endereço da imagem:','http://');

editor.document.execCommand('InsertImage',false,imagePath);



     }





    function recortar() {

        editor.document.execCommand('cut', false, null);

    }



    function copiar() {

        editor.document.execCommand('copy', false, null);

    }



    function colar() {

        editor.document.execCommand('paste', false, null);

    }



    function desfazer() {

        editor.document.execCommand('undo', false, null);

    }



    function refazer() {

        editor.document.execCommand('redo', false, null);

    }



    function negrito() {

        editor.document.execCommand('bold', false, null);

    }



    function italico() {

        editor.document.execCommand('italic', false, null);

    }



    function sublinhado() {

        editor.document.execCommand('underline', false, null);

    }



    function alinharEsquerda() {

        editor.document.execCommand('justifyleft', false, null);

    }



    function centralizado()    {

        editor.document.execCommand('justifycenter', false, null);

    }



    function alinharDireita() {

        editor.document.execCommand('justifyright', false, null);

    }



    function justificado() {

        editor.document.execCommand('justifyfull', false, null);

    }



    function numeracao() {

        editor.document.execCommand('insertorderedlist', false, null);

    }



    function marcadores() {

        editor.document.execCommand('insertunorderedlist', false, null);

    }



    function fonte(fonte) {

        if(fonte != '')

            editor.document.execCommand('fontname', false, fonte);

    }



	  function cor(cor) {

        if(cor != '')

            editor.document.execCommand('forecolor', true,cor);

    }



	function fundocor(fundocor) {

        if(fundocor != '')

            editor.document.execCommand('backcolor', false,fundocor);

    }



    function tamanho(tamanho) {

        if(tamanho != '')

            editor.document.execCommand('fontsize', false, tamanho);

    }



	function mudaDiv() {

        var div = document.getElementById("textarea");

		var editor = document.getElementById("editor");

        var check = document.getElementById("check");

        if (check.checked) {

            div.className = "some";

			editor.className = "aparece";

        } else {

            div.className = "aparece";

			editor.className = "some";

        }

    }





</script>
<style><!--faz parte para mostrar o codigo fonte

.some {display: block;}

.aparece {display: none;}



--></style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

<!--
.verdana1 {

	font-family: Verdana, Arial, Helvetica, sans-serif;

	font-size: 10px;       }
.verdana {

	font-family: Verdana, Arial, Helvetica, sans-serif;

	font-size: 10px;

	background-color: #EFEDE1;

	padding: 1px;

	margin: 1px;

	border-top: 1px none #666666;

	border-right: 1px none #666666;

	border-bottom: 1px none #666666;

	border-left: 1px none #666666;

}

-->

</style>
</HEAD>





<body onLoad="Iniciar()" bgcolor="#FFFFFF">
<? include "conecta.php"; ?>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#c2c2c2" bgcolor="#EFEDE1" >
  <tr> 
    <td colspan="8"><form action="email1.php" name="formEdit" id="formEdit" method="post">
        <table width="100%" border="0" cellpadding="0">
          <tr bgcolor="#FFFFCC"> 
            <td>&nbsp;</td>
            <td><font size="1" face="Verdana">Newsletter: <br>
              <strong>Ajuda:</strong> <br>
              - Voc&ecirc; pode utilizar c&oacute;digos HTML em sua mensagem.<br>
              - Algumas TAGS &uacute;teis:<br>
              %NOME% = substitui pelo nome antes do @ no corpo ou no assunto.<br>
              (ex. joao@servidor.com = joao)<br>
              %EMAIL% = substitui pelo email do usu&aacute;rio no corpo ou no 
              assunto.<br>
              </font></td>
          </tr>
          <tr> 
            <td width="20%"><span class="verdana">De:</span></td>
            <td width="80%"><input name="de" type="text" class="verdana1" id="de3" value="s" size="70"></td>
          </tr>
          <tr> 
            <td><span class="verdana">para:<a href="?todos=todos"><b><br>
              Todos</b></a></span></td>
            <td><textarea name="para" cols="69" rows="5" wrap="VIRTUAL" class="verdana1" type="textarea" onBlur="cols=69,rows=4"  onFocus="cols=69,rows=15" ><? if(@$_GET["todos"]=="todos"){$sqly = mysql_query("SELECT * FROM news"); while($a = mysql_fetch_array($sqly))  { extract($a); if ($email != NULL) {echo "$email,";}} } ?></textarea></td>
          </tr>
          <tr> 
            <td><span class="verdana">Assunto:</span></td>
            <td><input name="assunto" type="text" class="verdana1" id="assunto3" size="70"></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td> <div id="textarea" class="aparece"> <span class="verdana"><strong>Código 
                fonte:</strong></span><br>
                <textarea name="descricao" cols="69" rows="5" wrap="VIRTUAL" class="verdana1" id="descricao"  onFocus="cols=69,rows=30" onBlur="cols=69,rows=5" onKeyUp="ver1(event)"></textarea>
              </div></td>
          </tr>
        </table>
      </form></td>
  </tr>
  <tr> 
    <td width="32%" align="center" bgcolor="#999999"> <div align="right"> 
        <select name="fonte" class="verdana" onChange="fonte(this.options[this.selectedIndex].value)">
          <option value="">Fonte</option>
          <option value="Arial">Arial</option>
          <option value="Courier">Courier</option>
          <option value="Sans Serif">Sans Serif</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Times New Roman">Times New Roman</option>
          <option value="Verdana">Verdana</option>
        </select>
        &nbsp; </div></td>
    <td width="18%" align="center" bgcolor="#CCCCCC"> <select name="tamanho" class="verdana" onChange="tamanho(this.options[this.selectedIndex].value)">
        <option value="">Tamanho</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
      </select></td>
    <td width="6%" align="center" bgcolor="#999999"><img src="editor/textcolor.gif" width="25" height="24"></td>
    <td width="10%" align="center" bgcolor="#999999"> <select name="cor" class="verdana" onChange="cor(this.options[this.selectedIndex].value)" >
        <option value="#000000" selected>></option>
        <option value="#000000" style="BACKGROUND-COLOR: #000000"></option>
        <option value="#ffffff" style="BACKGROUND-COLOR: #ffffff"></option>
        <option value="#ffff00" style="BACKGROUND-COLOR: #ffff00"></option>
        <option value="#0000FF" style="BACKGROUND-COLOR: #0000FF"></option>
        <option value="#00FF00" style="BACKGROUND-COLOR: #00FF00"></option>
        <option value="#FFD700" style="BACKGROUND-COLOR: #FFD700"></option>
        <option value="#00F5FF" style="BACKGROUND-COLOR: #00F5FF"></option>
        <option value="#E8E8E8" style="BACKGROUND-COLOR: #E8E8E8"></option>
        <option value="#FF3030" style="BACKGROUND-COLOR: #FF3030"></option>
        <option value="#8B7355" style="BACKGROUND-COLOR: #8B7355"></option>
        <option value="#FF00FF" style="BACKGROUND-COLOR: #FF00FF"></option>
        <option value="#FF69B4" style="BACKGROUND-COLOR: #FF69B4"></option>
        <option value="#FF1493" style="BACKGROUND-COLOR: #FF1493"></option>
        <option value="#20B2AA" style="BACKGROUND-COLOR: #20B2AA"></option>
        <option value="#CDAA7D" style="BACKGROUND-COLOR: #CDAA7D"></option>
      </select></td>
    <td width="6%" align="center" bgcolor="#CCCCCC"><img src="editor/bgcolor.gif" width="25" height="24"></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"> <select name="fundocor" class="verdana" onChange="fundocor(this.options[this.selectedIndex].value)">
        <option value="#ffffff" selected>></option>
        <option value="#000000" style="BACKGROUND-COLOR: #000000"></option>
        <option value="#ffffff" style="BACKGROUND-COLOR: #ffffff"></option>
        <option value="#ffff00" style="BACKGROUND-COLOR: #ffff00"></option>
        <option value="#0000FF" style="BACKGROUND-COLOR: #0000FF"></option>
        <option value="#00FF00" style="BACKGROUND-COLOR: #00FF00"></option>
        <option value="#FFD700" style="BACKGROUND-COLOR: #FFD700"></option>
        <option value="#00F5FF" style="BACKGROUND-COLOR: #00F5FF"></option>
        <option value="#E8E8E8" style="BACKGROUND-COLOR: #E8E8E8"></option>
        <option value="#FF3030" style="BACKGROUND-COLOR: #FF3030"></option>
        <option value="#8B7355" style="BACKGROUND-COLOR: #8B7355"></option>
        <option value="#FF00FF" style="BACKGROUND-COLOR: #FF00FF"></option>
        <option value="#FF69B4" style="BACKGROUND-COLOR: #FF69B4"></option>
        <option value="#FF1493" style="BACKGROUND-COLOR: #FF1493"></option>
        <option value="#20B2AA" style="BACKGROUND-COLOR: #20B2AA"></option>
        <option value="#CDAA7D" style="BACKGROUND-COLOR: #CDAA7D"></option>
      </select></td>
    <td width="6%" bgcolor="#CCCCCC"><div align="center"><img src="editor/table.gif" alt="Inserir tabela" width="20" height="20" style="cursor:hand" onClick="table();"></div></td>
    <td width="12%" bgcolor="#CCCCCC"> <div align="left"> <font size="1">Cod F</font> 
        <input name="check" type="checkbox" class="verdana" id="check6" onClick="mudaDiv()"/>
      </div></td>
  </tr>
  <tr bgcolor="#CCCCCC"> 
    <td colspan="8"> <div align="right" class="aparece" id="tabela"><font size="1">Tabela 
        <select name="tabela10" class="verdana" id="tabela10">
          <option value="">Linha x Coluna</option>
          <option value="<tr><td></td></tr>">1 linha x 1 coluna</option>
          <option value="<tr><td></td></tr><tr><td></td></tr>">2 linhas x 1 coluna</option>
          <option value="<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>">3 
          linhas x 1 coluna</option>
          <option value="<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>">4 
          linhas x 1 coluna</option>
          <option value="<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>">5 
          linhas x 1 coluna</option>
          <option value=""></option>
          <option value="<tr><td></td><td></td></tr>">1 linha x 2 colunas</option>
          <option value="<tr><td></td><td></td></tr><tr><td></td><td></td></tr>">2 
          linhas x 2 colunas</option>
          <option value="<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>">3 
          linhas x 2 colunas</option>
          <option value="<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>">4 
          linhas x 2 colunas</option>
          <option value="<tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>">5 
          linhas x 2 colunas</option>
          <option value=""></option>
          <option value="<tr><td></td><td></td><td></td></tr>">1 linha x 3 colunas</option>
          <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">2 
          linhas x 3 colunas</option>
          <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">3 
          linhas x 3 colunas</option>
          <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">4 
          linhas x 3 colunas</option>
          <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">5 
          linhas x 3 colunas</option>
          <option value=""></option>
          <option value="<tr><td></td><td></td><td></td><td></td></tr>">1 linha 
          x 4 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>">2 
          linhas x 4 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>">3 
          linhas x 4 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>">4 
          linhas x 4 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>">5 
          linhas x 4 colunas</option>
          <option value=""></option>
          <option value="<tr><td></td><td></td><td></td><td></td><td></td></tr>">1 
          linha x 5 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr>">2 
          linhas x 5 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr>">3 
          linhas x 5 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr>">4 
          linhas x 5 colunas</option>
          <option value="<tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr>">5 
          linhas x 5 colunas</option>
        </select>
        Cor 
        <select name="cortabela"  class="verdana" onChange="table1(this.options[this.selectedIndex].value)" id="cortabela">
          <option value="#ffffff" selected>></option>
          <option value="#000000" style="BACKGROUND-COLOR: #000000"></option>
          <option value="#ffffff" style="BACKGROUND-COLOR: #ffffff"></option>
          <option value="#ffff00" style="BACKGROUND-COLOR: #ffff00"></option>
          <option value="#0000FF" style="BACKGROUND-COLOR: #0000FF"></option>
          <option value="#00FF00" style="BACKGROUND-COLOR: #00FF00"></option>
          <option value="#FFD700" style="BACKGROUND-COLOR: #FFD700"></option>
          <option value="#00F5FF" style="BACKGROUND-COLOR: #00F5FF"></option>
          <option value="#E8E8E8" style="BACKGROUND-COLOR: #E8E8E8"></option>
          <option value="#FF3030" style="BACKGROUND-COLOR: #FF3030"></option>
          <option value="#8B7355" style="BACKGROUND-COLOR: #8B7355"></option>
          <option value="#FF00FF" style="BACKGROUND-COLOR: #FF00FF"></option>
          <option value="#FF69B4" style="BACKGROUND-COLOR: #FF69B4"></option>
          <option value="#FF1493" style="BACKGROUND-COLOR: #FF1493"></option>
          <option value="#20B2AA" style="BACKGROUND-COLOR: #20B2AA"></option>
          <option value="#CDAA7D" style="BACKGROUND-COLOR: #CDAA7D"></option>
        </select>
        </font> </div></td>
  </tr>
  <tr> 
    <td colspan="8"> <div align="center"><img src="editor/negrito.gif" alt="Negrito" width="23" height="25" style="cursor:hand" onClick="negrito()"><img src="editor/italico.gif" alt="Italico" width="23" height="25" style="cursor:hand" onClick="italico()"> 
        <img src="editor/sublinhado.gif" alt="Sublinhado" width="25" height="25" style="cursor:hand" onClick="sublinhado()"> 
        <img src="editor/alinhamentoesquerda.gif" alt="Alinhar a esquerda" width="24" height="25" style="cursor:hand" onClick="alinharEsquerda();"> 
        <img src="editor/centralizado.gif" alt="Alinhar ao centro" width="24" height="25" style="cursor:hand" onClick="centralizado()"> 
        <img src="editor/alinhamentodireita.gif" alt="Alinhar a direita" width="26" height="25" style="cursor:hand" onClick="alinharDireita()"> 
        <img src="editor/justificado.gif" alt="Justificar" width="25" height="25" style="cursor:hand" onClick="justificado()"><img src="editor/recortar.gif" alt="Recortar" width="27" height="25" style="cursor:hand" onClick="recortar()"> 
        <img src="editor/colar.gif" alt="Copiar" width="25" height="25" style="cursor:hand" onClick="colar()"><img src="editor/copiar.gif" alt="Colar" width="25" height="25" style="cursor:hand" onClick="copiar()"><img src="editor/numeracao.gif" alt="Lista" width="26" height="25" style="cursor:hand" onClick="numeracao()"> 
        <img src="editor/marcador.gif" alt="Lista" width="24" height="25" style="cursor:hand" onClick="marcadores()"> 
        <img src="editor/link.gif" alt="Link" width="25" height="24" style="cursor:hand" onClick="link1()"> 
        <img src="editor/image.gif" alt="Imagem" width="25" height="24" style="cursor:hand" onClick="imagem()"> 
        <img src="editor/hr1.gif" alt="Linha" width="22" height="22" style="cursor:hand" onClick="hr()"> 
        <img src="editor/desfazer.gif" alt="Voltar" width="24" height="25" style="cursor:hand" onClick="desfazer()"> 
        <img src="editor/refazer.gif" alt="Avancar" width="26" height="25" style="cursor:hand" onClick="refazer()"></div></td>
  </tr>
  <tr> 
    <td colspan="8"><center>
        <iframe id="editor" frameborder="0" style="border:1px solid; width: 480px; height:350px" onBlur="ver()" class="some">aa 
        </iframe>
      </center></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td colspan="8"> <div align="center"><br>
        <input name="submit" type="submit" class="verdana1" onClick="javascript:document.forms[0].submit();" value="Enviar">
      </div></td>
  </tr>
</table>















  </body>

</html>



