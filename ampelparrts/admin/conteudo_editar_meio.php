<?
include "conecta.php";
$ssql_=mysql_query("SELECT * FROM conteudo WHERE categoria='$_GET[conteudo]' AND lingua='$_GET[lingua]'")or die(mysql_error());
$rowx = mysql_fetch_array($ssql_);
echo "$rowx[texto]";

?>
