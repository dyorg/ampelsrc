<meta http-equiv="refresh" content="1;URL=news_lista.php">
<?
$id = $_GET["id"];



include "funcoes.php";

$sql = mysql_query("DELETE  FROM news where id = $id");
echo " O código <b>$id</b> foi deletado com sucesso!!!.";

?>
