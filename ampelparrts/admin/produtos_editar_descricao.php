<?
$id = $_GET["id"];
include "conecta.php";
$ssql_=mysql_query("SELECT * FROM produtos WHERE id='$id'")or die(mysql_error());
$row = mysql_fetch_array($ssql_);
extract($row);
echo "$detalhes";

?>
