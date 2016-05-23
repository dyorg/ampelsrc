<HTML>

<HEAD>

<TITLE> </TITLE>

<script language=javascript>

function Iniciar() {



       editor.document.designMode = 'On'



         document.forms["formEdit"].onsubmit=function(){

         document.getElementById("texto").value=editor.document.body.innerHTML

         return true

        }

}

function ver() {

document.getElementById("texto").value=editor.document.body.innerHTML

}

function ver1(e) {

editor.document.body.innerHTML=document.getElementById("texto").value

}



function hr() {



    editor.document.execCommand('InsertHorizontalRule'); 

     }

	 

function table(string) {

var tabela="<table style=\"width: 100%; border-collapse: collapse\" border=1 cellspacing=0 cellpadding=3 bordercolor=#000000>" + string + "</table>";

    editor.document.body.innerHTML=editor.document.body.innerHTML + tabela;

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

.verdana {

	font-family: Verdana, Arial, Helvetica, sans-serif;

	font-size: 10px;

	background-color: #f2f2f2;

	border-top: none;

	border-right: none;

	border-bottom: none;

	border-left: none;

}

-->

</style>

</HEAD>





<body onLoad="Iniciar()" bgcolor="#FFFFFF">

<table width="450" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#c2c2c2" bgcolor="#EFEDE1" >

  <tr> 

    <td width="33%" align="center" bgcolor="#999999"> <div align="right">

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

    <td width="14%" align="center" bgcolor="#CCCCCC"> <select name="tamanho" class="verdana" onChange="tamanho(this.options[this.selectedIndex].value)">

        <option value="">Tamanho</option>

        <option value="1">1</option>

        <option value="2">2</option>

        <option value="3">3</option>

        <option value="4">4</option>

        <option value="5">5</option>

        <option value="6">6</option>

		<option value="7">7</option>

      </select></td>

    <td width="6%" align="center" bgcolor="#999999"><img src="textcolor.gif"></td>

    <td width="11%" align="center" bgcolor="#999999"> <select name="cor" class="verdana" onChange="cor(this.options[this.selectedIndex].value)" >

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

    <td width="6%" align="center" bgcolor="#CCCCCC"><img src="bgcolor.gif"></td>

    <td width="11%" align="center" bgcolor="#CCCCCC"> <select name="fundocor" class="verdana" onChange="fundocor(this.options[this.selectedIndex].value)">

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

    <td width="8%" bgcolor="#CCCCCC"><div align="center"><img src="table.gif" alt="Inserir tabela"></div></td>

    <td width="11%" bgcolor="#CCCCCC"> <div align="left">

        <select name="select" class="verdana" onChange="table(this.options[this.selectedIndex].value)" >

          <option value="">></option>

          <option value="<tr><td></td></tr>">1x1</option>

		   <option value="<tr><td width=50%></td><td width=50%></td></tr>">2x1</option>

		   <option value="<tr><td></td><td></td><td></td></tr>">3x1</option>

		   <option value="<tr><td></td><td></td><td></td><td></td></tr>">4x1</option>

		   <option value="<tr><td></td><td></td><td></td><td></td><td></td></tr>">5x1</option>

          

        </select>

      </div></td>

  </tr>

  <tr> 

    <td colspan="8"> <div align="center"><img src="negrito.gif" alt="Negrito" style="cursor:hand" onClick="negrito()"><img src="italico.gif" alt="Italico" style="cursor:hand" onClick="italico()"> 

        <img src="sublinhado.gif" alt="Sublinhado" style="cursor:hand" onClick="sublinhado()"> 

        <img src="alinhamentoesquerda.gif" alt="Alinhar a esquerda" style="cursor:hand" onClick="alinharEsquerda();"> 

        <img src="centralizado.gif" alt="Alinhar ao centro" style="cursor:hand" onClick="centralizado()"> 

        <img src="alinhamentodireita.gif" alt="Alinhar a direita" style="cursor:hand" onClick="alinharDireita()"> 

        <img src="justificado.gif" alt="Justificar" style="cursor:hand" onClick="justificado()"><img src="recortar.gif" alt="Recortar" style="cursor:hand" onClick="recortar()"> 

        <img src="colar.gif" alt="Copiar" style="cursor:hand" onClick="colar()"><img src="copiar.gif" alt="Colar" style="cursor:hand" onClick="copiar()"><img src="numeracao.gif" alt="Lista" style="cursor:hand" onClick="numeracao()"> 

        <img src="marcador.gif" alt="Lista" style="cursor:hand" onClick="marcadores()"> 

        <img src="link.gif" alt="Link" style="cursor:hand" onClick="link1()"> 

        <img src="image.gif" alt="Imagem" style="cursor:hand" onClick="imagem()"> 

        <img src="hr1.gif" alt="Linha" width="22" height="22" style="cursor:hand" onClick="hr()"> 

        <img src="desfazer.gif" alt="Voltar" style="cursor:hand" onClick="desfazer()"> 

        <img src="refazer.gif" alt="Avancar" style="cursor:hand" onClick="refazer()"></div></td>

  </tr>

  <tr>

    <td colspan="8"> <div align="right"><font size="1">Codigo Fonte</font> 

        <input name="check" type="checkbox" class="verdana" id="check6" onClick="mudaDiv()"/>

      </div></td>

  </tr>

  <tr> 

    <td colspan="8"><center>

        <form action="pegatexto.php" name="formEdit" id="formEdit" method="post">

          <iframe id="editor" frameborder="0" style="border:1px solid; width: 480px; height:350px" onBlur="ver()" class="some">

          </iframe>

          <div id="textarea" class="aparece"> 

            <textarea name="texto" cols="58" rows="5" id="texto" onKeyup="ver1(event)" onBlur="cols=58,rows=5"  onFocus="cols=58,rows=30"></textarea>

          </div>

          <br>

          <input type="submit" value="Salvar" />

        </form>

      </center></td>

  </tr>

</table>













</body>

</html>



