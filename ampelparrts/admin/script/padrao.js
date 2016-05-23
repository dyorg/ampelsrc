function selOver(objeto) {

	objeto.style.backgroundColor='#316ac5';

	objeto.style.color='#FFFFFF';

}

function selOut(objeto) {

	objeto.style.backgroundColor='';

	objeto.style.color='';

}

function tituloOver(objeto) {

	objeto.style.backgroundColor='#faf8f3';

	objeto.style.borderBottomColor='#f9b119';

}

function tituloOut(objeto) {

	objeto.style.backgroundColor='';

	objeto.style.borderColor='';

}

function popup(url, name, width, height)

{

   var str = "height=" + height + ",innerHeight=" + height;

		str += ",width=" + width + ",innerWidth=" + width;

		str += ",status=no,scrollbars=yes,resizable=no";

		  if (window.screen)

		{

				var ah = screen.availHeight - 30;

				var aw = screen.availWidth - 10;

				var xc = (aw - width) / 2;

				var yc = (ah - height) / 2;



				str += ",left=" + xc + ",screenX=" + xc;

				str += ",top=" + yc + ",screenY=" + yc;

		}

		var win = window.open(url, name, str);

}

function listagem(url)

{

	var height = "450";

	var width = "600";

	var name = "Resultado";

   var str = "height=" + height + ",innerHeight=" + height;

		str += ",width=" + width + ",innerWidth=" + width;

		str += ",status=yes,scrollbars=yes,resizable=no";

		  if (window.screen)

		{

				var ah = screen.availHeight - 30;

				var aw = screen.availWidth - 10;

				var xc = (aw - width) / 2;

				var yc = (ah - height) / 2;



				str += ",left=" + xc + ",screenX=" + xc;

				str += ",top=" + yc + ",screenY=" + yc;

		}

		var win = window.open(url, name, str);

}

function formulario(url)

{

	var height = "400";

	var width = "400";

	var name = "Formulario";

   var str = "height=" + height + ",innerHeight=" + height;

		str += ",width=" + width + ",innerWidth=" + width;

		str += ",status=yes,scrollbars=yes,resizable=no";

		  if (window.screen)

		{

				var ah = screen.availHeight - 30;

				var aw = screen.availWidth - 10;

				var xc = (aw - width) / 2;

				var yc = (ah - height) / 2;



				str += ",left=" + xc + ",screenX=" + xc;

				str += ",top=" + yc + ",screenY=" + yc;

		}

		var win = window.open(url, name, str);

}





function aceitaCaracteres(campo, digits){

    var campo_temp

    for (var i=0;i<campo.value.length;i++){

      campo_temp=campo.value.substring(i,i+1)    

      if (digits.indexOf(campo_temp)==-1){

            campo.value = campo.value.substring(0,i);

            break;

       }

    }

}

/*
 * Função para mudan um option de select
 */
function movimento(elemento, direcao, recepcao, deletar) {
	var sel = document.getElementById(elemento);

	var len, i;
	if (!sel) {
		return;
	}
	if (direcao == 'passar' && recepcao == undefined) {
		return;
	} else if (direcao == 'passar') {
		var sel_pai = document.getElementById(recepcao);
		var selecionados = new Array();
		if (!sel_pai) {
			return;
		}
		len = sel_pai.options.length;
		for (i = 0; i < len; i++) {
			if (sel_pai.options[i].selected) {				

				if (deletar != 'deletar') {
					valor = document.getElementById(elemento+'_lista').value;
					valor+= sel_pai.options[i].value+';';
					document.getElementById(elemento+'_lista').value = valor;
				} else {					
					valor = document.getElementById(recepcao+'_lista').value;
					var busca = sel_pai.options[i].value+';';
					valor = valor.replace(busca, '');
					document.getElementById(recepcao+'_lista').value = valor;
				}
				sel.options[sel.options.length] = new Option(sel_pai.options[i].text, sel_pai.options[i].value);
				selecionados.push(i);
			}
		}
		len = selecionados.length;
		for (i = len-1; i >= 0; i--) {
			sel_pai.options[selecionados[i]] = null;
		}
	} else if (direcao == 'cima' || direcao == 'baixo') {
		var selecionado = sel.selectedIndex;
		var comparacao = direcao == 'cima' ? selecionado - 1 : selecionado;
		var opts_values = new Array();
		var opts_texts = new Array();
		var tam = sel.options.length;
		var i;
		if (selecionado == -1) {
			return;
		}
		if (direcao == 'cima' && selecionado == 0) {
			return;
		}
		if (direcao == 'baixo' && selecionado == tam - 1) {
			return;
		}
		selecionado = direcao == 'cima' ? selecionado - 1 : selecionado + 1;
		for (i = 0; i < sel.options.length; i++) {
			if (i == comparacao) {
				opts_values.push(sel.options[i+1].value);
				opts_texts.push(sel.options[i+1].text);
				sel.options[i + 1] = null;
			}
			opts_values.push(sel.options[i].value);
			opts_texts.push(sel.options[i].text);
		}
		for (i = 0; i < tam; i++) {
			sel.options[i] = new Option(opts_texts[i], opts_values[i]);
		}
		sel.selectedIndex = selecionado;
	}
}
