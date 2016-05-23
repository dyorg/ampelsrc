<?
session_start();
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$_SESSION["name"] = $nome;
$_SESSION["password"] = $senha;
include "funcoes.php";
$resultado = mysql_query("SELECT * FROM `usuario` WHERE nome = '$nome' AND senha = '$senha'");
$linha = mysql_num_rows($resultado);
if($linha == 1)
{
echo"<b class=negrito10>Olá $nome você está logado.</b><meta http-equiv=\"refresh\" content=\"1;url=index1.php\">";
}
else
{
echo "<b>Dados incorretos.</b><meta http-equiv=\"refresh\" content=\"1;url=index.php\">";
}
?>
