<?php
	$popup = "newsletter";
	$tituloPagina = "Newsletter";
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
				{display: 'Nome', name : 'nome', width : 300, sortable : true, align: 'left'},
				{display: 'Email', name : 'email', width : 300, sortable : true, align: 'left'},
				{display: 'Data Cadastro', name : 'data_cadastro', width : 200, sortable : true, align: 'left'},
				],
			buttons : [
		   		{name: 'Excluir', bclass: 'delete', onpress : doCommand},
		   		{separator: true},
		   		{name: 'Exportar E-mails', bclass: 'download', onpress : doCommand},
		   		],		
			searchitems : [
				{display: 'ID', name : 'id'},
				{display: 'Nome', name : 'nome', isdefault: true},
				{display: 'Email', name : 'email'}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: 'Nesletter',
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
			if (com == 'Excluir') {
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
			} else if (com == 'Exportar E-mails') { 
				popup('exportar.php', 'email', 770, 550);
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