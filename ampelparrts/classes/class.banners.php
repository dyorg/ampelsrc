<?php
class banners {
	
	public $id;
	public $limit=REGISTROS_POR_PAGINA;
	public $pagina=0; 
	public $orderBy;
	public $where;
	
	public function listar(){
		$pagina = ($this->pagina != "") ? ($this->pagina-1) : 0 ;
		$sql = "SELECT * FROM configuracao_imagem WHERE (1=1) ";
		if ($this->where != "")
			$sql.= " AND ".$this->where." ";
		$sql.= "ORDER BY ".$this->orderBy;
		if ($this->limit != "")
			$sql.= " LIMIT ".(($pagina)*$this->limit).",".$this->limit;

		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function quantidadePaginas(){
		$sql = "SELECT * FROM configuracao_imagem WHERE (1 = 1) ";
		if ($this->where != "")
			$sql.= " AND ".$this->where." ";
		$sql.= "ORDER BY ".$this->orderBy;
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return ceil(count($dadosRetorno) / $this->limit);
	}
	
	public function dados(){
		$sql = "SELECT * FROM configuracao_imagem a  WHERE (a.id=".$this->id.") ";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
}	
?>