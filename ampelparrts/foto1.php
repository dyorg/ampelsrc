<script language="javascript">

function AbreImagem(imagem)

{

	var url = 'pop_up.html?foto=' + imagem;

	popup = window.open(url,'_blank','scrollbars=no,status=no,toolbar=no,resizable=no,location=no,menu=no,width=50,height=50');

	popup.focus();

}

</script>



<?

include "conecta.php";

$id = $_GET["id"];

$fot = $_GET["fot"];

$sql = mysql_query("SELECT * FROM produtos WHERE id = $id");

$r = mysql_fetch_array($sql);

@extract($r);



 

if($foto1 == $fot AND !empty($foto1))

{

echo "<center><a href=# onClick=\"javascript:AbreImagem('imagens/grande$foto1')\"><img src = imagens/pequena$foto1 border=0 ><br><img src=enlargeImage.gif border=0> </a></center>";

}



if($foto2 == $fot AND !empty($foto2))

{

echo "<center><a href=# onClick=\"javascript:AbreImagem('imagens/grande$foto2')\"><img src = imagens/pequena$foto2 border=0 ><br><img src=enlargeImage.gif border=0></a></center>";

}



if($foto3 == $fot AND !empty($foto3))

{

echo "<center><a href=# onClick=\"javascript:AbreImagem('imagens/grande$foto3')\"><img src = imagens/pequena$foto3 border=0 ><br><img src=enlargeImage.gif border=0></a></center>";

}



if($foto4 == $fot AND !empty($foto4))

{

echo "<center><a href=# onClick=\"javascript:AbreImagem('imagens/grande$foto4')\"><img src = imagens/pequena$foto4  border=0 ><br><img src=enlargeImage.gif border=0></a></center>";

}





?>

