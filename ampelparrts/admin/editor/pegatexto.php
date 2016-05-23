<?
$conecta  = mysql_connect("mysql.brtdata.com.br","portal","joe2860") or die("Não conectou");
mysql_select_db("portal_brtdata_com_br",$conecta);
mysql_query("INSERT INTO banco (banco) VALUES ('$_POST[texto]')");


?>
<a href="verbanco.php" title="ver banco" target="_blank">ver banco</a>
