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







	function abresite(URL)



{



window.open(URL,'_blank','top=200,left=300, width=300 , height=200 ,status = yes, menubar = no, scrollbars = yes, location = no, resizable=yes');







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



<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>























  <?











$id = $_GET["id"];















include "conecta.php";



$sql = mysql_query("SELECT * FROM produtos where id=$id ORDER BY `produtos`.`id` ASC");







$linha = mysql_num_rows($sql);







while ($r = mysql_fetch_array($sql))



{



$id = $r['id'];



$foto1 = $r['foto1'];



$foto2 = $r['foto2'];



$foto3 = $r['foto3'];



$foto4 = $r['foto4'];



$data = $r['data'];



$nivel = $r['nivel'];



$titulo = $r['titulo'];



$texto = $r['texto'];



$detalhes = $r['detalhes'];



$categoria1 = $r['categoria'];
$subcategoria1 = $r['subcategoria'];
$outrascategorias = $r['outrascategorias'];



$valor_maior = $r['valor_maior'];



$valor_menor = $r['valor_menor'];

$disponivel  = $r['disponivel'];
$peso  = $r['peso'];
$quantidade  = $r['quantidade'];














echo "



";



}











?>



















































































<body onLoad="Iniciar()" bgcolor="#FFFFFF">







<link href="links_css.css" rel="stylesheet" type="text/css">



<link href="css.css" rel="stylesheet" type="text/css">
<h2 align="center"> <font face="Verdana, Arial, Helvetica, sans-serif"> Editar 
  Produtos: </font></h2>









<table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" class="verdana1" >
  <tr class="font_textos_medio_caixa_alta_negrito"> 
    <td bgcolor="f1f1f1"><div align="center"><strong>Formulario para alterar informa&ccedil;&otilde;es 
        no site:</strong></div></td>
  </tr>
  <tr class="font_textos_medio_caixa_alta_negrito"> 
    <td bgcolor="f1f1f1"> <div align="center"><span class="font_textos_medio_caixa_alta"><strong><br>
        Texto para descri&ccedil;&atilde;o completa</strong></span><br>
        <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#c2c2c2" bgcolor="#EFEDE1" >
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
            <td width="12%" bgcolor="#CCCCCC"> <div align="left"> <font size="1">Cod.</font> 
                <input name="check" type="checkbox" class="verdana" id="check6" onClick="mudaDiv()">
              </div></td>
          </tr>
          <tr bgcolor="#CCCCCC"> 
            <td colspan="8"> <div align="right" class="aparece" id="tabela"><font size="1">Tabela 
                <select name="tabela10" class="verdana" id="tabela10">
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
                  <option value="<tr><td></td><td></td><td></td></tr>">1 linha 
                  x 3 colunas</option>
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
            <td colspan="8"> </td>
          </tr>
          <tr> 
            <td colspan="8" class="verdana"> Texto Completo : 
              <iframe src="produtos_editar_descricao.php?id=<? echo $id; ?>" id="editor" frameborder="0" style="border:1px solid; width: 480px; height:350px" onBlur="ver()" class="some"> 
              </iframe> <div id="textarea" class="aparece"> <form  action=produtos_editar_update.php method=POST name="formEdit" id="formEdit" method="post"> 
                <div align="center"> 
                  <textarea name="texto" cols="58" rows="15" id="texto" onKeyup="ver1(event)"  ><? echo $detalhes; ?></textarea>
                </div>
              </div>
              <br> <br> </td>
          </tr>
        </table>
      </div></td>
  </tr>
  <tr> 
    <td><div align="center"><span class="font_textos_medio_caixa_alta"></span> 
        <?php echo "<input type=\"hidden\" name=\"id\" value=\"$id\" class=formularios_ggg_50px> "; ?></div></td>
  </tr>
  <tr> 
    <td bgcolor="f1f1f1"><div align="center"><br>
        <table class="negrito10" bgcolor="#CCCCCC" cellpadding="10" cellspacing="5">
          <tr valign="top" bgcolor="#FFFFFF" align="center"> 
            <? $esquerda1 ="<a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&mudaresquerda=foto1');\"><img src=L.gif border=0></a>";



			  	$direita1 = "<a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&mudardireita=foto1');\"><img src=R.gif border=0></a>";



			  if($foto1 == NULL){echo "<td ><a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&fotonova=foto1');\"><img src=inserirfotos.jpg border=0><br> Inserir </a></td>";} else { echo"<td> <img src=../imagens/pequena$foto1 width=50><br><a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&excluir=foto1');\"> Excluir </a></td>";}







		 if($foto2 == NULL){echo "<td><img src=inserirfotos.jpg border=0><br> <a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&fotonova=foto2');\"> Inserir </a> </td>";} else { echo"<td> <img src=../imagens/pequena$foto2 width=50><br></a><a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&excluir=foto2');\"> Excluir </a></td>";}







				   if($foto3 == NULL){echo "<td><img src=inserirfotos.jpg border=0><br><a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&fotonova=foto3');\"> Inserir </a> </td>";} else { echo"<td> <img src=../imagens/pequena$foto3 width=50><br></a><a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&excluir=foto3');\"> Excluir </a></td>";}







				   if($foto4 == NULL){echo "<td><img src=inserirfotos.jpg border=0><br> <a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&fotonova=foto4');\"> Inserir </a></td>";} else { echo"<td> <img src=../imagens/pequena$foto4 width=50><br></a><a href=\"#\" onClick=\"javascript: abresite('../imagens/mudarfoto.php?id=$id&excluir=foto4');\"> Excluir </a></td>";}



				   ?>
        </table>
        <br>
        <? echo "<center class=\"negrito10\">$esquerda1 Alterar a ordem das fotos $direita1<br>" ;?> 
      </div></td>
  </tr>
  <tr> 
    <td bgcolor="f1f1f1"><div align="center"><span class="font_textos_medio_caixa_alta"><strong>Titulo: 
        </strong></span><?php echo "<input type=\"text\" name=\"titulo\" value=\"$titulo\" size=\"30\"> "; ?></div></td>
  </tr>
  <tr> 
    <td bgcolor="f1f1f1"><div align="center"><span class="font_textos_medio_caixa_alta"><strong>C&oacute;digo 
        do produto</strong></span><br>
        <?php echo " <textarea name=\"texto1\" cols=\"20\" rows=\"5\" wrap=\"VIRTUAL\" class=formularios_gg>$texto</textarea> ";  ?></div></td>
  </tr>
  <tr> 
    <td bgcolor="f1f1f1"> <div align="center"><strong> <?php echo "<input type=\"hidden\" name=\"data\" value=\"$data\" class=formularios_g> "; ?></strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><span class="font_textos_medio_caixa_alta"><strong>Destaque 
        na pagina inicial? </strong></span><br>
        <?php







		if($nivel =="2"){



		echo "



        <input type=\"radio\" name=\"nivel\" value=\"1\" >



        <span class=\"font_textos_medio_caixa_alta\"><strong>Sim</strong></span>



        <input type=\"radio\" name=\"nivel\" value=\"2\" checked>



		  <span class=\"font_textos_medio_caixa_alta\"><strong>Não</strong></span>



		";



		}



		else



		{



		echo "



        <input type=\"radio\" name=\"nivel\" value=\"1\" checked>



        <span class=\"font_textos_medio_caixa_alta\"><strong>Sim</strong></span>



        <input type=\"radio\" name=\"nivel\" value=\"2\" >



		  <span class=\"font_textos_medio_caixa_alta\"><strong>Não</strong></span>



		";



		};











		?>
        <span class="font_textos_medio_caixa_alta"></span></div></td>
  </tr>
  <tr> 
    <td><div align="center"><span class="font_textos_medio_caixa_alta"><strong><br>
        </strong></span><span class="font_textos_medio_caixa_alta"><strong>Valor: 
        (Campo 'De' n&atilde;o obrigat&oacute;rio)<br>
        <br>
        De R$</strong></span> 
        <? $valor_maior1 = explode(".",$valor_maior); echo "<input type=\"text\" size=\"7\" name=\"valor_maior\" value=\"$valor_maior1[0]\" class=imput10 onKeyPress=\"javascript:return SomenteNumero(event);\"> , <input type=\"text\" size=\"2\"  value=\"$valor_maior1[1]\" name=\"valor_maior1\" class=imput10 onKeyPress=\"javascript:return SomenteNumero(event);\">"; ?>
        <span class="font_textos_medio_caixa_alta"><strong> Por R$</strong></span> 
        <? $valor_menor1 = explode(".",$valor_menor); echo "<input type=\"text\" size=\"7\" name=\"valor_menor\" value=\"$valor_menor1[0]\" class=imput10 onKeyPress=\"javascript:return SomenteNumero(event);\"> , <input type=\"text\" size=\"2\"  value=\"$valor_menor1[1]\" name=\"valor_menor1\" class=imput10 onKeyPress=\"javascript:return SomenteNumero(event);\"> "; ?>
        <span class="font_textos_medio_caixa_alta"><br>
        <br>
        </span></div></td>
  </tr></table>
 
<table align="center">
  <tr> 
    <td width="28%" bgcolor="#FFFFCC"><div align="center"><span class="font_textos_medio_caixa_alta"><strong><br>
        Produto dispon&iacute;vel na loja? </strong></span><br>
        <?php
		if($disponivel == "nao"){
		echo "
       <input type=\"radio\" name=\"dispo\" value=\"sim\" onClick=\"javascript:window.alert('A quantidade tem que ser maior que zero!!!');document.formEdit.quantidade.focus();document.formEdit.avisar.checked = true;\">
        <span class=\"font_textos_medio_caixa_alta\"><strong>Sim</strong></span>
        <input type=\"radio\" name=\"dispo\" value=\"nao\" checked onClick=\"javascript:document.formEdit.quantidade.value='0'\";>
	  <span class=\"font_textos_medio_caixa_alta\"><strong>Não</strong></span>
		";
		}
		else
		{
		echo "
        <input type=\"radio\" name=\"dispo\" value=\"sim\" checked onClick=\"javascript:window.alert('A quantidade tem que ser maior que zero!!!');document.formEdit.quantidade.focus();document.formEdit.avisar.checked = true;\">
        <span class=\"font_textos_medio_caixa_alta\"><strong>Sim</strong></span>
       <input type=\"radio\" name=\"dispo\" value=\"nao\" onClick=\"javascript:document.formEdit.quantidade.value='0'\";>
		  <span class=\"font_textos_medio_caixa_alta\"><strong>Não</strong></span>
		";
		};

	?>
      </div></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFA8"> <div align="center"><strong>Quantidade em estoque(Se 
        for igual a zero o produto ficar&aacute; indispon&iacute;vel na loja)<BR>
        <input name="quantidade" type="text" class="verdana1" id="quantidade" value="<? echo $quantidade;  ?>" size="5" maxlength="4" onBlur="javascript: if(this.value > 0){ document.formEdit.avisar.checked = true;}">
        <br>
        <br>
        (Só numeros )</strong> </div></td>
  </tr>
  <tr> 
    <td height="50"> <div align="center"><span class="font_textos_medio_caixa_alta"><strong>Categoria 
        Principal:</strong></span> 
        <?
$sql = mysql_query("SELECT * FROM menu_produtos ORDER BY `menu_produtos`.`categoria` ASC");
$linha = mysql_num_rows($sql);
echo"<select name=\"categoria\" class=\"verdana1\">";
echo "<option value=\"$categoria1-$subcategoria1\">$categoria1-$subcategoria1</option>";
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
      </div></td>
  </tr>
  <tr> 
    <td bgcolor="e8e8e8"> <div align="center"><span class="font_textos_medio_caixa_alta"><strong><a name="dados"></a>Categorias 
        adicionais:(campo n&atilde;o obrigat&oacute;rio)<br>
        </strong></span><br>
        <br>
        <span class="font_textos_medio_caixa_alta"><strong> </strong></span> 
        <table width="95%" border="0" cellpadding="5" cellspacing="1" bgcolor="#000000">
          <tr bgcolor="#CCCCCC"> 
            <td colspan="3" valign="top" class="verdana1"><strong>Colocar o produto 
              em outras categorias(*opcional)</strong></td>
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
              <textarea name="novascategorias" cols="65" rows="10" wrap="VIRTUAL" class="verdana1" id="novascategorias"><? echo $outrascategorias; ?></textarea>
              </strong></span></td>
          </tr>
        </table>
        <span class="font_textos_medio_caixa_alta"><strong> <br>
        Para retirar o produto de outras categorias , apague somente a linha de 
        'categorias escolhidas&quot; e clique em alterar. <br>
        </strong></span><br>
      </div></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"> <div align="center"><strong> <br>
        <div class=\"verdana\"> Peso aproximado<BR>
          <input name="peso" type="text" size="5" maxlength="4" class="verdana1" value="<? echo $peso; ?>">
          <br>
          <br>
          (Só numeros e pontos Ex: 0.3 kg ou 1.0 kg )</div>
        <br>
        <br>
        </strong></div></td>
  </tr>
</table> 
<div align="center">
  <input type=submit name=Enviar value=Alterar class=formularios_pequeno_para_botao_enviar></form> 
</div>
</body>







</html>





