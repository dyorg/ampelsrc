<?php
	define('TITULO_PAGINA',	'Configuração - Imagem Principal');

	require_once("../../xajax/xajax_core/xajax.inc.php");
	$xajax = new xajax();
	$xajax -> configure('debug', false);
	
	$xajax -> registerFunction("ajaxValida");
	function ajaxValida($array) {
		$objResponse = new xajaxResponse();
		ob_start();
		   include("valida.ajax.php");
			$res = ob_get_contents();
		ob_end_clean();
		
		if (!$erro) {
			$objResponse -> script("enviar();");
		} else {
			$objResponse -> script("mensagemGrow('".utf8_decode(TITULO_PAGINA)."', '".utf8_encode($res)."', 'alerta');");
		}

		return $objResponse;
	}

	$xajax->processRequest();

	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.popup.admin.inc.php");

	include_once("class.php");

	$imagem = new imagem;
	$imagem->id = $_REQUEST["id"];
	$imagem->tipo = $_REQUEST["tipo"];
	$imagem->id_produto = $_REQUEST["id_produto"];
	$imagem->idioma = $_REQUEST["idioma"];
	
	$imagem->vetorArray["ordenar"] = "id";
	$imagem->vetorArray["por"] = "ASC";
	$imagem->valida();
	$dadosImagem = $imagem->listar();			
?>
<?php $xajax -> printJavascript("../../xajax/"); ?>
<script language="javascript">
	function enviar() {
		document.form01.submit();
	}
</script>
<form id="form01" name="form01" method="post" enctype="multipart/form-data" action="upload.php" style="margin-top: -4px">
	<input type="hidden" value="<?=$_REQUEST["tipo"]?>" name="tipo" />
	<input type="hidden" value="<?=$_REQUEST["idioma"]?>" name="idioma" />
	<?php
		$imagem = $imagem->formulario();
	?>
	<h1>Banner rotativo página inicial</h1>
	<p>
		<label>*Imagem 1:</label>
		<input type="file" name="arquivo1" value="" style="width: 100%;" />
	</p>
	<p>
		<label>*URL 1:</label>
		<input type="text" name="url1" value="" style="width: 100%;" />
	</p>
	<p>
		<label>*Imagem 2:</label>
		<input type="file" name="arquivo2" value="" style="width: 100%;" />
	</p>
	<p>
		<label>*URL 2:</label>
		<input type="text" name="url2" value="" style="width: 100%;" />
	</p>
	<p>
		<label>*Imagem 3:</label>
		<input type="file" name="arquivo3" value="" style="width: 100%;" />
	</p>
	<p>
		<label>*URL 3:</label>
		<input type="text" name="url3" value="" style="width: 100%;" />
	</p>
	<a href="#" onclick="xajax_ajaxValida(xajax.getFormValues('form01'));" class="button"><span class="btn_upload">Enviar</span></a>
	<br />
	<h1>Lista de imagens enviadas</h1>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="listagem">
		<tr>
			<th width="75">Foto</th>
	  		<th>Ações</th>
	  	</tr>
		<?php
			if ($dadosImagem[0]["id"]) {
				foreach ($dadosImagem as $index => $valor) {
		?>
				<tr class="<?php if ($index % 2) echo "ln"; else echo "ls"; ?>">
					<td><img src="../../images/_configuracao/<? if (file_exists($valor["id"].$valor["imagem"])) { echo $valor["id"].strtoupper($valor["imagem"]); } else { echo $valor["id"].strtolower($valor["imagem"]); }?>" width="75" /></td>
	  				<td align="center" width="50"><a href="javascript: if (confirm('Tem certeza que deseja excluir essa imagem? ')) {  window.location='../configuracao_imagem/upload.php?acao=excluir&id=<?=$valor["id"]?>&tipo=<?=$_REQUEST["tipo"]?>'; }"><img src="../images/icones/btn-deletar.gif" width="25" height="25" border="0" /></a></td>
	  			</tr>
		<?php
				}
			} else {
				echo "<tr><td colspan='3'>Nenhuma imagem cadastrada.</td></tr>";
			}
		?>
	</table>
</form>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>