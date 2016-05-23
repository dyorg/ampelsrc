<?php
	$tituloPagina = "Banners Sistema";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");	
?>
	<form>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=portugues', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner Página Inicial (português)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=ingles', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner Página Inicial (inglês)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=arabe', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner Página Inicial (ârabe)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=frances', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner Página Inicial (francês)</label>
			</a>
		</div>
		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=espanhol', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner Página Inicial (espanhol)</label>
			</a>
		</div>

		<div class="item_icone">
			<a href="javascript:void(0)" onclick="popup('../configuracao_imagem/form.php?tipo=banner1&idioma=russo', 'configuracao_imagens', 500, 400);">
				<img src="../../images/icones/icone_grande_image.png" />
				<label>Banner Página Inicial (russo)</label>
			</a>
		</div>

		<br clear="all" />
	</form>
	<?
	include("../includes/rod.admin.inc.php");
	include("../includes/rod.admin.func.php");
?>