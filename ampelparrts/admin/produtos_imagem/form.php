<?php
	define('TITULO_PAGINA',	'Produto - Imagem');

	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.popup.admin.inc.php");

	include_once("class.php");

	$imagem = new imagem;
	$imagem->id = $_REQUEST["id"];
	$imagem->id_produto = $_REQUEST["id_produto"];
	
	$imagem->vetorArray["ordenar"] = "id";
	$imagem->vetorArray["por"] = "ASC";
	$imagem->valida();
	$dadosImagem = $imagem->listar();			
?>
<style>
	.img_item {
		float: left;
		position: relative;
		border: 1px solid #e9e9e9;
		padding: 10px;
		margin: 5px;
		background-color: #fff;
		width: 120px;
		text-align: center;
	}
	.img_item:hover {
		background-color: #f4f4f4;
	}
</style>
<script>
	
	function listagemAtualizar() {
		$.ajax({
	      url: "upload.php",
	      type: "post",
	      data: {acao: "listarHTML", id_produto: "<?=$_REQUEST["id_produto"]?>"},
	      success: function(data){
	      	  $("#listagem_total_img").html(data);
	      }   
	    }); 
	}
	
	function atualizarQuantidade(op='+') {
		window.opener.$('#dataGrid').flexReload();
      	var total = parseInt($("#total_img").html());
     	$("#total_img").html( (op == '+') ? (total+1)+"" : (total-1)+"" );
	}
	
	
</script>
<form>
	<?php
		$imagem = $imagem->formulario();
	?>
	<h1>Produto: <?=$dadosImagem[0]["nome_produto"]?></h1>
	<div id="uploader">
		<p>Seu navegador não suporta Flash, Silverlight, Gears, BrowserPlus ou HTML5.</p>
	</div>
	<br />
	<h1>Lista de imagens enviadas (<span id="total_img"><?=($dadosImagem[0]["id"] != "") ? count($dadosImagem) : "0"?></span>)</h1>
	<div id="listagem_total_img">
	<?php
		if ($dadosImagem[0]["id"]) {
			foreach ($dadosImagem as $index => $valor) {
	?>
			<div class="img_item" id="list_img_<?=$valor["id"]?>">
				<img src="../../images/_produto/<? if (file_exists($valor["id_produto"]."/p/".$valor["id"].$valor["imagem"])) { echo $valor["id_produto"]."/p/".$valor["id"].strtoupper($valor["imagem"]); } else { echo $valor["id_produto"]."/p/".$valor["id"].strtolower($valor["imagem"]); }?>" width="75" />
				<br style="clear: both;">
  				<p style="float: right; position: relative;"><a href="javascript: if (confirm('Tem certeza que deseja excluir essa imagem? ')) {  excluirImagem('<?=$valor["id"]?>', '<?=$valor["id_produto"]?>'); }"><img src="../images/icones/btn-deletar.gif" width="25" height="25" border="0" /></a></p>
  				<p style="text-align: left; width: 100px;">
  					<label style="width: 90px;">Ordem:</label>
  					<input type="text" name="ordem_img_<?=$valor["id"]?>" id="ordem_img_<?=$valor["id"]?>" value="<?=$valor["ordem"]?>" style="text-align: center; width: 35px;" /><input type="button" value="Ok" onclick="alterarQuantidade(<?=$valor["id"]?>)" />
  				</p>
  			</div>
	<?php
			}
		} else {
			echo "<div class='img_item'>Nenhuma imagem cadastrada.</div>";
		}
	?>
	</div>
	<br style="clear:both;" />
</form>
<script type="text/javascript">
// Convert divs to queue widgets when the DOM is ready
$(function() {
	$("#uploader").pluploadQueue({
		runtimes : 'gears,html5,flash,silverlight,browserplus',
		url : 'upload.php?acao=inserir&id_produto=<?=$_REQUEST["id_produto"]?>',
		max_file_size : '5mb',
		chunk_size : '1mb',
		unique_names : true,
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"}
		],
		flash_swf_url : '../js/plupload.flash.swf',
		silverlight_xap_url : '../js/plupload.silverlight.xap',
		init : {
			FileUploaded: function(up, file, info) {
				// Após o termino do envio de cada arquivo da lista
				atualizarQuantidade();
			},
			StateChanged: function(up) {
				// Chamado no start, e quando finaliza a lista inteira
                var status = (up.state == plupload.STARTED ? "STARTED" : "STOPPED");
                if (status == "STOPPED") {
	            	listagemAtualizar();    
                }
            }
		}
	});

	$('form').submit(function(e) {
        var uploader = $('#uploader').pluploadQueue();
        if (uploader.files.length > 0) {
            uploader.bind('StateChanged', function() {
                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                    $('form')[0].submit();
                }
            });
            uploader.start();
        } else {
            alert('You must queue at least one file.');
        }
        return false;
    });
});

function alterarQuantidade(id) {
	var novaOrdem = $("#ordem_img_"+id).val();
	$.ajax({
      url: "upload.php",
      type: "post",
      data: {acao: "alterarOrdem", id: id, ordem: novaOrdem},
      success: function(data){
      	  alert('Ordem atualizada com sucesso!');
      	  //alert(data);
      }   
    }); 
}

	function excluirImagem(id, id_produto) {
		$("#list_img_"+id).append("<p>removendo, aguarde...</p>");
		$.ajax({
	      url: "upload.php",
	      type: "post",
	      data: {acao: "excluir", id: id, id_produto: id_produto},
	      success: function(data){
	      	  $("#list_img_"+id).remove();
	      	  atualizarQuantidade('-');
	      }   
	    }); 
	}
</script>
<?php
	include_once("../includes/rod.popup.admin.inc.php");
	include_once("../includes/rod.admin.func.php");
?>