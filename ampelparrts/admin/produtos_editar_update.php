	<?
@session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
include "conecta.php";


 ?>
<title><?php echo"$bar_titulo"; ?></title>
<link href="css.css" rel="stylesheet" type="text/css">
<script src="ActiveX.js"></script>

</head>





<?php
//para formulario email - $contato_email_form e site - $contato_url_form;
// Resgatando os dados vindos do Flash e os converte para ISO-8859-1.
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$nivel = $_POST['nivel'];
$texto = $_POST['texto1'];
$detalhes = $_POST['texto'];
$a = $_POST["categoria"];
$peso = $_POST["peso"];
$categoria = explode("-",$a);
$valor_maior0 = $_POST['valor_maior'];
$valor_maior1 = $_POST['valor_maior1'];
$valor_menor0 = $_POST['valor_menor'];
$valor_menor1 = $_POST['valor_menor1'];
$valor_menor = "$valor_menor0.$valor_menor1";
$valor_maior = "$valor_maior0.$valor_maior1";
$categoria1 = $categoria[0];
$categoria2 = $categoria[1];
$novascategorias =$_POST["novascategorias"];
$quantidade = $_POST['quantidade'];
if($quantidade == 0){$disponivel="nao";}
else{$disponivel = "sim";}


// Query responsável por atualizar o db.
$query = "UPDATE produtos SET
titulo='$titulo'
, data='$data'
, texto='$texto'
, detalhes='$detalhes'
, nivel='$nivel'
, categoria='$categoria1'
, subcategoria='$categoria2'
, outrascategorias='$novascategorias'
, valor_maior='$valor_maior'
, valor_menor='$valor_menor'
, disponivel='$disponivel'
, peso='$peso'
, quantidade='$quantidade'
WHERE id='$id'";



// Através da função mysql_query() a query é executada.
$sql = mysql_query($query);

// Retorna 1 (true) ou 0 (false), será usado para verificar no Flash se o SQL foi completado com sucesso.
echo 'sucesso=' . $sql;

if(isset($_POST["avisar"])){

//escolhe o produto
$sql_t = mysql_query("SELECT * FROM produtos WHERE id = $id");
$r_t = mysql_fetch_array($sql_t);
 
$x = mysql_query("SELECT * FROM avisame WHERE id_produto='$id'");
 while($r = mysql_fetch_array($x)) {
$nomex= $r["nome"];
$emailx= $r["email"];
$produtox= $r["produto"];
$assunto="Olá $nomex, o produto de seu interesse está dispovível em nosso site";
$mens="<center><font size=1 face=Verdana, Arial, Helvetica, sans-serif>";
$mens.="<hr width=width=100% size=5 color=#f2f2f2 align=left><br><br>";


$mens.="Ola $nomex, o produto de seu interesse esta disponível em nosso site.<br>";
$mens.="Clique <a href=$contato_url_form/index.php?conteudo=produtos_detalhes&id=$r_t[id]&categoria=$r_t[categoria]>aqui</a> ou na foto abaixo para visualizar o produto.<br>";
$mens.="<b>$r_t[titulo]</b><br><br><a href=$contato_url_form/index.php?conteudo=produtos_detalhes&id=$r_t[id]&categoria=$r_t[categoria]><img src=$contato_url_form/imagens/grande$r_t[foto1]></a><br><br><br><b>R$ ".number_format($r_t["valor_menor"], 2, ',','.');
$mens.="</b><br><br>Acesse nosso site <a href=$contato_url_form>$contato_url_form</a><br><br>";
$mens.="<br><br><br>";
$mens.="<hr width=width=100% size=5 color=#f2f2f2 align=left>
Este é um email automático disparado pelo sistema. Favor não respondê-lo.<br>
Para entrar em contato conosco, acesse <a href=$contato_url_form>$contato_url_form</a> e utilize o Fale Conosco em nosso site.  
</center></font>";
$headers.= "From: $contato_email_form\n";
$headers.= "X-Sender: $contato_email_form\n";
$headers.= "Content-Type: text/html; charset=iso-8859-1\n";//Aqui o código que finalmente envia o seu email
mail($emailx,$assunto,$mens,$headers);
}
mysql_query("DELETE FROM avisame WHERE id_produto = '$id'");
}

?> 
<meta http-equiv="refresh" content="0;URL=produtos_editar_lista.php">
