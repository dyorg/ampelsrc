<?php

include("conecta.php");
$foto_g = $_POST['foto_g'];
$link = $_POST['link'];
$tipo = $_GET['tipo'];
mysql_query("INSERT INTO banners(foto_g,link,tipo)
VALUES('$foto_g','$link','$tipo')");
echo "Cadastrado com Sucesso!!!";

?>
