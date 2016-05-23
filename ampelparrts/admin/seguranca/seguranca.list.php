<?php
	$tituloPagina = "Segurança - Usuários";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");	
?>
	<form>
		<table id="dataGrid" style="display:none"></table>
	</form>
	<script type="text/javascript">
		$("#dataGrid").flexigrid({
			url: 'seguranca.datagrid.php',
			dataType: 'xml',
			colModel : [
				{display: 'ID', name : 'usuario_id', width : 40, sortable : true, align: 'center'},
				{display: 'Nome', name : 'usuario_nome', width : 250, sortable : true, align: 'left'},
				{display: 'Login', name : 'usuario_login', width : 150, sortable : true, align: 'left'},
				{display: 'E-mail', name : 'usuario_email', width : 250, sortable : true, align: 'left'}
				],
			buttons : [
				{name: 'Adicionar', bclass: 'add', onpress : doCommand},
		        {name: 'Editar', bclass: 'edit', onpress : doCommand},
		   		{name: 'Excluir', bclass: 'delete', onpress : doCommand},
		   		{separator: true}
		   		],		
			searchitems : [
				{display: 'ID', name : 'usuario_id'},
				{display: 'Nome', name : 'usuario_nome', isdefault: true},
				{display: 'Login', name : 'usuario_login'},
				{display: 'E-mail', name : 'usuario_email'}
				],
			sortname: "usuario_id",
			sortorder: "asc",
			usepager: true,
			title: 'Usuários',
			useRp: true,
			rp: 10,
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
					popup('seguranca.form.php?id='+id, 'seguranca'+id, 450, 370);  
				});
			} else if (com == 'Excluir') {
				$('.trSelected', grid).each(function() {
					var id = $(this).attr('id');
					id = id.substring(id.lastIndexOf('row')+3);
					if (confirm('Tem certeza que deseja excluir o registro: '+id)) { 
						$.ajax({type: "POST",
								url: "seguranca.valida.ajax.php",
								data: "excluir="+id,
								success: function(retorno){
									mensagemGrow('Usuários', 'Registro excluído com sucesso!', 'ok');
									$('#dataGrid').flexReload();
								}		
						}); 
					}
				}); 
			} else if (com == 'Adicionar') {
				popup('seguranca.form.php', 'seguranca', 450, 370);
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