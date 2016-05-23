<?php
	function dataToSql($data)
	{
		if (strlen($data) == 10) {
			$DATA_ARRAY = explode("/", $data);
			return trim($DATA_ARRAY[2])."-".trim($DATA_ARRAY[1])."-".trim($DATA_ARRAY[0]);			
		} else{
			$DATA_ARRAY = explode(" ", $data);
			$DATA_DIA = explode("/", $DATA_ARRAY[0]);
			return trim($DATA_DIA[2])."-".trim($DATA_DIA[1])."-".trim($DATA_DIA[0])." ".$DATA_ARRAY[1];	
		}
	}
	
	function sqlToData($data)
	{
		if (strlen($data) == 10 or strlen($data) == 9) {
			$DATA_ARRAY = explode("-", $data);
			return trim($DATA_ARRAY[2])."/".trim($DATA_ARRAY[1])."/".trim($DATA_ARRAY[0]);
		} else{
			$DATA_ARRAY = explode(" ", $data);
			$DATA_DIA = explode("-", $DATA_ARRAY[0]);
			return trim($DATA_DIA[2])."/".trim($DATA_DIA[1])."/".trim($DATA_DIA[0])." às ".$DATA_ARRAY[1];	
		}
	}

	function numeroToData($numero)
	{
		$totalNumero = strlen($numero);
		
		if ($totalNumero == 1)
			$zero = "0";
		else
			$zero = "";
			
		return $zero.$numero;
	}

	function valorToSql($valor)
	{
		if ($valor) {
			$valor = str_replace(".","",$valor);
			$valor = str_replace(",",".",$valor);
			return $valor;
		}
	}

	function sqlToValor($valor)
	{
		if ($valor)
			return(number_format($valor,"2",",",".")); 
	}

	function preparaConteudo($string)
	{
        $caracters[] = "\n";
        $caracters[] = "\r";
        foreach ($caracters as $caracter) {
            $string = str_replace($caracter, "", $string);
        }
        $string = stripslashes($string);
        /* troca ' por \' para não quebrar o javascript */
        $string = str_replace("'", "\\'", $string);
		return $string;
	}

	
	function trataAcento($msg)
	{
		$a = array(
			'/[ÂÀÁÄÃ]/' => 'A',
			'/[âãàáä]/' => 'a',
			'/[ÊÈÉË]/' => 'E',
			'/[êèéë]/' => 'e',
			'/[ÎÍÌÏ]/' => 'I',
			'/[îíìï]/' => 'i',
			'/[ÔÕÒÓÖ]/' => 'O',
			'/[ôõòóö]/' => 'o',
			'/[ÛÙÚÜ]/' => 'U',
			'/[ûúùü]/' => 'u',
			'/[\/:*?\"<>|-]/' => '_',
			'/ç/' => 'c',
			'/Ç/' => 'C',
			'/ /' => '_'
		);
		return preg_replace( array_keys($a), array_values($a), $msg);
	}

	
	function validaCEP($cep)
	{
		$cep = trim($cep);
		$avaliaCep = ereg("^[0-9]{5}-[0-9]{3}$", $cep);
		if($avaliaCep != true)
		{
			$error = "Cep inválido ex: \"nnnnn-nnn\" ";
			return false;
		}
		else
		{
			return true;
		} 
	}
	
	function validaCPF($cpf) {
		for( $i = 0; $i < 10; $i++ ){
			if ( $cpf ==  str_repeat( $i , 11) or !preg_match("@^[0-9]{11}$@", $cpf ) or $cpf == "12345678909" )return false;        
			if ( $i < 9 ) $soma[]  = $cpf{$i} * ( 10 - $i );
			$soma2[] = $cpf{$i} * ( 11 - $i );            
		}
		if(((array_sum($soma)% 11) < 2 ? 0 : 11 - ( array_sum($soma)  % 11 )) != $cpf{9})return false;
		return ((( array_sum($soma2)% 11 ) < 2 ? 0 : 11 - ( array_sum($soma2) % 11 )) != $cpf{10}) ? false : true;
	}
	
	function validaCNPJ($cnpj)
	{
		$cnpj = ereg_replace("[^0-9]", "", $cnpj);   
		if (strlen($cnpj) <> 14)
		 return false; 
		
		$soma = 0;
		
		$soma += ($cnpj[0] * 5);
		$soma += ($cnpj[1] * 4);
		$soma += ($cnpj[2] * 3);
		$soma += ($cnpj[3] * 2);
		$soma += ($cnpj[4] * 9); 
		$soma += ($cnpj[5] * 8);
		$soma += ($cnpj[6] * 7);
		$soma += ($cnpj[7] * 6);
		$soma += ($cnpj[8] * 5);
		$soma += ($cnpj[9] * 4);
		$soma += ($cnpj[10] * 3);
		$soma += ($cnpj[11] * 2); 
		
		$d1 = $soma % 11; 
		$d1 = $d1 < 2 ? 0 : 11 - $d1; 
		
		$soma = 0;
		$soma += ($cnpj[0] * 6); 
		$soma += ($cnpj[1] * 5);
		$soma += ($cnpj[2] * 4);
		$soma += ($cnpj[3] * 3);
		$soma += ($cnpj[4] * 2);
		$soma += ($cnpj[5] * 9);
		$soma += ($cnpj[6] * 8);
		$soma += ($cnpj[7] * 7);
		$soma += ($cnpj[8] * 6);
		$soma += ($cnpj[9] * 5);
		$soma += ($cnpj[10] * 4);
		$soma += ($cnpj[11] * 3);
		$soma += ($cnpj[12] * 2); 
		
		
		$d2 = $soma % 11; 
		$d2 = $d2 < 2 ? 0 : 11 - $d2; 
		
		if ($cnpj[12] == $d1 && $cnpj[13] == $d2) {
		 return true;
		}
		else {
		 return false;
		}
   }
	
	function validaEmail($domain) 
	{ 
		$domain = array_pop(explode("@",$domain));
		if(checkdnsrr($domain, "MX") == true)
			return true; 
		else
			return false;
	}
	
	function alerta($mensagem, $return="")
	{
		if (!$return) {
		echo "<table ".$tamanho." class=\"loading\" cellpadding=\"0\" cellspacing=\"1\" align=\"center\">
				<tr>
    			<td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td>". $mensagem."</td></tr></table></td>
  				</tr>
			</table>";
		} else { 
		return "<table ".$tamanho." class=\"loading\" cellpadding=\"0\" cellspacing=\"1\" align=\"center\">
				<tr>
    			<td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td>". $mensagem."</td></tr></table></td>
  				</tr>
			</table>";
		} 	
	}	
	
	function proximo_vencimento($data, $qtd = integer, $tipo = "month") {
		if(!preg_match("#\d{2}/\d{2}/\d{4}#", $data)) {
			return false;
		}
		if(!is_int($qtd)) {
			return false;
		}
		$data = implode("-", array_reverse(explode("/", $data)));    
		for($i = 1; $i <= $qtd; $i++) {
			$dat[] = date("d/m/Y", strtotime($data ." +$i $tipo"));    
		}
		return $dat;
	}		
	
	function somenteTexto($string)	{
	    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
	    $trans_tbl = array_flip($trans_tbl);
	    return trim(strip_tags(strtr($string, $trans_tbl)));
	}
	
	function abreviaString($texto, $limite, $tres_p = '…') {
	  //Retorna o texto em plain/text
	  $texto = somenteTexto($texto);
	 
	  if (strlen($texto) <= $limite) 
	    return $texto;
	  return array_shift(explode('||', wordwrap($texto, $limite, '||'))) . $tres_p;
	}

	function antInjection($string) {
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysql_real_escape_string($string);
		return $string;
	} 		
	
	function montaLinkAmigavel($texto) {			
		$titulo = str_replace('\"', "", $texto);
		$titulo = trataAcento($titulo);
		$titulo = str_replace("%", "", $titulo);
		$titulo = strtolower($titulo);
		return $titulo;
	}

	function youtube_id_from_url($url) {
	    $pattern = 
	        '%^# Match any YouTube URL
	        (?:https?://)?  # Optional scheme. Either http or https
	        (?:www\.)?      # Optional www subdomain
	        (?:             # Group host alternatives
	          youtu\.be/    # Either youtu.be,
	        | youtube\.com  # or youtube.com
	          (?:           # Group path alternatives
	            /embed/     # Either /embed/
	          | /v/         # or /v/
	          | /watch\?v=  # or /watch\?v=
	          )             # End path alternatives.
	        )               # End host alternatives.
	        ([\w-]{10,12})  # Allow 10-12 for 11 char YouTube id.
	        $%x'
	        ;
	    $result = preg_match($pattern, $url, $matches);
	    if (false !== $result) {
	        return $matches[1];
	    }
	    return false;
	}	
?>