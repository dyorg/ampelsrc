<?php
	session_start();
	
	/* Define o limitador de cache para 'private' */
	session_cache_limiter('private');
	$cache_limiter = session_cache_limiter();
	/* Define o limite de tempo do cache em 30 minutos */
	session_cache_expire(30);
	$cache_expire = session_cache_expire();
	
	require_once("../../config.php");
	require_once("../../classes/func.banco.php");
	require_once("../../classes/func.geral.php");

	require_once("../../classes/class.eyedatagrid.inc.php");
	require_once("../../classes/class.eyemysqladap.inc.php");	
	
	$conexao = conectar(SERVIDOR, BANCODEDADOS, USUARIO, SENHA);
	define('CONEXAO', $conexao);
	
	function register_globals_on(){
		if($_POST){
			foreach($_POST as $var=>$valor){
				global $$var;
				$$var = $valor;
			}
		}
		if($_GET){
			foreach($_GET as $var=>$valor){
				global $$var;
				$$var = $valor;
			}
		}
	}
	register_globals_on();
	
	# ROTINA PARA VERIFICAR PERMISSÃO
	$url = substr($_SERVER['PHP_SELF'], 7);
	$url = explode("/", $url); 
	$modulo = $url[count($url)-2];
	$pagina_completa = $url[count($url)-1];
	$url = explode(".", $pagina_completa); 
	$pagina_nome = $url[0];	
	if ( $pagina_completa != "seguranca.login.php" && $_SESSION["session_id"] != md5(CHAVE_SESSION) ) {
		?><script language=javascript>location.href='../seguranca/seguranca.login.php?acao=logar'</script><?
	} 
?>