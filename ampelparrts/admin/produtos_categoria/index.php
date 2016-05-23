<?php
	$popup = "produto_categoria";
	$tituloPagina = "Produtos - Categorias / Subcategorias";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");	
	?>
	<script type="text/javascript"> 
	<!--
		function remover(tabela, id) {
			$.ajax({type: "POST",
				url: "valida.ajax.php",
				data: "excluir="+id+"&tabela="+tabela,
				success: function(retorno){
					mensagemGrow('Categoria', 'Registro excluído com sucesso!', 'ok');
					$('#dataGrid').flexReload(); 
				}		
			}); 
		}
	//-->
	</script>
	<form>
		<table id="dataGrid" style="display:none"></table>
	</form>
	<script type="text/javascript">
		$("#dataGrid").flexigrid({
			url: 'datagrid.php',
			dataType: 'xml',
			colModel : [
				{display: 'Categoria', name : 'nome_portugues', width : 300, sortable : true, align: 'left'},
				{display: 'Sub-Categoria', name : 'nome_portugues_subcategoria', width : 300, sortable : true, align: 'left'},
				],
			buttons : [
		   		{name: 'Adicionar Categoria', bclass: 'add', onpress : doCommand},
		   		{name: 'Adicionar Sub-Categoria', bclass: 'add', onpress : doCommand},
		   		{separator: true}
		   		],		
			searchitems : [
				{display: 'Categoria', name : 'nome_portugues', isdefault: true},
				{display: 'Sub-Categoria', name : 'nome_portugues_subcategoria'}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: 'Categorias',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: "100%",
			onSubmit: addFormData,
			height: "100%",
			singleSelect: true
		});
					
		function addFormData(){
			var dt = $('#sform').serializeArray();
			$("#dataGrid").flexOptions({params: dt});
			return true;
		}
		
		function doCommand(com, grid) {
			if (com == 'Adicionar Sub-Categoria') {
				popup('form2.php', '<?=$popup?>', 450, 350);
			} else if (com == 'Adicionar Categoria') { 
				popup('form.php', '<?=$popup?>', 450, 350);
			} else if (com == 'Imagem Categoria') {
				$('.trSelected', grid).each(function() {
					var id = $(this).attr('id');
					id = id.substring(id.lastIndexOf('row')+3);
					popup('../produtos_categoria_imagem/form.php?id_categoria='+id, '<?=$popup?>', 550, 500);
				});
			}  
		}		
			
		$('#sform').submit(function (){
			$('#dataGrid').flexOptions({newp: 1}).flexReload();
			return false;
		});

	</script>
	<?
	include("../includes/rod.admin.inc.php");
	include("../includes/rod.admin.func.php");
?>