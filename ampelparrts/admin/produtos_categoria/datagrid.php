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
		$botoesN1 = "";
		$botoesN2 = "";
		if ($valor['id'] != "") {
			$botoesN1 = "<div style='float:right; margin-top: -8px;'><a href=\"javascript:popup('form.php?id=".$valor["id"]."', 'nivel1', 450, 350);\"><img src=\"".$httpIcone."grid_edit.png\" style=\"vertical-align:middle;\" /></a><a href=\"javascript:if (confirm('Tem certeza que deseja excluir o registro: ".$valor['pk_categoria']."')) { remover('categoria', '".$valor['id']."'); }\"><img src=\"".$httpIcone."grid_delete.png\" style=\"vertical-align:middle;\" /></a></div>";
		}
		if ($valor['id_subcategoria'] != "") {
			$botoesN2 = "<div style='float:right; margin-top: -8px;'><a href=\"javascript:popup('form2.php?id_subcategoria=".$valor["id_subcategoria"]."', 'nivel2', 450, 350);\"><img src=\"".$httpIcone."grid_edit.png\" style=\"vertical-align:middle;\" /></a><a href=\"javascript:if (confirm('Tem certeza que deseja excluir o registro: ".$valor['id_subcategoria']."')) { remover('subcategoria', '".$valor['id_subcategoria']."'); }\"><img src=\"".$httpIcone."grid_delete.png\" style=\"vertical-align:middle;\" /></a></div>";
		}
		$xml.= " 
		<row id='".$valor['id']."_".$valor['id_subcategoria']."'> 
			<cell><![CDATA[".$botoesN1.utf8_encode($valor['nome_portugues'])."]]></cell>
			<cell><![CDATA[".$botoesN2.$valor['nome_portugues_subcategoria']."]]></cell>
		</row>";
	}
	$xml.= "</rows>";
	echo $xml;
?>