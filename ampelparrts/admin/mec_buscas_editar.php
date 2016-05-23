<link href="css.css" rel="stylesheet" type="text/css">
<br>

<?
include "conecta.php";
$sql = mysql_query("SELECT * FROM mec_buscas ORDER BY `mec_buscas`.`id` DESC");

$linha = mysql_num_rows($sql);

while ($r = mysql_fetch_array($sql))
{
$id = $r['id'];
$mec_buscas_descricao = $r['mec_buscas_descricao'];
$mec_buscas_palavras_chaves = $r['mec_buscas_palavras_chaves'];
$mec_buscas_url= $r['mec_buscas_url'];
$mec_rodape= $r['rodape'];
$mec_titulo= $r['titulo'];
$mec_telefones= $r['telefones'];
$mec_msn= $r['msn'];
$mec_site= $r['site'];

echo "
<div align=center>

<form name=atualizar action=mec_buscas_editar_update.php method=POST>


<h2 class=verdana14>Cadastro Mecanismos de Buscas </h2> <P>

<div class=verdana12>
Nesta página, você pode cadastrar informações sobre o seu site, para que ele apareça nos sites de buscas, estas palavras, e descrição serão adcionadas no código fonte do seu site, uma vez cadastradas estas informações, os mecanismos de buscas levam de 2 semanas até 3 meses para incluir na listagem da busca de seus servidores...
</div>



<table width=100%>
       <tr>
       <td align=center>


<input name=id type=hidden value=$id size=\"50\" class=verdana12> <P>
<hr color=#cccccc size=1>
<div class=verdana12> DIGITE AQUI A DESCRIÇÃO DO SEU SITE: <BR></div> <P>
<textarea name=\"mec_buscas_descricao\"  id=\"mec_buscas_descricao\" cols=\"100\" rows=\"5\" wrap=\"VIRTUAL\"  class=verdana12>$mec_buscas_descricao</textarea> <p>


<hr color=#cccccc size=1>
<div class=verdana12>
DIGITE PALAVRAS CHAVES PARA SEREM LOCALIZADAS EM MECANISMOS DE BUSCAS, ex: Google, Cade, Yahoo... etc...  <BR></div><p>
<textarea name=\"mec_buscas_palavras_chaves\" id=\"mec_buscas_palavras_chaves\" cols=\"100\" rows=\"5\" wrap=\"VIRTUAL\" class=verdana12> $mec_buscas_palavras_chaves</textarea>  <P>


<hr color=#cccccc size=1>
<div class=verdana12><b>*obs, todos emails enviados na pagina do contato, serão encaminhado para este email </b><br>Digite aqui o seu E-mail :<BR> </div>
<input name=\"mec_buscas_url\" type=\"text\" id=\"mec_buscas_url\" value=\"$mec_buscas_url\" size=\"40\" class=verdana12> <P>


<hr color=#cccccc size=1>
<div class=verdana12> Endereço: <BR></div> <P>
<textarea name=\"mec_rodape\"  id=\"mec_rodape\" cols=\"100\" rows=\"5\" wrap=\"VIRTUAL\"  class=verdana12>$mec_rodape</textarea> <p>

<hr color=#cccccc size=1>
<div class=verdana12> Telefones (Aparece em fale conosco): <BR></div> <P>
<textarea name=\"mec_telefones\"  id=\"mec_telefones\" cols=\"100\" rows=\"5\" wrap=\"VIRTUAL\"  class=verdana12>$mec_telefones</textarea> <p>

<hr color=#cccccc size=1>
<div class=verdana12><b>Título do site: </b><BR> </div>
<textarea name=\"mec_titulo\"  id=\"mec_titulo\" cols=\"100\" rows=\"2\" wrap=\"VIRTUAL\"  class=verdana12>$mec_titulo</textarea> <p>
<hr color=#cccccc size=1>
<div class=verdana12><b>Msn </b><br>(Aparece em fale conosco):<BR> </div>
<input name=\"mec_msn\" type=\"text\" id=\"mec_msn\" value=\"$mec_msn\" size=\"40\" class=verdana12> <P>

<hr color=#cccccc size=1>
<div class=verdana12><b>Site :</b><br>(Digite completo ex. http://www.nomedosite.com.br)<BR> </div>
<input name=\"mec_site\" type=text id=\"mec_site\" value=\"$mec_site\" size=\"40\" class=verdana12> <P>

</td>
</tr>
</table>


<hr color=#cccccc size=1>

<input type=submit name=Enviar value=Alterar class=verdana12> 
		
		
	</form>	
		
		



";
}


?>

