<?
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");
?>	
<table align="center" width="350px">
<tr><td>
      <div class="tituloCaixa">Acesso Restrito</div>
      <fieldset>      
      <div class="tituloCaixa">Voc&ecirc; n&atilde;o tem acesso a pagina de <?=strtoupper($_REQUEST['pagina']);?><br /><?=$_REQUEST['msg']?></div>
      </fieldset>
      </div>
</td></tr></table>
<?php
include("../includes/rod.admin.inc.php");
include("../includes/rod.admin.func.php");
?>
