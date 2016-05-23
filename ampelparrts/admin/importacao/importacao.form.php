<?php
	ini_set('max_execution_time', 0);
	ini_set("auto_detect_line_endings", true);
	ini_set('memory_limit', '512M');
	
	$tituloPagina = "Importação";
	include_once("../includes/top.admin.func.php");
	include_once("../includes/top.admin.inc.php");	
	
	$passo = $_REQUEST["passo"];
	
	# ROTINA PARA GRAVAR ATUALIZAÇÕES
	$arqEnviado = "";
	if ($passo == "2") {
		
		# ENVIANDO O ARQUIVO
		$arquivo = $_FILES['arquivo']['name'];
		$count = 0;
		$reg = 0;
		move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo);
		
		
		/* ANTIGO  */
		if ($arquivo != "") {
			$fp = fopen ($arquivo, "r");
			$count = 0;
			while (!feof ( $fp)) {		
				$linha = fgets($fp, 4096);
				if ($linha != '') {
					if ($count == 0) {
						$arqEnviado[] = explode($_REQUEST["separador"], $linha);
						$count = 1;	
					}
					$sql = "INSERT INTO importacao VALUES (default, '".$linha."', '".$arquivo."')";
					executaSql(CONEXAO, $sql);
				}			
				if ($reg == 10) break;
				$reg++;
			}
			fclose ($fp);
			$reg = count(file($arquivo));
		}
		//unlink($arquivo); 
	} elseif ($passo == "3") {
		$arquivo = $_REQUEST["arquivo"];
		$sql = "SELECT * FROM importacao WHERE arquivo = '".$_REQUEST["arquivo"]."' ";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		$arqEnviado[] = explode($_REQUEST["separador"], $dadosRetorno[0]["linha"]);	
		$reg = count($dadosRetorno);
		$erro = 0;


		if ($_REQUEST["titulo"] == "" || $_REQUEST["codigo"] == "") {
			$erro = 1;
			$passo = 2;
			$msg="<p>Preencha os campos OBRIGATÓRIOS (*) para prosseguir...</p><br />";
		}
		
		if ($erro == 0) {
			$sqlINSERT = "";
			$sqlUPDATE = "";
			$arquivoIMPORTAR = "arquivoIMPORTAR.sql"; 
			$arqIMPORTAR = fopen($arquivoIMPORTAR, 'w');
			$regAtualizado = 0;
			$regInserir = 0;
			
			if ($_REQUEST)
			foreach ($_REQUEST as $index => $valor)
				$_REQUEST[$index] = trim(addslashes($valor));

			$fp = fopen ($arquivo, "r");
			$i = 0;
			while (!feof ( $fp)) {		
				$linha = fgets($fp, 4096);
				if ($linha != '') {
					$strLinha = preg_replace("/\r?\n/","", $linha);
					$campos = explode($_REQUEST["separador"], trim($strLinha));	
					//$campos = explode($_REQUEST["separador"], $linha);
					
					if ($_REQUEST["cabecalho"] != "" && $i == 0) {
						$i++;
						continue;
					}
										
					# PARAMETROS
					$dados = "";
					$dados["titulo"] = "";
					$dados["marca"] = "";
					$dados["descricao"] = "";
					$dados["codigo"] = "";
					$dados["codigo_invisivel"] = "";

					if ($_REQUEST["titulo"] != "" ) $dados["titulo"] = $campos[$_REQUEST["titulo"]];
					if ($_REQUEST["marca"] != "" ) $dados["marca"] = $campos[$_REQUEST["marca"]];
					if ($_REQUEST["descricao"] != "" ) $dados["descricao"] = $campos[$_REQUEST["descricao"]];
					if ($_REQUEST["codigo"] != "" ) $dados["codigo"] = $campos[$_REQUEST["codigo"]];
					if ($_REQUEST["codigo_invisivel"] != "" ) $dados["codigo_invisivel"] = $campos[$_REQUEST["codigo_invisivel"]];
					
					if ($_REQUEST["delimitador"] != "") {
						if($dados)
						foreach ($dados as $index => $valor)
							$dados[$index] = str_replace($_REQUEST["delimitador"], "", $valor);
					}
					
					# VERIFICAR SE EXISTE
					$sql2 = "SELECT * FROM produto_importados WHERE titulo = '".trim(addslashes($campos[$_REQUEST["titulo"]]))."' AND codigo = '".trim(addslashes($campos[$_REQUEST["codigo"]]))."'";
					$dadosRegistro = montaVetor(executaSql(CONEXAO, $sql2));
					$reg = (count($dadosRegistro) > 0 ? $dadosRegistro[0] : "");	
					# INCLUSAO
					if ( ($_REQUEST["acao"] == "3" || $_REQUEST["acao"] == "1") && $reg == "") {
						//inserirRegistro(CONEXAO, "produto_importados", $dados);
						fwrite($arqIMPORTAR, "INSERT INTO produto_importados VALUES (default, '".trim(addslashes($dados["titulo"]))."', '".trim(addslashes($dados["codigo"]))."','".trim(addslashes($dados["codigo_invisivel"]))."',1, '".trim(addslashes($dados["marca"]))."','".trim(addslashes($dados["descricao"]))."');\r\n"); 
						$regInserir++;
					}
					# ATUALIZACAO
					if ( ($_REQUEST["acao"] == "3" || $_REQUEST["acao"] == "2") && $reg != "" && $reg["titulo"] != ""){
						//alterarRegistro(CONEXAO, "produto_importados", "id", $reg["id"], $dados); 
						fwrite($arqIMPORTAR, "UPDATE produto_importados SET titulo = '".trim(addslashes($dados["titulo"]))."', codigo = '".trim(addslashes($dados["codigo"]))."', codigo_invisivel = '".trim(addslashes($dados["codigo_invisivel"]))."', marca = '".trim(addslashes($dados["marca"]))."', descricao = '".trim(addslashes($dados["descricao"]))."' WHERE  id = ".$reg["id"].";\r\n"); 
						$regAtualizado++;
					}
				}
				$i++;
			}
			fclose ($fp);
			/*
			foreach ($dadosRetorno as $i => $linha) {
				
				$strLinha = preg_replace("/\r?\n/","", $linha["linha"]);
				$campos = explode($_REQUEST["separador"], trim($strLinha));	
				
				if ($_REQUEST["cabecalho"] != "" && $i == 0) continue;
				
				
					# PARAMETROS
					$dados = "";
					
					if ($_REQUEST["titulo"] != "" ) $dados["titulo"] = $campos[$_REQUEST["titulo"]];
					if ($_REQUEST["marca"] != "" ) $dados["marca"] = $campos[$_REQUEST["marca"]];
					if ($_REQUEST["descricao"] != "" ) $dados["descricao"] = $campos[$_REQUEST["descricao"]];
					if ($_REQUEST["codigo"] != "" ) $dados["codigo"] = $campos[$_REQUEST["codigo"]];
					if ($_REQUEST["codigo_invisivel"] != "" ) $dados["codigo_invisivel"] = $campos[$_REQUEST["codigo_invisivel"]];
					
					if ($_REQUEST["delimitador"] != "") {
						if($dados)
						foreach ($dados as $index => $valor)
							$dados[$index] = str_replace($_REQUEST["delimitador"], "", $valor);
					}
					
					# VERIFICAR SE EXISTE
					$sql2 = "SELECT * FROM produto_importados WHERE titulo = '".trim(addslashes($campos[$_REQUEST["titulo"]]))."' AND codigo = '".trim(addslashes($campos[$_REQUEST["codigo"]]))."'";
					$dadosRegistro = montaVetor(executaSql(CONEXAO, $sql2));
					$reg = (count($dadosRegistro) > 0 ? $dadosRegistro[0] : "");	
					
					# INCLUSAO
					if ( ($_REQUEST["acao"] == "3" || $_REQUEST["acao"] == "1") && $reg == "") {
						inserirRegistro(CONEXAO, "produto_importados", $dados);
						$regInserir++;
					}
					# ATUALIZACAO
					if ( ($_REQUEST["acao"] == "3" || $_REQUEST["acao"] == "2") && $reg != "" && $reg["titulo"] != ""){
						alterarRegistro(CONEXAO, "produto_importados", "id", $reg["id"], $dados); 
						$regAtualizado++;
					}

			}
			*/
			executaSql(CONEXAO, "DELETE FROM importacao");
			unlink($dadosRetorno[0]["arquivo"]); 
			//echo "mysql -u ".USUARIO." -p'".SENHA."' -h localhost ".BANCODEDADOS." < ".PATH_ABSOLUTO."/admin/importacao/arquivoIMPORTAR.sql > /dev/null &";
			exec("mysql -u ".USUARIO." -p'".SENHA."' -h localhost ".BANCODEDADOS." < ".PATH_ABSOLUTO."/admin/importacao/arquivoIMPORTAR.sql > /dev/null &");
			unlink("arquivoIMPORTAR.sql"); 
		}
		
	}
?>
<style>
#formas_pagamento {
	text-align:center;
	width: 100%;
	display: inline-block;
}
#formas_pagamento p {
	width: 90px;
	background-color:#DBDBDB;
	float:left;
	padding:10px;
	margin: 10px;
	border: 1px #CCC solid;
	
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-moz-box-shadow:0 0 15px #aaa;
	-webkit-box-shadow:0 0 15px #aaa;
}
.aviso {
	background-color: #a72525;
	color: #ffd;
	border: 1px solid #6b0505;
	padding: 15px;
}
</style>
<?php 
	if (empty($_REQUEST["passo"]) || $passo == "1") { 
		executaSql(CONEXAO, "DELETE FROM importacao");
?>
<form id="form02" name="form02" method="post" enctype="multipart/form-data" />
	<input type="hidden" value="2" name="passo" />	
	<br clear="all" />
	<h1 style="width: 95%">1. Detalhes do arquivo</h1>
	<p>
		<label>Conteúdo Cabeçalhos:</label>
		<input type="checkbox" name="cabecalho" />
	</p>
	<p>
		<label>Separador:</label>
		<a href="javascript:void(0)" name="ajuda" id="ajuda">
			<img style="vertical-align: middle" alt="Ajuda" src="http://www.signoweb.com.br/lojas/template/padrao/icones/ajuda.png">
			<span>Informar o caracter que separa os campos (colunas), exemplos: ; , .</span>
		</a>
		<input type="text" name="separador" value=";" style="width: 30px; text-align: center;" maxlength="3" />
	</p>
	<p>
		<label>Delimitador de Campos:</label>
		<input type="text" name="delimitador" value='' style="width: 30px; text-align: center;" maxlength="3" />
	</p>
	<p>
		<label>Selecione o arquivo:</label>
		<input type="file" name="arquivo" />
	</p>
	<a href="#" onclick="document.form02.submit();" class="button"><span class="btn_save">Enviar</span></a>
</form>
<?php } ?>



<?php if ($passo == "2") { ?>
<form id="form02" name="form02" method="post" enctype="multipart/form-data" />
	<input type="hidden" value="3" name="passo" />	
	<input type="hidden" value="<?=$arquivo?>" name="arquivo" />	
	<input type="hidden" value="<?=$_REQUEST["cabecalho"]?>" name="cabecalho" />	
	<input type="hidden" value="<?=$_REQUEST["separador"]?>" name="separador" />	
	<input type="hidden" value="<?=$_REQUEST["delimitador"]?>" name="delimitador" />	
	<h1 style="width: 95%">Tabela: PRODUTOS IMPORTADOS</h1>
	<h1 style="width: 95%">Arquivo: <?=$reg?> linhas.</h1>	
	<br clear="all" />
	<?=$msg?>
	<h1 style="width: 95%">1. Ações no momento da importação.</h1>
	<p>
		<label>Ações:</label> => 
		<select name="acao">
			<option value="1">Incluir</option>
			<option value="2">Atualizar</option>
			<option value="3">Incluir e Atualizar</option>
		</select>
	</p>
	<h1 style="width: 95%">2. Vincule os campos que deseja importar.</h1>
	<p>
		<label>*TÍTULO</label> => 
		<select name="titulo">
			<option value="">Nenhum</option>
			<?php
			if (count($arqEnviado) > 0) {
				if (count($arqEnviado[0]) > 0) {
					foreach ($arqEnviado[0] as $i => $valor) {
						echo "<option value='".$i."'>".$valor."</option>";
					}
				}
			}
			?>
		</select>
	</p>
	<p>
		<label>MARCA</label> => 
		<select name="marca">
			<option value="">Nenhum</option>
			<?php
			if (count($arqEnviado) > 0) {
				if (count($arqEnviado[0]) > 0) {
					foreach ($arqEnviado[0] as $i => $valor) {
						echo "<option value='".$i."'>".$valor."</option>";
					}
				}
			}
			?>
		</select>
	</p>
	<p>
		<label>DESCRIÇÃO</label> => 
		<select name="descricao">
			<option value="">Nenhum</option>
			<?php
			if (count($arqEnviado) > 0) {
				if (count($arqEnviado[0]) > 0) {
					foreach ($arqEnviado[0] as $i => $valor) {
						echo "<option value='".$i."'>".$valor."</option>";
					}
				}
			}
			?>
		</select>
	</p>
	<p>
		<label>*CÓDIGO VISIVEL</label> => 
		<select name="codigo">
			<option value="">Nenhum</option>
			<?php
			if (count($arqEnviado) > 0) {
				if (count($arqEnviado[0]) > 0) {
					foreach ($arqEnviado[0] as $i => $valor) {
						echo "<option value='".$i."'>".$valor."</option>";
					}
				}
			}
			?>
		</select>
	</p>
	<p>
		<label>CÓDIGO INVISIVEL</label> => 
		<select name="codigo_invisivel">
			<option value="">Nenhum</option>
			<?php
			if (count($arqEnviado) > 0) {
				if (count($arqEnviado[0]) > 0) {
					foreach ($arqEnviado[0] as $i => $valor) {
						echo "<option value='".$i."'>".$valor."</option>";
					}
				}
			}
			?>
		</select>
	</p>
	<a href="#" onclick="document.form02.submit();" class="button"><span class="btn_save">Importar</span></a>
</form>
<?php } ?>

<?php if ($passo == "3") { ?>
<form>
	<h1 style="width: 95%">3. Importação finalizada.</h1>
	Quantidade de registros adicionados: <?=$regInserir?><br />
	Quandidade de registros atualizados: <?=$regAtualizado?>
</form>
<?php } ?>

<?php
include("../includes/rod.admin.inc.php");
?>
