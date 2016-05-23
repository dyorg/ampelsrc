<?php 
	session_start();
	if ($_SESSION['idioma'] == "")  {
		$_SESSION["idioma"] = "portugues";
	}
	require_once("config.php");
	require_once("classes/language.php");
	require_once("classes/func.banco.php");
	require_once("classes/func.geral.php");
	require_once("classes/class.conteudo.php");
	require_once("classes/class.banners.php");
	require_once("classes/class.produtos.php");
	require_once("classes/class.paginacao.php");
	
	$conexao = conectar(SERVIDOR, BANCODEDADOS, USUARIO, SENHA);
	define('CONEXAO', $conexao);
	
	# INTANCIAR AS CLASSES
	$conteudo = new conteudo;
	$banners = new banners;
	$paginacao = new paginacao;
	$produto = new produtos;
			
	###########################################
	# INICIO URL AMIGAVEIS
	###########################################
	# PEGANDO INFORMAÇÕES DA URL
	$ativarCadastro = false;
	$indice = (AMBIENTE_SIGNOWEB == true) ? "3" : "0";
	$parametros = explode("/",str_replace(strrchr($_SERVER["REQUEST_URI"], "?"), "", $_SERVER["REQUEST_URI"]));	
	array_shift($parametros);	
	//print_r($parametros);
	if (empty($_REQUEST['page']) || $_REQUEST['page'] == "" ) {
		if ($parametros[$indice] == "" || $parametros[$indice] == "index.php") {
			$page = "principal";
		} else {
			//$page_origem = $parametros[$indice];
			//$parametros = $seo->urlRedirecionar($parametros, $indice); 
			$page =	$parametros[$indice];
		}
		$id = $parametros[($indice+1)];
		if ($page == "categoria" || $page == "subcategoria") {
			$pagina = ($parametros[($indice+2)] == "") ? "1" : $parametros[($indice+2)];
		} elseif ($page == "loja") {
			$pagina = ($parametros[($indice+3)] == "") ? "1" : $parametros[($indice+3)];
		} else {
			$pagina = ($parametros[($indice+1)] == "") ? "1" : $parametros[($indice+1)];
		}
	} else {
		$page = $_REQUEST['page'];
		$id = $_REQUEST["id"];
		$pagina = ($_REQUEST["pagina"] == "") ? "1" : $_REQUEST["pagina"];
	}
	###########################################
	# FIM URL AMIGAVEIS
	###########################################
	mysql_query("SET CHARACTER SET 'utf8';", $conexao)or die(mysql_error());
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ampel Parts</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<meta name="author" content="signoweb.com.br"/>
	<meta name="description" content="descricao da pagina"/>
	<meta name="keywords" content="ampel"/>
	
	<meta name="google-site-verification" content="wH2yRMrlv4V6kzFtpHtCP0Uu5R8lSMqTFE1Fa2QcAQw" />
	
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
	
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
	
    <script class="rs-file" src="<?=URL_SITE?>/assets/royalslider/jquery-1.8.3.min.js"></script>
	
	<script src="<?=URL_SITE?>js/mask.js"></script>
	<script src="<?=URL_SITE?>js/modernizr.js"></script>
	<script src="<?=URL_SITE?>js/jquery.site.js"></script>
	
	<!-- FANCYBOX !-->
	<script type="text/javascript" src="<?=URL_SITE?>js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<link rel="stylesheet" href="<?=URL_SITE?>js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=URL_SITE?>js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" href="<?=URL_SITE?>js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=URL_SITE?>js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?=URL_SITE?>js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<link rel="stylesheet" href="<?=URL_SITE?>js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=URL_SITE?>js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <!-- FANCYBOX !--> 
    
    <!-- INICIO BANNER !-->
    <script class="rs-file" src="/assets/royalslider/jquery.royalslider.min.js"></script>
    <link class="rs-file" href="/assets/royalslider/royalslider.css" rel="stylesheet">
    <script src="/assets/preview-assets/js/highlight.pack.js"></script>
    <script> hljs.initHighlightingOnLoad();</script>
    <link href="/assets/preview-assets/css/reset.css" rel="stylesheet">
    <link href="/assets/preview-assets/css/smoothness/jquery-ui-1.8.22.custom.css" rel="stylesheet">
    <link href="/assets/preview-assets/css/github.css" rel="stylesheet">
    <link class="rs-file" href="../assets/royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">
    <!-- FIM NOVO BANNER !-->
    
     <link href='<?=URL_SITE?>css/style.css' rel='stylesheet' />
    
</head>
<body>
<div id="topo">
	<div class="conteudo">
    	<div class="logo" onclick="location.href='<?=URL_SITE?>index.php'"></div>
    	<div class="menu_idioma">
        	<a href="#" data-idioma="russo" class="russo"><img src="<?=URL_SITE?>images/bandeira_russia.jpg" width="21" height="14" alt="" title="Russo" /></a>
        	<a href="#" data-idioma="arabe"><img src="<?=URL_SITE?>images/bandeira_arabe.jpg" width="21" height="14" alt="" title="Árabe" /></a>
            <a href="#" data-idioma="frances"><img src="<?=URL_SITE?>images/bandeira_frances.jpg" width="21" height="14" alt="" title="Francês" /></a>
            <a href="#" data-idioma="espanhol"><img src="<?=URL_SITE?>images/bandeira_espanhol.jpg" width="21" height="14" alt="" title="Espanhol" /></a>
            <a href="#" data-idioma="ingles"><img src="<?=URL_SITE?>images/bandeira_ingles.jpg" width="21" height="14" alt="" title="Inglês" /></a>
            <a href="#" data-idioma="portugues"><img src="<?=URL_SITE?>images/bandeira_brasil.jpg" width="21" height="14" alt="" title="Brasileiro" /></a>           
            <p><?=$_LANGUAGE[$_SESSION["idioma"]]["topo"]["idioma"]?>:</p>
        </div>
        <br /><br />
    	<div class="menu">
        	<p onclick="location.href='<?=URL_SITE?>contato'"><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["contato"]?></p>
        	<p onclick="location.href='<?=URL_SITE?>conteudo/4/localizacao'"><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["localizacao"]?></p>
        	<p onclick="location.href='<?=URL_SITE?>produtos'"><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["produtos"]?></p>
        	<p onclick="location.href='<?=URL_SITE?>conteudo/2/servicos'"><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["servicos"]?></p>
        	<p onclick="location.href='<?=URL_SITE?>conteudo/1/quem-somos'"><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["quem-somos"]?></p>
        	<p onclick="location.href='<?=URL_SITE?>'"><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["home"]?></p>
        </div>
    </div>
</div>
<?php if (empty($page) || $page == "" || $page == "principal") { ?>
	<hr id="hr_banner" />
	<div id="banner"> 
		<div class="sliderContainer fullWidth clearfix">
			<div id="full-width-slider" class="royalSlider heroSlider rsMinW">
			  <?php
		    	$banners->id = "";
		    	$banners->where = " tipo = 'banner1' AND idioma = '".$_SESSION["idioma"]."' ";
		    	$banners->limit = "";
		    	$banners->orderBy = " id ASC ";
		    	$listar = $banners->listar();
		    	if (count($listar) > 0)
		    	foreach($listar as $indice => $valor) {
		    		?>
		    		<div class="rsContent">
					    <a href="<?=($valor["url"] == "" ? "#" : $valor["url"])?>">
					    <img class="rsImg" src="<?=URL_SITE?>images/_configuracao/<?=$valor["id"]?><?=$valor["imagem"]?>" alt="" />
					    </a>
					</div>
		    		<?php
		    	}
			  ?>
			</div>
		</div>    
	</div>
		<script id="addJS">jQuery(document).ready(function($) {
	  $('#full-width-slider').royalSlider({
	    arrowsNav: true,
	    loop: true,
	    keyboardNavEnabled: true,
	    controlsInside: false,
	    imageScaleMode: 'fill',
	    arrowsNavAutoHide: false,
	    controlNavigation: 'bullets',
	    thumbsFitInViewport: false,
	    navigateByClick: true,
	    startSlideId: 0,
	    autoPlay: true,
	    transitionType:'move',
	    globalCaption: false,
	    deeplinking: {
	      enabled: true,
	      change: false
	    },
	    autoPlay: {
			enabled: true,
			pauseOnHover: true
		}
	  });
	});
	</script>
<?php } ?> 
<div id="conteudo">
	<?php
		if (empty($page) || $page == "") {
			include("paginas/principal.php");	
		} else {
			if (file_exists("paginas/".$page.".php")) {
				include("paginas/".$page.".php");
			} else if (file_exists($page_origem.".php")) {
				include($page_origem.".php");
			} else if (file_exists("paginas/".$page_origem.".php")) {
				include("paginas/".$page_origem.".php");	
			} else if (file_exists($page.".php")) {
				include($page.".php");
			} else {
				include("404.php");
			}
		}
	?>
	<br style="clear: both;" />
</div>
<br style="clear:both" />
<div id="rodape">
    <div class="conteudo_rdp">
        <div class="ampel">
        	<p class="titulo">Ampel Parts</p>
        	<a href="<?=URL_SITE?>"><p><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["home"]?></p></a>
            <a href="<?=URL_SITE?>conteudo/1/quem-somos"><p><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["quem-somos"]?></p></a>
			<a href="<?=URL_SITE?>conteudo/2/servicos"><p><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["servicos"]?></p></a>
			<a href="<?=URL_SITE?>produtos"><p><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["produtos"]?></p></a>
			<a href="http://www.ampelparts.com.br" target="_blank"><p><?=$_LANGUAGE[$_SESSION["idioma"]]["menu"]["loja-virtual"]?></p></a>
        </div>
        <div class="localizacao">
        	<p class="titulo"><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["localizacao"]?></p>
            <?php
				$conteudo->id = "5";
				$info = $conteudo->dados();
				echo ($info[0]["descricao_".$_SESSION["idioma"]]);
			?>
           	<div class="btn_mapa">
            	<img src="<?=URL_SITE?>images/icone_mapa.png" width="16" height="27" alt="" /><a href="<?=URL_SITE?>conteudo/4/localizacao"><p><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["ver_no_mapa"]?></p></a>
            </div>
        </div>
        <div class="atendimento">
        	<p class="titulo"><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["atendimento"]?></p>
            <?php
				$conteudo->id = "8";
				$info = $conteudo->dados();
				echo ($info[0]["descricao_".$_SESSION["idioma"]]);
			?>
            <div class="btn_form">
            	<a href="<?=URL_SITE?>contato"><img src="<?=URL_SITE?>images/icone_form.png" width="22" height="24" alt="" /><p><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["formulario-contato"]?></p></a>
            </div>
        </div>
        <div class="newsletter">
        	<p class="titulo"><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["newsletter"]?></p>
            <p style="font-size: 13px;"><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["newsletter-txt"]?></p>
            <form id="formNewsletter" name="formNewsletter">
            	<input type="hidden" name="acao" value="newsletter" />
            	<input type="text" name="nome" id="nome" class="nome" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["newsletter_nome"]?>" />
                <input type="email" name="email" id="email" class="email" placeholder="<?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["newsletter_email"]?>" />
                <input type="button" name="cadastrar" id="cadsatrar" class="btn_pequeno" value="<?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["newsletter_btn"]?>" />
            </form>
        </div>
        <br style="clear:both" />
        <hr />
        <div class="linha_rdp">
            <img src="<?=URL_SITE?>images/logo_ampel_rdp.png" width="42" height="38" alt="" /><p><?=$_LANGUAGE[$_SESSION["idioma"]]["rodape"]["direitos"]?></p>
            <a href="http://www.signoweb.com.br" target="_blank"><div class="selo_signo"></div></a>
        </div>
    </div>
</div>
</body>
</html>
