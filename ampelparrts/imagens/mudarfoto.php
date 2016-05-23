  <link href="../css.css" rel="stylesheet" type="text/css">
  <?
include "../admin/conecta.php";
$hora = date("His");
$data = date("dmY");
$datahora="$data$hora";

//excluir a foto
if(isset($_GET["excluir"])){
mysql_query("UPDATE produtos SET $_GET[excluir] = '' WHERE id = '$_GET[id]'");
echo"<span class=\"verdana10\">Foto excluida.<meta http-equiv=\"refresh\" content=\"1;url=javascript:javascript:close();\"></class>";
echo"<script>opener.location.reload(); </script>" ;
}
//conectar as fotos do banco
$ssql_=mysql_query("SELECT * FROM produtos WHERE id='$_GET[id]'")or die(mysql_error());
$row = mysql_fetch_array($ssql_);
extract($row);
//muda a ordem das fotos      esquerda
if($_GET["mudaresquerda"] == "foto1")
{
mysql_query("UPDATE produtos SET foto1 = '$foto2',foto2 = '$foto3',foto3 = '$foto4',foto4 = '$foto1' WHERE id = '$_GET[id]'");
echo"<span class=\"verdana10\">Ordem das fotos Alterada.<meta http-equiv=\"refresh\" content=\"1;url=javascript:javascript:close();\"></class>";
echo"<script>opener.location.reload(); </script>" ;
}
//muda a ordem das fotos direita
if($_GET["mudardireita"] == "foto1")
{
mysql_query("UPDATE produtos SET foto1 = '$foto4',foto2 = '$foto1',foto3 = '$foto2',foto4 = '$foto3' WHERE id = '$_GET[id]'");
echo"<span class=\"verdana10\">Ordem das fotos Alterada.<meta http-equiv=\"refresh\" content=\"1;url=javascript:javascript:close();\"></class>";
echo"<script>opener.location.reload(); </script>" ;
}

//faz upload da foto
if(isset($_GET["fotonova"]))
{
echo '<form name = "form0" method = "post" enctype = "multipart/form-data">
<input type = "file" name = "arquivo1" class="imput10"><br>
<input type = "submit" name = "Submit" value = "Carregar foto" class="imput10">
</form>';

//salva a imagem
if(!empty($_FILES["arquivo1"])){
$arquivo = $_FILES["arquivo1"];
$arquivo1 = $arquivo["name"];
// Faz o upload da imagem
$dir="../imagens/";
move_uploaded_file($arquivo["tmp_name"], $dir.$arquivo1);

//cria fotos pequenas
$fotos = $arquivo1 ;

//aumenta todas as fotos do array
$imagem = $fotos;

//separa a extensao

$separa = explode(".",$imagem);
// deixa tudo em minusculo
$foto = strtolower($separa[1]) ;


// variaveis que podem ser alteras / tamanho final
$x = 200;
$y = 200;


//*************************************se for fotos jpg gif ou png , entao faca...***********
         if($foto == "jpg" )
      {
//cria a imagem do mesmo tamanho a partir da original
$novaimagem = imagecreatefromjpeg($imagem);


//tamanho da largura da foto original

$largura = imagesx($novaimagem);

//tamanho da altura da foto original
$altura = imagesy($novaimagem);

       }


       if($foto == "gif")
      {
//cria a imagem do mesmo tamanho a partir da original
$novaimagem = imagecreatefromgif($imagem);


//tamanho da largura da foto original

$largura = imagesx($novaimagem);

//tamanho da altura da foto original
$altura = imagesy($novaimagem);

      }

         if($foto == "png")
      {
//cria a imagem do mesmo tamanho a partir da original
$novaimagem = imagecreatefrompng($imagem);


//tamanho da largura da foto original

$largura = imagesx($novaimagem);

//tamanho da altura da foto original
$altura = imagesy($novaimagem);

      }

                               //se a foto tiver as mesmas dimensoes altura x largura, diminui igual
                               if($largura == $altura)
                               {
                                $finalx = $x ;
                                $finaly = $y  ;
                                $fx = 0 ;
                                $fy = 0 ;
                               }
                               //se largura for maior q altura faca...
                               if($largura > $altura)
                               {
                                $finalx = $x ;
                                $novaaltura =$altura * $y ;
                                $fim = $novaaltura / $largura ;
                                $finaly = floor($fim) ;
                                $fx = 0 ;
                                $fy = ($x / 2) - ($finaly / 2); ;


                               }
                               //se largura for menor q altura faca...
                              if($largura < $altura)
                               {
                                $finaly = $y ;
                                $novaaltura =$largura * $x ;
                                $fim = $novaaltura / $altura ;
                                $finalx = floor($fim) ;
                                $fy = 0 ;
                                $fx = ($y / 2) - ($finalx / 2);

                               }
//cria a nova imagem
$maisnovaimagem = imagecreatetruecolor($x,$y);

//cor do fundo da imagem
$novo = imagecolorallocate($maisnovaimagem,255,255,255);

//cor do fundo definido
imagefill($maisnovaimagem,0,0,$novo);

//copia a imagem pequena na imagem com o fundo cor
@imagecopyresampled($maisnovaimagem,$novaimagem,$fx,$fy,0,0,$finalx,$finaly,$largura,$altura);

// onde vai ser salvo
$nova = "pequena$datahora".$fotos;

//nome do arquivo
if($foto == "jpg" ){imagejpeg($maisnovaimagem,$nova);
//destroi imagem
ImageDestroy($maisnovaimagem);
ImageDestroy($novaimagem);
echo " <img src=$nova> ";
}
if($foto == "gif"){ imagegif($maisnovaimagem,$nova);
//destroi imagem
ImageDestroy($maisnovaimagem);
ImageDestroy($novaimagem);
echo " <img src=$nova> ";
}
if($foto == "png"){ imagepng($maisnovaimagem,$nova);
//destroi imagem
ImageDestroy($maisnovaimagem);
ImageDestroy($novaimagem);
echo " <img src=$nova> ";
}






//*************************************cria array pra diminuir as fotos**********************
//cria fotos grandes
$fotos = $arquivo1 ;

//diminui todas as fotos do array
$imagem = $fotos;

//separa a extensao

$separa = explode(".",$imagem);
// deixa tudo em minusculo
$foto = strtolower($separa[1]) ;


// variaveis que podem ser alteras / tamanho final
$x = 300;
$y = 300;


//*************************************se for fotos jpg gif ou png , entao faca...***********
         if($foto == "jpg" )
      {
//cria a imagem do mesmo tamanho a partir da original
$novaimagem = imagecreatefromjpeg($imagem);


//tamanho da largura da foto original

$largura = imagesx($novaimagem);

//tamanho da altura da foto original
$altura = imagesy($novaimagem);

       }


       if($foto == "gif")
      {
//cria a imagem do mesmo tamanho a partir da original
$novaimagem = imagecreatefromgif($imagem);


//tamanho da largura da foto original

$largura = imagesx($novaimagem);

//tamanho da altura da foto original
$altura = imagesy($novaimagem);

      }

         if($foto == "png")
      {
//cria a imagem do mesmo tamanho a partir da original
$novaimagem = imagecreatefrompng($imagem);


//tamanho da largura da foto original

$largura = imagesx($novaimagem);

//tamanho da altura da foto original
$altura = imagesy($novaimagem);

      }

                               //se a foto tiver as mesmas dimensoes altura x largura, diminui igual
                               if($largura == $altura)
                               {
                                $finalx = $x ;
                                $finaly = $y  ;
                                $fx = 0 ;
                                $fy = 0 ;
                               }
                               //se largura for maior q altura faca...
                               if($largura > $altura)
                               {
                                $finalx = $x ;
                                $novaaltura =$altura * $y ;
                                $fim = $novaaltura / $largura ;
                                $finaly = floor($fim) ;
                                $fx = 0 ;
                                $fy = ($x / 2) - ($finaly / 2); ;


                               }
                               //se largura for menor q altura faca...
                              if($largura < $altura)
                               {
                                $finaly = $y ;
                                $novaaltura =$largura * $x ;
                                $fim = $novaaltura / $altura ;
                                $finalx = floor($fim) ;
                                $fy = 0 ;
                                $fx = ($y / 2) - ($finalx / 2);

                               }
//cria a nova imagem
$maisnovaimagem = imagecreatetruecolor($x,$y);

//cor do fundo da imagem
$novo = imagecolorallocate($maisnovaimagem,255,255,255);

//cor do fundo definido
imagefill($maisnovaimagem,0,0,$novo);

//copia a imagem pequena na imagem com o fundo cor
@imagecopyresampled($maisnovaimagem,$novaimagem,$fx,$fy,0,0,$finalx,$finaly,$largura,$altura);

// onde vai ser salvo
$nova = "grande$datahora".$fotos;

//nome do arquivo
if($foto == "jpg" ){imagejpeg($maisnovaimagem,$nova);
//destroi imagem
ImageDestroy($maisnovaimagem);
ImageDestroy($novaimagem);

}
if($foto == "gif"){ imagegif($maisnovaimagem,$nova);
//destroi imagem
ImageDestroy($maisnovaimagem);
ImageDestroy($novaimagem);

}
if($foto == "png"){ imagepng($maisnovaimagem,$nova);
//destroi imagem
ImageDestroy($maisnovaimagem);
ImageDestroy($novaimagem);
}
$fotosalvar = "$datahora$fotos";
mysql_query("UPDATE produtos SET $_GET[fotonova] = '$fotosalvar' WHERE id = '$_GET[id]'");
echo"<span class=\"verdana10\"><br>Foto cadastrada.<meta http-equiv=\"refresh\" content=\"2;url=javascript:javascript:close();\"></class>";
echo"<script>opener.location.reload(); </script>" ;
@unlink($arquivo1);


}

}
?>

