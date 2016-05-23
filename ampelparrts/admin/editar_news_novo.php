

<?php


$id = $_GET["id"];
include "funcoes.php";

$sql = mysql_query("SELECT * FROM news  where id = $id");
$r = mysql_fetch_array($sql);



//$id=$r['id'];
$nome=$r['nome'];
$email=$r['email'];



//$id = ($_GET['id']);
//$nome = ($_POST['nome']);
//$email = ($_POST['email']);

//$id = $r['id'];
//$nome = $r['nome'];
//$email = $r['email'];



// Resgatando os dados vindos do Flash e os converte para ISO-8859-1.




       echo "
<form name=\"Atualizar\" action=\"editar_news.php\" method=\"POST\">

<input name=\"id\" type=\"text\" value=\"$id\"><br>
<input name=\"nome\" type=\"text\" value=\"$nome\"><br>
<input name=\"email\" type=\"text\" value=\"$email\"><br>
<input type=\"submit\" name=\"Enviar\" value=\"Alterar\">


</form>";











?>



<?                                             /*

$id = ($_GET['id']);
$nome = ($_GET['nome']);
$email = ($_GET['email']);




// Query responsável por atualizar o db.
$query = "UPDATE news SET nome='$nome', email='$email' WHERE id='$id'";

// Através da função mysql_query() a query é executada.
$sql = mysql_query($query);

// Retorna 1 (true) ou 0 (false), será usado para verificar no Flash se o SQL foi completado com sucesso.
echo 'sucesso=' . $sql;
*/

?> 




















<?

/*
$id = $_GET["id"];



include "config.php";

$sql = mysql_query("UPDATE news where id = $id");
echo "todos os itens da tabela  <b>$id</b> foram alterados com sucesso.";
*/
?>
