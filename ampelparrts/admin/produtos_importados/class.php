<?php
class classe {
	
	public $vetorArray;
	public $tabela = "produto_importados";
	public $pesquisar;
	public $palavraChave;
	public $ordenar;
	public $paginacao;
	public $stringBusca;
	public $stringOrdenar;
	public $stringPaginacao;
	public $total;
	public $id;
	
	public function formulario() {
		if (empty($this->id)) {
			echo "<input id=\"acao\" name=\"acao\" type=\"hidden\" value=\"inserir\">";
		} else {
			echo "<input id=\"acao\" name=\"acao\" type=\"hidden\" value=\"alterar\">";
			echo "<input id=\"id\" name=\"id\" type=\"hidden\" value=\"".$this->id."\">";
			$produto = end(registro(CONEXAO, $this->tabela, "id", $this->id));
		}
		return $produto;
	}
	
	public function valida() {
		if (isset($this->vetorArray["pesquisar"]))
			if ($this->vetorArray["pesquisar"] == "") {
				$campos = $this->pesquisar();
				foreach ($campos as $index => $valor)
					$stringBusca .= $index." LIKE '%".$this->vetorArray["palavraChave"]."%' OR ";
				$totalString = strlen($stringBusca);
				$stringBusca = substr($stringBusca, 0, $totalString-3);
			} else {
				$stringBusca = $this->vetorArray["pesquisar"]." LIKE '%".$this->vetorArray["palavraChave"]."%'";
			}

		if ($this->vetorArray["ordenar"])
			$stringOrdenar = "ORDER BY ".$this->vetorArray["ordenar"]." ".$this->vetorArray["por"]."";

		if ($this->vetorArray["paginacao"]) {
			$stringPaginacao = "LIMIT ".$this->vetorArray["paginacao"];
		} else {
			$stringPaginacao = "LIMIT 0,15";
		}
		
		$this->stringPaginacao = $stringPaginacao; 
		$this->stringOrdenar = $stringOrdenar;
		if (trim($stringBusca) != "") 
			$this->stringBusca = "AND (".$stringBusca.")";
	}
	
	public function listar() {
		$sql = "SELECT * FROM ".$this->tabela." WHERE (status = 1) ".$this->stringBusca." ".$this->stringOrdenar." ".$this->stringPaginacao."";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		
		$sql = "SELECT count(*) FROM ".$this->tabela." WHERE (status = 1) ".$this->stringBusca." ".$this->stringOrdenar."";
		$dadosRetornoTotal = montaVetor(executaSql(CONEXAO, $sql));
		
		$dadosRetorno[0]["total"] = $dadosRetornoTotal[0]["count(*)"];		
		$this->total = $dadosRetorno[0]["total"];
		
		return $dadosRetorno;
	}	
}
?>