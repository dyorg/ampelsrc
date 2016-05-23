<?php
	session_start();
	require_once("config.php");
	require_once("classes/func.banco.php");
	require_once("classes/func.geral.php");
		require_once("classes/language.php");

	$email_nome_empresa = NOME_EMPRESA;
	$email_empresa = EMAIL_CONTATO;
	$conexao = conectar(SERVIDOR, BANCODEDADOS, USUARIO, SENHA);
	define('CONEXAO', $conexao);
	
	if ($_REQUEST["acao"] == "mudarIdioma") {
		$_SESSION["idioma"] = $_GET["idioma"];
	} 
	
	if ($_REQUEST["acao"] == "newsletter") {
		$sql = "INSERT INTO newsletter VALUES (default, '".$_REQUEST["nome"]."', '".$_REQUEST["email"]."', '".date("Y-m-d H:i:s")."', 1);";
		executaSql($conexao, $sql);	
	}
	
	if ($_REQUEST["acao"] == "contato") {
		$headers  = "MIME-Version: 1.1\n";
		$headers .= "Content-type: text/html; charset=utf-8\n";
		$headers .= "From: \"$email_nome_empresa\" <$email_empresa>\n";
		$headers .= "Return-Path: <$email_empresa>\n"; 	
		$mensagem = "Formulario de Contato - Site<br>";
		$mensagem.= "Nome: ".$_REQUEST['nome']."<br>";
		$mensagem.= "Empresa: ".$_REQUEST['empresa']."<br>";
		$mensagem.= "Email: ".$_REQUEST['email']."<br>";
		$mensagem.= "Telefone: ".$_REQUEST['tel']."<br>";
		$mensagem.= "Mensagem:<br>".$_REQUEST['msg'];
		mail($email_empresa, "Formulario de Contato - Site", $mensagem, $headers);
		
	}
	
	if ($_REQUEST["acao"] == "buscar") {
		$sql = "SELECT * FROM produto_importados WHERE (upper(codigo_invisivel) like '%".strtoupper(addslashes($_REQUEST["busca"]))."%') OR (upper(codigo) like '%".strtoupper(addslashes($_REQUEST["busca"]))."%')";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		if (count($dadosRetorno) > 0) {
			?>
			<div class="titulo">
	        	<p><?=$_LANGUAGE[$_SESSION["idioma"]]["produto"]["cod_busca"]?> (<?=$_REQUEST["busca"]?>)</p>
	            <hr />
	        </div>
	        <div class="lista">
   	        	<div class="tit">
	            	<p class="nome"><?=$_LANGUAGE[$_SESSION["idioma"]]["produto"]["marca"]?></p>
	                <p class="cod"><?=$_LANGUAGE[$_SESSION["idioma"]]["produto"]["peca"]?></p>
	                <p class="desc"><?=$_LANGUAGE[$_SESSION["idioma"]]["produto"]["produto"]?></p>
	                <br style="clear:both" />
	            </div>
	        	<?php foreach ($dadosRetorno as $valor) { ?>
			        <div class="produto">
		            	<p class="nome"><?=utf8_encode($valor["marca"])?></p>
		                <p class="cod"><?=utf8_encode($valor["codigo"])?></p>
		                <p class="desc"><?=utf8_encode($valor["titulo"])?></p>
		                <p class="btn"><a href="<?=URL_SITE?>contato"><?=$_LANGUAGE[$_SESSION["idioma"]]["produto"]["solicitar"]?></a></p>
		                <br style="clear:both" />
		            </div>
		        <?php } ?>
	        </div>
			<?
		} else {
			?>
			<div class="titulo">
	        	<p>Código da busca (<?=$_REQUEST["busca"]?>)</p>
	            <hr />
	        </div>
	        <div class="lista">
	        	<p>Nenhum produto encontrado.</p>
	        </div>
			<?
		}
	}
?>