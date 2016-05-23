<?php
class conteudo {
	
	public $id;
	public $limit=REGISTROS_POR_PAGINA;
	public $pagina=0; 
	public $orderBy;
	public $where;
	
	public function listar(){
		$sql = "SELECT * FROM conteudo WHERE (status = 1) ";
		if ($this->where != "")
			$sql.= " AND ".$this->where." ";
		$sql.= "ORDER BY ".$this->orderBy;
		if ($this->limit != "")
			$sql.= " LIMIT ".($this->pagina*$this->limit).",".$this->limit;
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function dados(){
		$sql = "SELECT * FROM conteudo WHERE (id=".$this->id.") ";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
}	
?>