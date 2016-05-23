<meta http-equiv="refresh" content="1;URL=mec_buscas_editar.php">

<?php

// Inclui o script de conexão.
include "conecta.php";


// Resgatando os dados vindos do Flash e os converte para ISO-8859-1.
$id = ($_POST['id']);
$mec_buscas_descricao = ($_POST['mec_buscas_descricao']);
$mec_buscas_palavras_chaves = ($_POST['mec_buscas_palavras_chaves']);
$mec_buscas_url = ($_POST['mec_buscas_url']);
$mec_rodape= $_POST['mec_rodape'];
$mec_titulo= $_POST['mec_titulo'];
$mec_telefones= $_POST['mec_telefones'];
$mec_msn= $_POST['mec_msn'];
$mec_site= $_POST['mec_site'];

// Query responsável por atualizar o db.
$query = "UPDATE mec_buscas SET
mec_buscas_descricao='$mec_buscas_descricao'
, mec_buscas_palavras_chaves='$mec_buscas_palavras_chaves'
, mec_buscas_url='$mec_buscas_url'
,rodape='$mec_rodape'
,titulo='$mec_titulo'
,telefones='$mec_telefones'
,msn='$mec_msn'
,site='$mec_site'
WHERE id='$id'";



// Através da função mysql_query() a query é executada.
$sql = mysql_query($query);

// Retorna 1 (true) ou 0 (false), será usado para verificar no Flash se o SQL foi completado com sucesso.
echo 'sucesso=' . $sql;

?> 

