<meta http-equiv="refresh" content="1;URL=news_lista_edita.php">

<?php

// Inclui o script de conex�o.
include "config.php";


// Resgatando os dados vindos do Flash e os converte para ISO-8859-1.
$id = ($_POST['id']);
$nome = ($_POST['nome']);
$email = ($_POST['email']);

// Query respons�vel por atualizar o db.
$query = "UPDATE news SET nome='$nome', email='$email' WHERE id='$id'";

// Atrav�s da fun��o mysql_query() a query � executada.
$sql = mysql_query($query);

// Retorna 1 (true) ou 0 (false), ser� usado para verificar no Flash se o SQL foi completado com sucesso.
echo 'sucesso=' . $sql;

?> 


















<?

/*
$id = $_GET["id"];



include "config.php";

$sql = mysql_query("UPDATE news where id = $id");
echo "todos os itens da tabela  <b>$id</b> foram alterados com sucesso.";
*/
?>
