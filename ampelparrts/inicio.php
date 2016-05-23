<img src="destaque.png"> 

<?php
@ $pagina = $_GET["pagina"];
$sql = mysql_query("SELECT * FROM produtos  where nivel!='2' ORDER BY rand()");

//$sql = mysql_query("SELECT * FROM equipe ORDER BY `equipe`.`id` ASC" );

$linha = mysql_num_rows($sql);





$r = mysql_num_rows($sql);









    //AQUI ENTRA SUA QUERY



    $colunas="3";

    $cont="1";

print"<table width='100%' cellpadding='5'>";



while ($r=mysql_fetch_array($sql)) {



$id=$r['id'];

$titulo=$r['titulo'];

$data=$r['data'];

//$foto_g=$r['foto_g'];

$foto1=$r['foto1'];

$foto2=$r['foto2'];

$foto3=$r['foto3'];

$foto4=$r['foto4'];

$texto=$r['texto'];

$detalhes=$r['detalhes'];

$nivel=$r['nivel'];

$categoria=$r['categoria'];

$valor_maior=$r['valor_maior'];

$valor_menor=$r['valor_menor'];



 $categoria = str_replace(" ", "%20", $categoria);

 

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



                 



               if($cont==1){



                print"<tr>";



                }



                print"<td  valign=\"top\">";

?>
<TABLE BORDER=0 ALIGN=CENTER  bgcolor=#ffffff class="verdana10">
  <TR> 
    <td width="100" height="97"> <? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoria><img src=imagens/pequena$fotogeral border=\"0\" width=\"100\" align=center></a> "; ?></td>
    <td width="200"><? echo "<a href=?conteudo=produtos_detalhes&id=$id&categoria=$categoria> <b> $titulo </b> </a>"; ?><br>
      <br>
      <font color="#666666"><? echo "Código: $texto";?><br>
      </font> 
      <? 
	  /*
		  					       if($valor_maior != ".00") { echo "
    <font color=#999999 size=1 face=verdana> De R$ <strike>". number_format($valor_maior, 2, ',','.')."</strike> <br> Por</font>
  ";}
      if(!empty($valor_menor)) { echo "
	<font color=#c90000 size=2 face=verdana><b>R$ " . number_format($valor_menor, 2, ',','.')." </b> </font><br>
   ";}  */
   
      echo "Sob Consulta";?>
      <br>
    </td>
  </TR>
</TABLE>			  

<?
print"</td>";
if($cont==$colunas){
print"</tr>";
$cont=0;
 }
$cont=$cont+1;
}        if(!$cont==$colunas){
              print"</tr></table>";
        } else {
        print "</table>";

}
echo "
<center> <p class=verdana10>
 $linha Produto(s) em destaque
</div>               
</center> 
";


?>
<img src="destaque_baixo.png">
