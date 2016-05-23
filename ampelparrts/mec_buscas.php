<?
//aqui para os sites de buscas
include "conecta.php";
$sql = mysql_query("SELECT * FROM mec_buscas WHERE id='0' ");
$r = mysql_fetch_array($sql);
$mec_buscas_descricao = $r['mec_buscas_descricao'];
$mec_buscas_palavras_chaves = $r['mec_buscas_palavras_chaves'];
$mec_buscas_url= $r['mec_buscas_url'];
$mec_rodape= $r['rodape'];
$mec_titulo= $r['titulo'];
$mec_telefones= $r['telefones'];
$mec_msn= $r['msn'];
$mec_email= $r['email'];
$mec_site= $r['site'];

?>
<meta name="description" CONTENT="<?php echo"$mec_buscas_descricao"; ?>" />
<meta name="keywords" CONTENT="<?php echo"$mec_buscas_palavras_chaves"; ?>" />
<meta name="revisit-after" content="3 days" />
<meta name="rating" content="general" />
<meta name="audience" content="all" />
<meta name="author" content="<?php echo"$mec_buscas_url"; ?>" />
<meta name="robots" content="all"/>
<meta name="Googlebot" content="all" />
<meta name="document-class" content="Living Document"/>
<meta name="document-rights" content="Copywritten Work"/>
<meta name="document-type" content="Public"/>
<meta name="document-rating" content="General"/>
<meta name="document-distribution" content="Global"/>
<meta name="document-state" content="Dynamic"/>
<meta name="cache-control" content="Public"/>


