<?php
class imagem {
	
	public $vetorArray;
	public $tabela = "configuracao_imagem";
	public $pesquisar;
	public $palavraChave;
	public $ordenar;
	public $paginacao;
	public $stringBusca;
	public $stringOrdenar;
	public $stringPaginacao;
	public $total;
	public $id;
	public $id_produto;
	public $tipo;
	public $idioma;
	
	// LISTAGEM DOS DADOS
	public function formulario() {
		if (empty($this->id)) {
			echo "<input id=\"acao\" name=\"acao\" type=\"hidden\" value=\"inserir\">";
		} else {
			echo "<input id=\"acao\" name=\"acao\" type=\"hidden\" value=\"alterar\">";
			echo "<input id=\"id\" name=\"id\" type=\"hidden\" value=\"".$this->id."\">";
			$imagem = end(registro(CONEXAO, $this->tabela, "id", $this->id));
		}
		
		return $imagem;
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
			$stringPaginacao = "LIMIT 0,10";
			
			$this->stringPaginacao = $stringPaginacao; 
			$this->stringOrdenar = $stringOrdenar;
			$this->stringBusca = $stringBusca;
	}
	
	// EXECUTA A FUNÇÃO DA LISTAGEM
	public function listar() {
		// LISTAR DADOS
		$sql = "SELECT * FROM ".$this->tabela." WHERE (1=1) ";
		if ($this->tipo != "") 
			$sql.= " AND tipo = '".$this->tipo."' ";
		if ($this->idioma != "") 
			$sql.= " AND idioma = '".$this->idioma."' ";
		$sql.= $this->stringBusca." ".$this->stringOrdenar." ".$this->stringPaginacao."";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		
		$dadosRetorno[0]["total"] = $dadosRetornoTotal[0]["count(*)"];	
		$this->total = $dadosRetorno[0]["total"];
		
		return $dadosRetorno;
	}
}
?>