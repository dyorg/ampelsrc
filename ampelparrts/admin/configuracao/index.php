<?php
	$tituloPagina = "Banners Sistema";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");	
?>
	<form>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=portugues', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner P�gina Inicial (portugu�s)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=ingles', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner P�gina Inicial (ingl�s)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=arabe', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner P�gina Inicial (�rabe)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=frances', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner P�gina Inicial (franc�s)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=espanhol', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner P�gina Inicial (espanhol)</label>
			</a>
		</div>

		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=russo', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner P�gina Inicial (russo)</label>
			</a>
		</div>

		<br clear="all" />
	</form>
	<?
	include("../includes/rod.admin.inc.php");
	include("../includes/rod.admin.func.php");
?>