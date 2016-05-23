<?php
	$popup = "video";
	$tituloPagina = "Vídeos";
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
				{display: 'Título', name : 'nome', width : 300, sortable : true, align: 'left'},
				{display: 'Vídeo', name : 'url', width : 300, sortable : true, align: 'left'},
				{display: 'Ordem', name : 'ordem', width : 100, sortable : true, align: 'left'}
				],
			buttons : [
		        {name: 'Editar', bclass: 'edit', onpress : doCommand},
		   		{name: 'Adicionar', bclass: 'add', onpress : doCommand},
		   		{name: 'Excluir', bclass: 'delete', onpress : doCommand},
		   		{separator: true}
		   		],		
			searchitems : [
				{display: 'Título', name : 'nome', isdefault: true}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: 'Vídeo',
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
			if (com == 'Editar') {
				$('.trSelected', grid).each(function() {
					var id = $(this).attr('id');
					id = id.substring(id.lastIndexOf('row')+3);
					popup('form.php?id='+id, '<?=$popup?>', 580, 400);
				});
			} else if (com == 'Excluir') {
				$('.trSelected', grid).each(function() {
					var id = $(this).attr('id');
					id = id.substring(id.lastIndexOf('row')+3);
					if (confirm('Tem certeza que deseja excluir o registro: '+id)) { 
						$.ajax({type: "POST",
								url: "valida.ajax.php",
								data: "excluir="+id,
								success: function(retorno){
									mensagemGrow('<?=$tituloPagina?>', 'Registro excluído com sucesso!', 'ok');
									$('#dataGrid').flexReload();
								}		
						}); 
					}
				});
			} else if (com == 'Adicionar') { 
				popup('form.php', '<?=$popup?>', 580, 400);
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