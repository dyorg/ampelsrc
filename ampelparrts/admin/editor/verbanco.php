<?

$conecta  = mysql_connect("mysql.brtdata.com.br","portal","joe2860") or die("Não conectou");

mysql_select_db("portal_brtdata_com_br",$conecta);

$qr1 = "SELECT * FROM banco  ORDER BY `id` DESC ";

 $sql1 = mysql_query($qr1);

    while($r1 = mysql_fetch_array($sql1))

{

extract($r1);

echo "$banco<hr>";

}

?>



