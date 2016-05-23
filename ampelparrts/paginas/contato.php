<div class="interna contato">
	<div class="titulo">
    	<p><?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["titulo"]?></p>
        <hr />
    </div>
    <span><?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["mensagem"]?></span>
    <div class="form_contato">
    	<div class="form_contato_tit">
        	<p><?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["titulo_form"]?></p>
            <hr />
        </div>
        <form name="formContato" id="formContato">
        	<input type="hidden" name="acao" value="contato" />
        	<input type="text" name="nome" id="nome" class="nome" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["nome"]?>" />
            <input type="text" name="empresa" id="empresa" class="nome" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["empresa"]?>" />
            <input type="email" name="email" id="email" class="email" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["email"]?>" />
            <input type="text" name="tel" id="tel" class="tel" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["telefone"]?>" />
            <input type="text" name="assunto" id="assunto" class="assunto" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["assunto"]?>" />
            <textarea name="msg" id="msg" class="msg" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["mensagem"]?>"></textarea>      
            <input type="button" name="enviar" id="enviar" class="btn_pequeno" value="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_contato"]["form"]["btn_enviar"]?>" />
    	</form>
        
    </div>
    <div class="outras_formas">
    	<?php
			$conteudo->id = "6";
			$info = $conteudo->dados();
			//echo utf8_encode($info[0]["descricao_".$_SESSION["idioma"]]);
			echo ($info[0]["descricao_".$_SESSION["idioma"]]);
		?>
    </div>
</div>