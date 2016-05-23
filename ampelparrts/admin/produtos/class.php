<?php
class classe {
	
	public $vetorArray;
	public $tabela = "produto";
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
		//echo $sql;
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		
		if (count($dadosRetorno) > 0)
		foreach ($dadosRetorno as $i => $v) {
			$sql = "SELECT * FROM produto_categoria WHERE id = ".$v["id_categoria"];
			$dr = montaVetor(executaSql(CONEXAO, $sql));
			$dadosRetorno[$i]["categoria"] = $dr[0]["nome_portugues"];
			
			$sql = "SELECT * FROM produto_imagem WHERE id_produto = ".$v["id"];
			$dr = montaVetor(executaSql(CONEXAO, $sql));
			$dadosRetorno[$i]["qtdeimg"] = count($dr);
		}
		
		$sql = "SELECT count(*) FROM ".$this->tabela." WHERE (status = 1) ".$this->stringBusca." ".$this->stringOrdenar."";
		$dadosRetornoTotal = montaVetor(executaSql(CONEXAO, $sql));
		
		$dadosRetorno[0]["total"] = $dadosRetornoTotal[0]["count(*)"];		
		$this->total = $dadosRetorno[0]["total"];
		
		return $dadosRetorno;
	}
	
	public function listarSubcategorias($id) {
		$sql = "SELECT
					*
				FROM
					produto_subcategoria
				WHERE
					(status_subcategoria = '1') AND (id_categoria = '".$id."')";

		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		
		return $dadosRetorno;
	}
	
	public function listarCategorias() {
		$sql = "SELECT * FROM produto_categoria WHERE (status = 1) ORDER BY nome_portugues";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	 
	public function seoMetas($id) {
		if ($id != "") {
			$sql = "SELECT * FROM seo_meta WHERE pagina = 'movel-planejado' AND identificador = $id AND status = 1 ORDER BY id"; 
			$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
			return $dadosRetorno[0];
		} else {	
			return "";
		}
	}
	
}
?>