<?
@session_start();
if(@$_SESSION['name'] !== NULL AND @$_SESSION['password'] !== NULL)
{
include "funcoes.php";
}
else
{
echo"<table width=100% bgcolor=yellow><tr><td><center><font class=verdana14>LOGAR NO SISTEMA</class></td></tr></table>";
echo"<body onLoad=\"javascript:parent.location.href('index.php')\">";

}
?>
<link href="css.css" rel="stylesheet" type="text/css"> 