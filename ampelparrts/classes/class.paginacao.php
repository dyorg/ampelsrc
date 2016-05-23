<?php
class paginacao {
		
	public $quantidadePaginas;
	public $paginaAtual;
	public $pagina;
	
	public function montarLinks(){
		$retorno = "";
		for ($i = 1; $i <= $this->quantidadePaginas; $i++) {
			if ($this->paginaAtual == $i) {
				$retorno.= "<div id='itemPaginacao' class='selecionado' onclick='location.href=\"".URL_SITE.$this->pagina."/".$i."\"'>";	
			} else {
				$retorno.= "<div id='itemPaginacao' onclick='location.href=\"".URL_SITE.$this->pagina."/".$i."\"'>";
			}
			$retorno.= $i."</div>";
		}
		return "<div id='paginacao'>".$retorno."</div><br clear='all'><br />";
	}
}	
?>