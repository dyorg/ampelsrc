<script type="text/javascript">
function mostrarfoto()
{
document.getElementById("telapreta").className = "some1";
document.getElementById("telafoto").className = "some1";
document.body.style.overflow="hidden";
}

function somefoto()
{
document.getElementById("telapreta").className = "aparece1";
document.getElementById("telafoto").className = "aparece1";
}
</script>

<style><!--faz parte para mostrar o codigo fonte 
.some1 {display: block;}
.aparece1 {display: none;}
--></style>


<link href="css.css" rel="stylesheet" type="text/css"> 
<link href="links_css.css" rel="stylesheet" type="text/css">
     
	   <? $id = $_GET["id"];
include "conecta.php";
$sql = mysql_query("SELECT * FROM produtos WHERE id = $id");
$r = mysql_fetch_array($sql);
extract($r);
 ?>



<div id="telapreta" style="filter: alpha(opacity:0.5);KHTMLOpacity: 0.5;MozOpacity: 0.5;-khtml-opacity: .50;-moz-opacity:.50;filter: alpha(opacity=50);opacity: .50; position:absolute; right:0px; left:0px; top:0px; width:2000px; height:2000px; z-index:0; overflow: visible; background-color: #000000; layer-background-color: #000000; border: 1px none #000000;" class="aparece1"></div>
<div id="telafoto" style="position:absolute; left:50%; top:50%; width:500px; height:500px; margin-left:-250px; margin-top:-250px;  z-index:1; overflow: visible; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000;" class="aparece1"><div align="right"><a href="javascript:somefoto();" onClick="document.body.style.overflow='auto'"><img src="cesta_remover.gif" border="0"></a></div><iframe src="foto2.php?id=<? echo $id; ?>&fot=<? echo $foto1; ?>" name="foto" width="500" marginwidth="0" height="480" marginheight="0" scrolling="no" frameborder="0"></iframe></div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td> <div align="right"> </div>
      <link href="css.css" rel="stylesheet" type="text/css"> <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tr> 
          <td width="80%" height="30" background="fundocinza.jpg" class="negrito12"><? echo "$categoria » $subcategoria";?></td>
          <td width="20%" background="fundocinza.jpg" class="negrito12"> 
            <div align="right"></div></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#fcfcfc">
        <tr> 
          <td width="25%" align="center" valign="top"> <div align="left"> <?php echo "<a href=\"#\" onClick=\"javascript:mostrarfoto();\"><img alt=\"$titulo\" title=\"$titulo\" border=0  src=imagens/grande";



								 if ($foto1 != ""){echo "$foto1"; $fotogeral = $foto1;}



									else



									{if ($foto2 != ""){echo "$foto2"; $fotogeral = $foto2;}



										else



										{if ($foto3 != ""){echo "$foto3"; $fotogeral = $foto3;}



											else



											{if ($foto4 != ""){echo "$foto4"; $fotogeral = $foto4;}



												else



												{echo "sem_imagem.jpg"; $fotogeral = "sem_imagem.jpg";



												}



											}			



										}



									};

						 echo "></a>";


?> </div></td>
          <td valign="top" bordercolor="#000000" bgcolor="#f9f9f9"> <div align="left" class="verdana10"> 
              <br>
              <span class="verdana14"><? echo $titulo;?></span><br>
              <font color="#666666"> <? echo "Código: $texto";?></font><br>
              <br>
                    <? 
	  /*
		  					       if($valor_maior != ".00") { echo "
    <font color=#999999 size=1 face=verdana> De R$ <strike>". number_format($valor_maior, 2, ',','.')."</strike> <br> Por</font>
  ";}
      if(!empty($valor_menor)) { echo "
	<font color=#c90000 size=2 face=verdana><b>R$ " . number_format($valor_menor, 2, ',','.')." </b> </font><br>
   ";}  */
   
      echo "Sob Consulta";?>
              <?
			  //atualiza a opcao de disponivel para 'nao' caso nao tenha produto 
			  if (empty($quantidade)) {mysql_query("UPDATE produtos SET disponivel = 'nao' WHERE id = '$id'"); } 
			  ?>
              <form name="form1" method="post" action="produto2.php">
                <br>
                <br>
                <!--  <input name="Submit" type="image" value="Submit" src="bt_comprar.gif"> !-->
                <p></p>
                <input type="hidden"size="20" name="foto" value="<? echo $fotogeral ; ?>">
                <input type="hidden" size="20"name="produto" value="<? echo $titulo; ?>">
                <input type="hidden" size="20" name="valor" value="<? echo $valor_menor; ?>">
                <input type="hidden" size="20" name="peso" value="<? echo $peso; ?>">
                <input type="hidden" size="20" name="id" value="<? echo $id; ?>">
              </form>

              <p> <a href="#" onClick="javascript:window.open('email1.php?id=<? echo $id ; ?>&produto=<? echo $titulo; ?>&foto=<? echo $fotogeral; ?>&valor=<? echo number_format($valor_menor, 2, ',','.'); ?>','_blank','top=0,left=0, width=350 , height=450,status = yes, menubar = no, scrollbars = yes, location = no, resizable=yes');"> 
                <br>
                <img src="btduvidas.png" width="100" height="23" border="0"></a> 
                <a href="#" onClick="javascript:window.open('email.php?id=<? echo $id ; ?>&produto=<? echo $titulo; ?>&foto=<? echo $fotogeral; ?>&valor=<? echo number_format($valor_menor, 2, ',','.'); ?>','_blank','top=0,left=0, width=350 , height=500,status = yes, menubar = no, scrollbars = yes, location = no, resizable=yes');"><img src="btrecomende.png" width="100" height="23" border="0"></a> 
              </p>
            </div></td>
        </tr>
      </table>
      <?



						







if(!$foto2)



{}



else



{



echo"<a href=\"#\" onClick=\"javascript:mostrarfoto();\"><img src=\"imagens/pequena$foto2\" alt=\"$titulo\" title=\"$titulo\" width=\"70\" height=\"70\" border=\"0\"   >        </a>";







}







if(!$foto3)



{}



else



{



echo" <a href=\"#\" onClick=\"javascript:mostrarfoto();\"><img src=\"imagens/pequena$foto3\" alt=\"$titulo\" title=\"$titulo\" width=\"70\" height=\"70\" border=\"0\"   >        </a>";







}







if(!$foto4)



{}



else



{



echo"<a href=\"#\" onClick=\"javascript:mostrarfoto();\"><img src=\"imagens/pequena$foto4\" alt=\"$titulo\" title=\"$titulo\" width=\"70\" height=\"70\" border=\"0\"   >        </a>";







}











?>
      <div align="left"><a name="descricao"></a> <br>
      </div>
	 <? if($detalhes){ ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="85%" height="20" background="fundocinza.jpg" class="verdana10"><strong>Descri&ccedil;&atilde;o 
            do item</strong></td>
          <td width="15%" background="fundocinza.jpg"> 
            <div align="right">
              <p>&nbsp;</p>
            </div></td>
        </tr>
        <tr bgcolor="fafafa"> 
          <td colspan="2"><br>
            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td valign="top" class="verdana12"><? echo $detalhes;?></td>
              </tr>
            </table>
            <br> </td>
        </tr>
      </table> <? } ?>
      <br> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="85%" height="20" background="fundocinza.jpg" class="verdana10"><strong>Veja 
            tamb&eacute;m</strong></td>
          <td width="15%" background="fundocinza.jpg"> 
            <div align="right">
              <p>&nbsp;</p>
            </div></td>
        </tr>
        <tr bgcolor="fafafa"> 
          <td colspan="2"><font face="vernada" size="2">&nbsp; </font> <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td class="verdana12"> 
                  <?



							$sql1 = mysql_query("SELECT * FROM produtos WHERE id !='$_GET[id]' ORDER BY RAND() LIMIT 3");

$num=0;

echo"<table cellspacing=10 cellpadding=2 width=100% align=center class=verdana10><tr>";

while ($r1=mysql_fetch_array($sql1)) {



extract($r1);







 if ($foto1 != ""){$fotogeral = $foto1;}

									else

									{if ($foto2 != ""){$fotogeral = $foto2;}

										else

										{if ($foto3 != ""){$fotogeral = $foto3;}

											else

											{if ($foto4 != ""){$fotogeral = $foto4;}

												else

												{ $fotogeral = "sem_imagem.jpg";

												}

											}

										}

									};







 if($num < 3 ) {
 $categoriax = str_replace(" ", "%20", $_GET["categoria"]);
            echo "<td bgcolor=#ffffff width=33%><center><a href=produtos_detalhes.php?id=$id> <b> $titulo </b><br>

<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\"><img src=imagens/pequena$fotogeral border=\"0\" width=100><br>";





						      		  					      

  }





         if($num == 3) {

            $num = 0;}

			$num++;













            }

			echo"</tr></table>";

			//contador de visitas

			$mais = $visitas + 1;

$resultado = mysql_query("UPDATE produtos SET visitas = '$mais' WHERE id = '$id'");



							?>
                </td>
              </tr>
            </table>
            <br> </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><br> <br> </td>
  </tr>
</table>
