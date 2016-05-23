<script language=javascript>
function SomenteNumero(e){

   				 var tecla=(window.event)?event.keyCode:e.which;

    			if((tecla > 47 && tecla < 58)) return true;

				else{ return false;}  }


function Iniciar() {



       editor.document.designMode = 'On'



         document.forms["formEdit"].onsubmit=function(){

         document.getElementById("texto").value=editor.document.body.innerHTML

         return true

        }

}

function ver() {

document.getElementById("texto").value=editor.document.body.innerHTML

}

function ver1(e) {

editor.document.body.innerHTML=document.getElementById("texto").value

}



function hr() {



    editor.document.execCommand('InsertHorizontalRule');

     }





	 function table() {

 var div = document.getElementById("tabela");

            div.className = "some";

     }



function table1(table1) {

var div = document.getElementById("tabela");

var tabela1 = document.getElementById("tabela10").value;

var tabela="<table style=\"width: 100%; border-collapse: collapse\" border=1 cellspacing=0 cellpadding=3 bordercolor=#000000 bgcolor=" + table1 +">" + tabela1 + "</table>";

    editor.document.body.innerHTML=editor.document.body.innerHTML + tabela;

	div.className = "aparece";

	document.getElementById("tabela10").value =" ";

	document.getElementById("cortabela").value =" ";

     }



	 function link1() {



    document.execCommand("CreateLink",null);

     }





	 function imagem() {

imagePath = prompt('Endereço da imagem:','http://');

editor.document.execCommand('InsertImage',false,imagePath);



     }





    function recortar() {

        editor.document.execCommand('cut', false, null);

    }



    function copiar() {

        editor.document.execCommand('copy', false, null);

    }



    function colar() {

        editor.document.execCommand('paste', false, null);

    }



    function desfazer() {

        editor.document.execCommand('undo', false, null);

    }



    function refazer() {

        editor.document.execCommand('redo', false, null);

    }



    function negrito() {

        editor.document.execCommand('bold', false, null);

    }



    function italico() {

        editor.document.execCommand('italic', false, null);

    }



    function sublinhado() {

        editor.document.execCommand('underline', false, null);

    }



    function alinharEsquerda() {

        editor.document.execCommand('justifyleft', false, null);

    }



    function centralizado()    {

        editor.document.execCommand('justifycenter', false, null);

    }



    function alinharDireita() {

        editor.document.execCommand('justifyright', false, null);

    }



    function justificado() {

        editor.document.execCommand('justifyfull', false, null);

    }



    function numeracao() {

        editor.document.execCommand('insertorderedlist', false, null);

    }



    function marcadores() {

        editor.document.execCommand('insertunorderedlist', false, null);

    }



    function fonte(fonte) {

        if(fonte != '')

            editor.document.execCommand('fontname', false, fonte);

    }



	  function cor(cor) {

        if(cor != '')

            editor.document.execCommand('forecolor', true,cor);

    }



	function fundocor(fundocor) {

        if(fundocor != '')

            editor.document.execCommand('backcolor', false,fundocor);

    }



    function tamanho(tamanho) {

        if(tamanho != '')

            editor.document.execCommand('fontsize', false, tamanho);

    }



	function mudaDiv() {

        var div = document.getElementById("textarea");

		var editor = document.getElementById("editor");

        var check = document.getElementById("check");

        if (check.checked) {

            div.className = "some";

			editor.className = "aparece";

        } else {

            div.className = "aparece";

			editor.className = "some";

        }

    }





</script>
<style><!--faz parte para mostrar o codigo fonte

.some {display: block;}

.aparece {display: none;}



--></style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

<!--
.verdana1 {

	font-family: Verdana, Arial, Helvetica, sans-serif;

	font-size: 10px;       }
.verdana {

	font-family: Verdana, Arial, Helvetica, sans-serif;

	font-size: 10px;

	background-color: #EFEDE1;

	padding: 1px;

	margin: 1px;

	border-top: 1px none #666666;

	border-right: 1px none #666666;

	border-bottom: 1px none #666666;

	border-left: 1px none #666666;

}

-->

</style>