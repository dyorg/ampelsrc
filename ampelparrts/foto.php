<?
$sql2 = mysql_query("SELECT * FROM banners WHERE tipo = 'clientes' order by rand()");
$r2 = mysql_num_rows($sql2);

    $colunas2="3";
    $cont2="1";
      print"<br><table width='100%' cellspacing=5>";
            while ($r2=mysql_fetch_array($sql2)) {
$id2=$r2['id'];
$foto_g2=$r2['foto_g'];
$link=$r2['link'];


              if($cont2==1){
                print"<tr>";
                }
                print"<td align=center class=verdana10 height=\"160\" bgcolor=ffffff>";
if($link){ echo "<a href=\"$link\" target=\"_blank\" title=\"$link\"> <img src=imagens/$foto_g2 border=\"0\" alt=\"$link\" title=\"$link\"  width=\"150\"></a>" ;}else{
echo "<img src=imagens/$foto_g2 border=\"0\" alt=\"$foto_g2\" title=\"$foto_g2\"  width=\"150\">" ;}

        print"</td>";
            if($cont2==$colunas2){
                    print"</tr>";
                    $cont2=0;
           }
               $cont2=$cont2+1;
}

        if(!$cont2==$colunas2){
              print"</tr></table>";

        } else {
        print "</table>";
}

?>
