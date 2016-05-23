<meta http-equiv="refresh" content="1;URL=menu_produtos_inserir.php">
<?
$id = $_GET["id"];



include "conecta.php";

$sql = mysql_query("DELETE  FROM menu_produtos where id = $id");
echo "Todos os itens da tabela  <b>$id</b> foram deletados com sucesso.";

?>
