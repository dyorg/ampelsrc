<meta http-equiv="refresh" content="1;URL=menu_produtos_inserir.php">
<?php include("conecta.php"); ?>
<?
if($_GET["tipo"] == "categoria"){
$categoria = $_POST['categoria'];
mysql_query("INSERT INTO menu_produtos (categoria)
VALUES('$categoria')");
echo "Cadastrado com sucesso <br>";  }



if($_GET["tipo"] == "subcategoria"){
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
mysql_query("INSERT INTO menu_produtos (categoria,subcategoria)
VALUES('$categoria','$subcategoria')");
echo "Cadastrado com sucesso <br>";  }
?>
