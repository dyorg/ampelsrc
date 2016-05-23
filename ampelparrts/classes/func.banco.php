<?
function conectar($servidor, $bancoDeDados, $usuario , $senha)
{
    /* conecta com o banco da de dados */
    $conexao = mysql_connect($servidor, $usuario, $senha) OR die(mysql_error());
    /* seleciona o banco de dados */
    mysql_select_db($bancoDeDados, $conexao) OR die(mysql_error());
    //mysql_query("SET CHARACTER SET 'utf8';", $conexao)or die(mysql_error());
    /* retorna link de conexao */
    return $conexao;
}

function desconectar($conexao)
{
    /* deconecta com o banco da de dados */
    mysql_close($conexao) OR die(mysql_error());
}

function executaSql($conexao, $sql)
{
    global $SHOW;
//    $SHOW = true;
    if ($SHOW)
    {	
		echo "<hr>".$conexao. $sql ."<br><font color=\"red\">";
		@mysql_query($sql, $conexao)   or die (mysql_error());
		echo "</font><hr>";
	} else {
		return mysql_query($sql, $conexao);
   }
}

function inserirRegistro($conexao, $tabela, $vetor, $sqlE="")
{
    /* formando string dos campos e valores */
    foreach ($vetor as $campo => $valor) {
        @$campos .= $campo;
        @$valores .= "'" . utf8_decode(addslashes($valor)) . "'";

        if (@$i++ < count($vetor)-1) {
			$campos .= ', ';
			$valores .= ', ';
        }
    }

    /* formando query do sql */
    $sql = 'INSERT INTO ' . $tabela . ' (' . $campos . ') values (' . $valores . ');';
	//echo "Inserir: ".$sql."<br>"; break;
	
	if ($sqlE) {
		echo "Inserir:".$sql;
		//break;
	}

    /* executando query de sql */
    executaSql($conexao, $sql);
    return mysql_insert_id($conexao);

}


function alterarRegistro($conexao, $tabela, $campo_id, $valor_id, $vetor)
{
    /* formando string do campos e valores */
    foreach ($vetor as $campo => $valor) {
        //@$strQuery .= $campo . '=\'' . utf8_decode(addslashes($valor)) . '\'';
        @$strQuery .= $campo . '=\'' . (addslashes($valor)) . '\'';
        if (@$i++ < count($vetor)-1) {
            $strQuery .= ', ';
        }
    }
    /* formando query do sql */
    $sql = 'UPDATE ' . $tabela . ' SET ' . $strQuery . ' WHERE ' . $campo_id . '=\'' . $valor_id . '\';';

    //echo $sql; break;
	mysql_query("SET CHARACTER SET 'utf8';", $conexao)or die(mysql_error());
    /* executando query de sql */
    executaSql($conexao, $sql);
    
}

function excluirRegistro($conexao, $tabela, $campo_id, $valor_id)
{
    /* formando query do sql */
    $sql = 'DELETE FROM ' . $tabela . ' WHERE ' . $campo_id . '=\'' . $valor_id . '\';';

    /* executando query de sql */
    executaSql($conexao, $sql);
}


function registro($conexao, $tabela, $campo_id, $valor_id, $vetor = '*')
{
    /* formando query do sql */
    $sql = 'SELECT ' . camposConsultaHtmlSql($vetor) . ' FROM ' . $tabela . ' WHERE ' . $campo_id . '=\'' . $valor_id . '\';';

    /* executando query de sql */
    $resultado = executaSql($conexao, $sql);

    /* monta vetor e retorna*/	
    return montaVetor($resultado);
}

function montaVetor($retorno)
{
    /* verificando se existe alguma linha de resultado do MySQL */
    if (mysql_num_rows($retorno)) {
        /* jogando as linhas de resultado no vetor */
        while ($var = mysql_fetch_assoc($retorno)) {
            $vetor[] = $var;
	    }
    }
    /* retorna vetor */ 	
    return $vetor;
}


function camposConsultaHtmlSql($vetor)
{
	if($vetor != "*")
	{
		//select [campo1, campo2] from tabela
		$retorno = "";
		$totalElementos = count($vetor);
		while(list($chave, $valor) = each($vetor))
		{
			$retorno .= $valor;
			if($totalElementos > 1)
				$retorno .= ", ";
			$totalElementos--;
		}
		return $retorno;
	}
	else
		return "*";
}
?>