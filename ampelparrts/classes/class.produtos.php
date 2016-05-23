<?php
class produtos {
	
	public $id;
	public $limit=REGISTROS_POR_PAGINA;
	public $pagina=0; 
	public $orderBy;
	public $where;
	public $tabela = "produto"; 
	
	public function listar(){
		$pagina = ($this->pagina != "") ? ($this->pagina-1) : 0 ;
		$sql = "SELECT * FROM ".$this->tabela." WHERE (status = 1) ";
		if ($this->where != "")
			$sql.= " AND ".$this->where." ";
		$sql.= "ORDER BY ".$this->orderBy;
		if ($this->limit != "")
			$sql.= " LIMIT ".(($pagina)*$this->limit).",".$this->limit;
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function quantidadePaginas(){
		$sql = "SELECT * FROM ".$this->tabela." WHERE (status = 1) ";
		if ($this->where != "")
			$sql.= " AND ".$this->where." ";
		$sql.= "ORDER BY ".$this->orderBy;
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return ceil(count($dadosRetorno) / $this->limit);
	}

	
	public function dados(){
		$sql = "SELECT * FROM ".$this->tabela." WHERE (id=".$this->id.") ";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function categoria($id){
		$sql = "SELECT c.*, i.imagem, i.id as imagem_id FROM produto_categoria c LEFT JOIN produto_categoria_imagem i ON c.id = i.id_categoria WHERE (c.id=".$id.") ";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function categoriasub($id){
		$sql = "SELECT * FROM produto_subcategoria WHERE (id_subcategoria=".$id.") LIMIT 1";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function categorias(){
		$sql = "SELECT * FROM produto_categoria ORDER BY ordem";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function subcategorias($id){
		$sql = "SELECT * FROM produto_subcategoria  WHERE (id_categoria=".$id.") ORDER BY ordem_subcategoria";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function imagem($id){
		$sql = "SELECT * FROM produto_imagem WHERE (id_produto=".$id.") ORDER BY ordem, id";
		$dadosRetorno = montaVetor(executaSql(CONEXAO, $sql));
		return $dadosRetorno;
	}
	
	public function getImagem($imagem, $tamanho = "gg") {
		if (file_exists("images/_produto/".$imagem[0]["id_produto"]."/".$tamanho."/".$imagem[0]["id"].$imagem[0]["imagem"])) {
			$retStr = "images/_produto/".$imagem[0]["id_produto"]."/".$tamanho."/".$imagem[0]["id"].$imagem[0]["imagem"];
		} elseif (file_exists("images/_produto/".$imagem[0]["id_produto"]."/".$tamanho."/".$imagem[0]["id"].strtolower($imagem[0]["imagem"]))) {
			$retStr = "images/_produto/".$imagem[0]["id_produto"]."/".$tamanho."/".$imagem[0]["id"].strtolower($imagem[0]["imagem"]);
		} elseif (file_exists("images/_produto/".$imagem[0]["id_produto"]."/".$tamanho."/".$imagem[0]["id"].strtoupper($imagem[0]["imagem"]))) {
			$retStr = "images/_produto/".$imagem[0]["id_produto"]."/".$tamanho."/".$imagem[0]["id"].strtoupper($imagem[0]["imagem"]);
		} else {
			$retStr = "images/_produto/sem_img.png";
		}
		return '<img src="'.URL_SITE.$retStr.'" alt="" />';
	}
}	
?>