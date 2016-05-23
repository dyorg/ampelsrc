<link href='/css/menu_vertical.css' rel='stylesheet' />
<?php
$categorias = $produto->categorias();
?>
<div class="menu">
    <p class="tit"><?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_produtos"]["menu"]["titulo"]?></p>
    <?php 
    if (count($categorias) > 0){
    	echo '<ul id="navmenu-v">';
        foreach($categorias as $valor) {
        	//echo "<p class='hoverCategoria' data-id='".$valor["id"]."' onclick=\"location.href='".URL_SITE.$seo->urlSEOFixa("produtos/categoria/".$valor["id"])."';\">".$valor["nome"]."</p>";
        	echo "<li><a href='".URL_SITE."produtos/categoria/".$valor["id"]."'>".$valor["nome_".$_SESSION["idioma"]]."</a>";
        	#MONTAR CAIXA DOS SUBMENUS
        	$subcategorias = $produto->subcategorias($valor["id"]);
            if (count($subcategorias) > 0) {
            	echo '<ul>';
	            foreach($subcategorias as $valor) {
	            	echo "<li><a href='".URL_SITE."produtos/subcategoria/".$valor["id_subcategoria"]."'>".$valor["nome_".$_SESSION["idioma"]."_subcategoria"]."</a></li>";
	            }
	            echo '</ul></li>';
	        } else {
		        echo '</li>';
	        }
        }
        echo '</ul>';
    }
    ?>
    <br style="clear:both" />
    <p class="tit_procurar"><?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_produtos"]["menu_buscar"]["titulo"]?></p>
    <div class="busca">
    	<form id="formBuscar" id="formBuscar" onsubmit="return false;">
    		<input type="hidden" name="acao" value="buscar" />
	    	<p><?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_produtos"]["menu_buscar"]["mensagem"]?></p>
	    	<input type="text" name="busca" id="busca" class="busca" placeholder="xxxxxxxxxxx" onchange="$('#formBuscar #btn_buscar').click();" />
	    	<input type="button" name="btn_buscar" id="btn_buscar" class="btn_pequeno" value="<?=$_LANGUAGE[$_SESSION["idioma"]]["pagina_produtos"]["menu_buscar"]["btn"]?>" />
    	</form>
        <br style="clear:both" /><br style="clear:both" />
    </div>
    <br style="clear: both;">
</div>
<script>
$(document).ready(function(){ $("#navmenu-h li,#navmenu-v li").hover( function() { $(this).addClass("iehover"); }, function() { $(this).removeClass("iehover"); } ); });
</script>