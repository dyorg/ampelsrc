<?php
  
  		$pagina = @$_GET["pagina"];
		        $qr1 = "SELECT * FROM produtos";
        // Executa a query no Banco de Dados
        $sql1 = mysql_query($qr1);
        // Conta o total ded resultados encontrados
        $total = mysql_num_rows($sql1);
          $limite = 20;
         $inicio = $pagina * $limite;
         $divisao = ceil($total / $limite);

$sql = mysql_query("SELECT * FROM produtos ORDER BY `titulo` ASC LIMIT $inicio, $limite");
$linha = mysql_num_rows($sql);
$r = mysql_num_rows($sql);

?>

 
<div align="center" class="negrito12"><a href="index.php?conteudo=buscar_advance"><u>Busca 
  Avan&ccedil;ada</u></a></div>
<span class="verdana14"><br>
</span><span class="verdana10"><?echo $total?> Produtos cadastrados.<br>
</span> <span class="negrito12"> </span><br>
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
    <td align="center">
      <? //echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoriax class=\"link_topada\">$quantidade</a>"; ?>
      -</td>
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
<?
//paginacao segunda parte

 echo "<center class=verdana10>";
if($pagina > 0) {
  $menos = $pagina - 1;
  $url = "?conteudo=produtos&pagina=$menos";
  echo "<a href=\"$url\" title=\"VOLTAR\"><img src=voltar.jpg border=0></a> | ";
}

for($i = 0;$i < $divisao;$i++ )
{
$ix=$i + 1;

if($ix < $pagina + 7 AND $ix > $pagina - 5){
if($pagina == $i)
{echo "<a href =?conteudo=produtos&pagina=$i title=\"PAGINA\"> <b>$ix</b> </a> | " ;}
else{echo "<a href =?conteudo=produtos&pagina=$i title=\"PAGINA\">$ix </a> | " ;}
}
}
if($pagina < $divisao - 1) {
  $mais = $pagina + 1;
  $url = "?conteudo=produtos&pagina=$mais";

  echo "<a href=\"$url\" title=\"AVANCAR\"><img src=avancar.jpg border=0></a>";
}
echo "</center>";


?>
