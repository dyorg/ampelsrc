<meta http-equiv="refresh" content="1;URL=produtos_inserir_include.php">



<?php include("conecta.php"); ?>
<?



//$id = r['id'];
$foto1 = $_POST['foto1'];
$foto2 = $_POST['foto2'];
$foto3 = $_POST['foto3'];
$foto4 = $_POST['foto4'];
$data = $_POST['data'];
$nivel = $_POST['nivel'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$detalhes = $_POST['detalhes'];
$a =$_POST["categoria"];
$categoria = explode("-",$a);
$novascategorias =$_POST["novascategorias"];
$valor_maior0 = $_POST['valor_maior'];
$valor_maior1 = $_POST['valor_maior1'];
$valor_menor0 = $_POST['valor_menor'];
$valor_menor1 = $_POST['valor_menor1'];
$valor_menor = "$valor_menor0.$valor_menor1";
$valor_maior = "$valor_maior0.$valor_maior1";
$resumo = strip_tags(substr($texto,0,50));
$peso = $_POST['peso'];
$quantidade = $_POST['quantidade'];
//$foto = $_POST['foto'];

//$db = mysql_connect ("localhost", "gmt", "madeira") or die ("nao deu") ;

//mysql_select_db("gmt_portfolio",$db);

mysql_query("INSERT INTO produtos  (foto1,foto2,foto3,foto4,data,nivel,titulo,texto,detalhes,categoria,subcategoria,outrascategorias,valor_maior,valor_menor,peso,quantidade)
VALUES('$foto1','$foto2','$foto3','$foto4','$data','$nivel','$titulo','$detalhes','$texto','$categoria[0]','$categoria[1]','$novascategorias','$valor_maior','$valor_menor','$peso','$quantidade')");
echo "Cadastrado com Sucesso  !!! <br>";

?>
