
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="font_textos_medio"> <p class="font_textos_medio"> 
        <?
include "conecta.php";
         $palavra= $_POST['palavra'];

          
        $palavrax = str_replace(" ", "%", $palavra);
        /* Altera os espaços adicionando no lugar o simbolo % */


		$qr = "SELECT * FROM produtos WHERE texto LIKE '%".$palavrax."%' order by titulo ASC";





        // Executa a query no Banco de Dados



        $sql = mysql_query($qr);







        // Conta o total ded resultados encontrados



        $total = mysql_num_rows($sql);







        echo "<p class=\"negrito10\">Sua busca retornou <b>'$total'</b> resultados.</p>";




if($total == 0)
{
echo "<p class=\"negrito10\"><a href=index.php?conteudo=buscar_advance><u>Clique aqui</u></a> para fazer uma busca avançada.</p>";
}

else{
?>

      <table width="100%" border="0" cellpadding="5" cellspacing="0" >
        <tr class="negrito10""> 
          <td width="5%" align="center" background="fundocinza.jpg">Foto</td>
          <td width="10%" align="center" background="fundocinza.jpg" bgcolor="#CCCCCC">C&oacute;digo</td>
          <td width="30%" background="fundocinza.jpg" bgcolor="#CCCCCC">Descri&ccedil;&atilde;o</td>
          <td width="15%" align="center" background="fundocinza.jpg" bgcolor="#CCCCCC">Fabricante</td>
          <td width="20%" align="center" background="fundocinza.jpg" bgcolor="#CCCCCC">Montadora</td>
          <td width="5%" align="center" background="fundocinza.jpg" bgcolor="#CCCCCC">Qtde</td>
          <td width="15%" align="center" background="fundocinza.jpg" bgcolor="#CCCCCC"> 
            <div align="center">Pre&ccedil;o</div></td>
        </tr>
        <?

   while($r = mysql_fetch_array($sql)) {



extract($r);
$categoriax = str_replace(" ", "%20", $categoria);
?>
        <tr class="verdana10"> 
          <td> <? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\">"; ?> 
            <img src="<? echo "imagens/pequena"; 

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

	

	?>" border="0" width="50"><? echo "</a>"; ?></td>
          <td><? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\">$texto</a>"; ?></td>
          <td><? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\"><strong>$titulo</strong></a>"; ?></td>
          <td align="center"><? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\">$subcategoria</a>"; if(empty($subcategoria)){ echo "-";}?> 
          </td>
          <td align="center"><? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\">$categoria</a>"; if(empty($categoria)){ echo "-";}?></td>
          <td align="center"><? //echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\">$quantidade</a>"; ?>-</td>
          <td> <div align="center" class="negrito10"><? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoria class=\"link_topada\">";?> 
              <? 





/*

						  



						       if($valor_maior != ".00") { echo "



    <font color=#999999 size=1 face=verdana> De R$ <strike>". number_format($valor_maior, 2, ',','.')."</strike><br> Por</font>



 



  ";}



  



      if(!empty($valor_menor)) { echo "







	<font color=#c90000 size=1 face=verdana><b>R$ " . number_format($valor_menor, 2, ',','.')." </b> </font><br>



   ";}   
   
   
if(empty($valor_menor) AND empty($valor_maior)){ echo "Sob Consulta";}
*/
   echo "Sob Consulta";
   
   ;?>
              <? echo "</a>"; ?> </div></td>
        </tr>
        <tr class="verdana10"> 
          <td height="1" colspan="7" bgcolor="#f8f8f8"> <div align="center"> 
              <hr size="1" class="bordas">
            </div></td>
        </tr>
        <?

}

?>
      </table>
      <? } ?>	  
      <p></p></td>
  </tr>
</table>
