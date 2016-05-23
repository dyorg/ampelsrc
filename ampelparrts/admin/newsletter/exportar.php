<?php
	include_once("../../classes/cvsline.class.php");
	include_once("../../classes/cvs.class.php");
	include_once("../includes/top.admin.func.php");
	include_once("class.php");

	$usuario = new classe;
	$listaUsuarios = $usuario->listar();

	$csv = new CSV;
	$line = new CSVLine("Nome","E-mail", "Data Cadastro");
	$csv->addLine( $line );
	foreach ($listaUsuarios as $usuario) {
		$line = new CSVLine($usuario["nome"], $usuario["email"], $usuario["data_cadastro"]);
		$csv->addLine( $line );
	}
	$csv->save( 'emails.csv' ); // salvo o arquivo
	
	# FORÇAR O DOWNLOAD
	$arquivo = 'emails.csv'; // Aqui a gente só junta o diretório com o nome do arquivo
	header('Content-type: octet/stream');
	header('Content-disposition: attachment; filename="'.basename($arquivo).'";');
	header('Content-Length: '.filesize($arquivo));
	readfile($arquivo);
	exit;
?>
