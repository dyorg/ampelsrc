<?
@session_start();
$name = $_SESSION["name"];
$password = $_SESSION["password"];
$ip = $_SERVER['REMOTE_ADDR'] ;
$data1 = date('d/m/Y');
//$conecta  = mysql_connect("localhost","root","") or die("Não conectou");
//mysql_select_db("ampel",$conecta);
$conecta  = mysql_connect("mysql01.site1366749770.hospedagemdesites.ws","site1366749770","ab34dr28") or die("Não conectou");
mysql_select_db("site1366749770",$conecta);
?>
