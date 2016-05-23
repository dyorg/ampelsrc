<HTML>

<HEAD>
<TITLE></TITLE>
<script language=javascript>

function insere(string)
{
document.getElementById("novascategorias").value=string + document.getElementById("novascategorias").value

}

function SomenteNumero(e){

   				 var tecla=(window.event)?event.keyCode:e.which;

    			if((tecla > 47 && tecla < 58)) return true;

				else{ return false;}  }


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
<p class="verdana">Inserir produto:</p>
<form name = "form0" method = "post" enctype = "multipart/form-data" action="../imagens/produtos_inserir_include.php">

  <p>

<br>    <input type = "file" name = "arquivo1" class="verdana1">

<br>    <input type = "file" name = "arquivo2" class="verdana1">

<br>    <input type = "file" name = "arquivo3" class="verdana1">

<br>    <input type = "file" name = "arquivo4" class="verdana1"><br>





    <input type = "submit" name = "Submit" value = "Carregar Foto " class="verdana1">

  </p>

</form>




<p class="verdana">Para utilizar a mesma foto que foi carregada, clique em cima da foto e arraste para a área de texto:</p><br>

<body onLoad="Iniciar()" bgcolor="#FFFFFF">
<table>
  <tr>
    <td colspan="8" class="verdana" ><table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#c2c2c2" bgcolor="#EFEDE1" >
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
          <td width="12%" bgcolor="#CCCCCC"> <div align="left"> <font size="1">Cod 
              F</font> 
              <input name="check" type="checkbox" class="verdana" id="check" onClick="mudaDiv()"/>
            </div></td>
        </tr>
        <tr bgcolor="#CCCCCC"> 
          <td colspan="8"> <div align="right" class="aparece" id="tabela"><font size="1">Tabela 
              <select name="tabela10" class="verdana" id="select">
                <option value="">Linha x Coluna</option>
                <option value="<tr><td></td></tr>">1 linha x 1 coluna</option>
                <option value="<tr><td></td></tr><tr><td></td></tr>">2 linhas 
                x 1 coluna</option>
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
                <option value="<tr><td></td><td></td><td></td></tr>">1 linha x 
                3 colunas</option>
                <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">2 
                linhas x 3 colunas</option>
                <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">3 
                linhas x 3 colunas</option>
                <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">4 
                linhas x 3 colunas</option>
                <option value="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>">5 
                linhas x 3 colunas</option>
                <option value=""></option>
                <option value="<tr><td></td><td></td><td></td><td></td></tr>">1 
                linha x 4 colunas</option>
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
              <select name="cortabela"  class="verdana" onChange="table1(this.options[this.selectedIndex].value)" id="select2">
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
          <td colspan="8"> </td>
        </tr>
        <tr></table>
    </td>
  </tr>
  <tr> 
    <td colspan="8" class="verdana" > <form action="cadastrando_foto_produtos.php" name="formEdit" id="formEdit" method="post">
        Texto Completo :<br>
        <iframe id="editor" frameborder="0" style="border:1px solid; width: 480px; height:350px" onBlur="ver()" class="some"> 
        </iframe>
        <br>
        <div id="textarea" class="aparece"> 
          <textarea name="texto" cols="58" rows="5" id="texto" onKeyup="ver1(event)" onBlur="cols=58,rows=5"  onFocus="cols=58,rows=30"></textarea>
        </div>
        <?
		  $data1 = date('d-m-Y');
		  	echo "Data:<br>
<input type=\"text\" name=\"data\"  value=\"$data1\" class=verdana1><br><br>
Titulo:<BR>
<input type=\"text\" name=\"titulo\" size=\"70\" class=verdana1><br><br>
Código do produto:<BR>
<input type=\"text\" name=\"detalhes\" size=\"70\" class=verdana1><br><br>
<div class=\"verdana\"> Destaque na Primeira Página ?<BR>
  <input type=\"radio\" name=\"nivel\" value=\"1\">
  Sim
  <input type=\"radio\" name=\"nivel\" value=\"2\">
  Não</div><br>  <div> 
  <div class=\"verdana\"> Peso aproximado<BR>
  <input name=\"peso\" type=\"text\" size=\"5\" maxlength=\"4\" class=verdana1> (Só numeros e pontos Ex: 0.3 kg ou 1.0 kg )</div>
  
  <br>

   <div class=\"verdana\">Quantidade disponível em estoque<BR>
  <input name=\"quantidade\" type=\"text\" size=\"5\" maxlength=\"4\" class=verdana1 value=1> (Só numeros)</div>
  
  <br>
  <div class=\"verdana\"> Valor Promocional, Dê:<BR>

<input type=\"text\" size=\"7\" name=\"valor_maior\" class=verdana1 onKeyPress=\"javascript:return SomenteNumero(event);\"> ,

<input type=\"text\" size=\"2\"  value=\"00\" name=\"valor_maior1\" class=verdana1 onKeyPress=\"javascript:return SomenteNumero(event);\">

</div>
<P>
<P>
<div class=\"verdana\"> Valor Promocional, Por:<BR>
<input type=\"text\" size=\"7\" name=\"valor_menor\" class=verdana1 onKeyPress=\"javascript:return SomenteNumero(event);\"> ,
<input type=\"text\" size=\"2\"  value=\"00\" name=\"valor_menor1\" class=verdana1 onKeyPress=\"javascript:return SomenteNumero(event);\" >
</div>
<P>
	<input type=\"hidden\" name=\"foto1\" value=\"$foto0\" class=\"verdana\">
<input type=\"hidden\" name=\"foto2\" value=\"$foto1\" class=\"verdana\">
<input type=\"hidden\" name=\"foto3\" value=\"$foto2\" class=\"verdana\">
<input type=\"hidden\" name=\"foto4\" value=\"$foto3\" class=\"verdana\">
Categoria Principal:<br>";
include "conecta.php";
$sql = mysql_query("SELECT * FROM menu_produtos ORDER BY `categoria` ASC");
$linha = mysql_num_rows($sql);
echo"<select name=\"categoria\" class=\"verdana1\">";
while ($r = mysql_fetch_array($sql))
{
$categoria = $r['categoria'];
$sub = $r['subcategoria'];
$catx="$categoria-$sub\\n";
$categoriaxx.="<a href=\"#dados\" onclick= \"javascript: return insere('$catx')\">.: $categoria » $sub</a><br>";

echo "<option value=\"$categoria-$sub\">$categoria-$sub</option>";
}
echo"</select>";
?> 
        <br>
        <br>
        <br>
        <table width="95%" border="0" cellpadding="5" cellspacing="1" bgcolor="#000000">
          <tr bgcolor="#CCCCCC"> 
            <td colspan="3" valign="top" class="verdana1"><strong><span class="font_textos_medio_caixa_alta"><strong><a name="dados"></a></strong></span>Colocar 
              o produto em outras categorias(*opcional)</strong></td>
          </tr>
          <tr bgcolor="#FFFF33"> 
            <td width="27%" valign="top" bgcolor="#f2f2f2"><span class="verdana1"><strong> 
              categorias &raquo; subcategorias </strong></span></td>
            <td width="2%" valign="top" bgcolor="#000000">&nbsp;</td>
            <td width="46%" valign="top" bgcolor="#f2f2f2"> <div align="center"> 
                <p class="verdana1"><strong>Categorias escolhidas. </strong></p>
              </div></td>
          </tr>
          <tr> 
            <td valign="top" bgcolor="#fafafa" class="verdana1"> <div id="Layer1" style=" width:340px; height:125px; z-index:1; visibility: inherit; overflow: auto; left: 34px; top: 47px;"> 
                <?
echo "$categoriaxx";
?>
              </div></td>
            <td bgcolor="#000000" class="verdana1">&nbsp;</td>
            <td bgcolor="#fafafa"><span class="font_textos_medio_caixa_alta"><strong> 
              <textarea name="novascategorias" cols="65" rows="10" wrap="VIRTUAL" class="verdana1" id="novascategorias"></textarea>
              </strong></span>

			  </td>
          </tr>
        </table>
        <br></div>			                 
        <input type="submit" value="Salvar" class="verdana1">
      </form></td>
  </tr>
</table>



<p class="verdana">Todos os direitos reservados Guimaster</p>









</body>

</html>



