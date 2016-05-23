<?php
	include_once("../includes/top.admin.func.php");
	include_once("class.php");

	$class = new classe;
	
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

	$class->vetorArray=$array;
	$class->valida();
	$dadosBusca = $class->listar();

	$total = count($dadosBusca);
	$sortname = $_POST['sortname'];
	$sortorder = $_POST['sortorder'];
	$httpIcone = "../../images/icones/";
	
	header("Content-Type: text/xml");
	$xml = '<?xml version="1.0" encoding="utf-8"?>
			<rows>
			<page>'.$page.'</page>
			<total>'.$dadosBusca[0]["total"].'</total>';
	foreach($dadosBusca as $valor) {
		$xml.= " 
		<row id='".$valor['id']."'>
			<cell><![CDATA[".$valor['id']."]]></cell>
			<cell><![CDATA[".utf8_encode($valor['nome'])."]]></cell>
		</row>";
	}
	$xml.= "</rows>";
	echo $xml;
?>