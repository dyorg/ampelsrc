<?php
	$popup = "produto_importados";
	$tituloPagina = "Importa��o - Produtos";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");	
?>
	<form>
		<table id="dataGrid" style="display:none"></table>
	</form>
	<script type="text/javascript">
		$("#dataGrid").flexigrid({
			url: 'datagrid.php',
			dataType: 'xml',
			colModel : [
				{display: 'ID', name : 'id', width : 40, sortable : true, align: 'center'},
				{display: 'T�tulo', name : 'titulo', width : 200, sortable : true, align: 'left'},
				{display: 'Marca', name : 'marca', width : 200, sortable : true, align: 'left'},
				{display: 'C�d. Visivel', name : 'codigo', width : 200, sortable : true, align: 'left'},
				{display: 'C�d. Invisivel', name : 'codigo_invisivel', width : 400, sortable : true, align: 'left'}
				],
			buttons : [
		        {name: 'Editar', bclass: 'edit', onpress : doCommand},
		   		{name: 'Adicionar', bclass: 'add', onpress : doCommand},
		   		{name: 'Excluir', bclass: 'delete', onpress : doCommand},
		   		{separator: true}
		   		],		
			searchitems : [
				{display: 'ID', name : 'id'},
				{display: 'Titulo', name : 'titulo', isdefault: true}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: 'Importa��o - Produtos',
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
					popup('form.php?id='+id, '<?=$popup?>', 780, 600);
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
									mensagemGrow('<?=$tituloPagina?>', 'Registro exclu�do com sucesso!', 'ok');
									$('#dataGrid').flexReload();
								}		
						}); 
					}
				});
			} else if (com == 'Adicionar') { 
				popup('form.php', '<?=$popup?>', 780, 600);
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