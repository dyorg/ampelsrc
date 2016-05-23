<?php
	include_once("../includes/top.admin.func.php");
	include_once("seguranca.class.php");

	$seguranca = new seguranca;
	
	$array["ordenar"] = $_POST['sortname'];
	$array["por"] = $_POST['sortorder'];
	$page = isset($_POST['page']) ? $_POST['page'] : 1;
	$rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
	if($_POST['query']!=''){
		$where = " `".$_POST['qtype']."` LIKE '%".$_POST['query']."%' ";
		$clausula = $_POST['query'];
	} else {
		$where ='';
	}
	if($_POST['letter_pressed']!=''){
		$where = " `".$_POST['qtype']."` LIKE '".$_POST['letter_pressed']."%' ";	
		$clausula = $_POST['query'];
	}
	if($_POST['letter_pressed']=='#'){
		$where = " `".$_POST['qtype']."` REGEXP '[[:digit:]]' ";
	}
	$array["pesquisar"] = $_POST['qtype'];	
	$array["palavraChave"] = $clausula;	
	$array["pagina"] = $_POST['page'];	
	
	$start = (($page-1) * $rp);
	$array["paginacao"] = " $start, $rp ";

	$seguranca->vetorArray=$array;
	$seguranca->valida();
	$dadosSeguranca = $seguranca->listar();

	$total = count($dadosSeguranca);
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];
	$httpIcone = "http://www.signoweb.com.br/lojas/template/padrao/icones/";
	
	header("Content-Type: text/xml");
	$xml = '<?xml version="1.0" encoding="utf-8"?>
			<rows>
			<page>'.$page.'</page>
			<total>'.$dadosSeguranca[0]["total"].'</total>';
	foreach($dadosSeguranca as $nome => $valor) {
		$xml.= " 
		<row id='".$valor['usuario_id']."'>
			<cell><![CDATA[".$valor['usuario_id']."]]></cell>
			<cell><![CDATA[".utf8_encode($valor['usuario_nome'])."]]></cell>
			<cell><![CDATA[".utf8_encode($valor['usuario_login'])."]]></cell>
			<cell><![CDATA[".utf8_encode($valor['usuario_email'])."]]></cell>
		</row>";
	}
	$xml.= "</rows>";
	echo $xml;
?>