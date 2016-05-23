<?php
class seguranca {
	public $vetorArray;
	public $tabela;
	public $pesquisar;
	public $palavraChave;
	public $ordenar;
	public $paginacao;

	public $stringBusca;
	public $stringOrdenar;
	public $stringPaginacao;

	public $total;

	public $id;
	
	public function formulario($tabela) {
		if (empty($this->seguranca_id)) {
			echo "<input id=\"acao\" name=\"acao\" type=\"hidden\" value=\"inserir\">";
		} else {
			echo "<input id=\"acao\" name=\"acao\" type=\"hidden\" value=\"alterar\">";
			echo "<input id=\"id\" name=\"id\" type=\"hidden\" value=\"".$this->seguranca_id."\">";
			$seguranca = end(registro(CONEXAO, "usuario", "usuario_id", $this->seguranca_id));
		}
		
		return $seguranca;
	}
	
	// VALIDA AS VARIÁVEIS ACIMA
	public function valida() {
			
		// VALIDA A PESQUISA E PALAVRA-CHAVE
		if (isset($this->vetorArray["pesquisar"]))
			if ($this->vetorArray["pesquisar"] == "") {
				$campos = $this->pesquisar();
				foreach ($campos as $index => $valor)
					$stringBusca .= $index." LIKE '%".$this->vetorArray["palavraChave"]."%' OR ";
				$totalString = strlen($stringBusca);
				$stringBusca = "AND (".substr($stringBusca, 0, $totalString-3).")";
			} else {
				$stringBusca = "AND (".$this->vetorArray["pesquisar"]." LIKE '%".$this->vetorArray["palavraChave"]."%')";
			}
			
		// VALIDA A ORDENAÇÃO
		if ($this->vetorArray["ordenar"])
			$stringOrdenar = "ORDER BY ".$this->vetorArray["ordenar"]." ".$this->vetorArray["por"]."";

		// VALIDA A PAGINAÇÃO
		if ($this->vetorArray["paginacao"])
			$stringPaginacao = "LIMIT ".$this->vetorArray["paginacao"];
		else
			$stringPaginacao = "LIMIT 0,".TOTALITENSPAGINA;
			
			$this->stringPaginacao = $stringPaginacao; 
			$this->stringOrdenar = $stringOrdenar;
			$this->stringBusca = $stringBusca;
	}
	
	// EXECUTA A FUNÇÃO DA LISTAGEM
	public function listar() {
		// LISTAR DADOS
		$sql = "SELECT * FROM usuario WHERE 1=1 ".$this->stringBusca." ".$this->stringOrdenar." ".$this->stringPaginacao."";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));

		$sql = "SELECT count(*) FROM usuario WHERE 1=1 ".$this->stringBusca." ".$this->stringOrdenar."";
		$dadosRetornoTotal = montaVetor(executaSql(CONEXAO, $sql));
		
		$dadosRetorno[0]["total"] = $dadosRetornoTotal[0]["count(*)"];
		
		$this->total = $dadosRetorno[0]["total"];
		
		return $dadosRetorno;
	}
		
}
?>