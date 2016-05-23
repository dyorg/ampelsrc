var api;
var url_site = "/";
var regValEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
$(document).ready(function(){
    $("#fax").mask("(99) 9999-9999");
    $("#tel").mask("(99) 9999-9999");
    $("#celular").mask("(99) 9999-9999");
    $("#valor_ganhar").numeros();
    
	if(!Modernizr.input.placeholder){	
		$('[placeholder]').focus(function() {
		  var input = $(this);
		  if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		  }
		}).blur(function() {
		  var input = $(this);
		  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		  }
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  $(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
			  input.val('');
			}
		  })
		});
	}
	
	$('#formContato #enviar').click(function() {
		var erro = false;
		if ($("#formContato #nome").val() == "") {
			$('#formContato #nome').attr("placeholder", 'Preencha seu nome...');
			$("#formContato #nome").focus();
			erro = true;
		} 
		if ($("#formContato #email").val() == "") {
			$('#formContato #email').attr("placeholder", 'Preencha seu e-mail...');
			$("#formContato #email").focus();
			erro = true;
		} else if(!regValEmail.test( $('#formContato #email').val() )) {
			$("#formContato #email").attr("placeholder", 'Preencha corretamente seu email...');
			$("#formContato #email").focus();
			alert("Seu e-mail não foi preenchido corretamente!");
			erro = true;
		}
		if (erro == false) {
			$.ajax({
				url: url_site+"acoes.php",
				data: $("#formContato").serialize(),
				type: "POST",
				cache: false,
				success: function(data) {
					alert("E-mail enviado com sucesso!");
					limparFormulario("#formContato");
				}					
			});
		}	
	});
	
	
	$('#formNewsletter #cadsatrar').click(function() {
		var erro = false;
		if ($("#formNewsletter #email").val() == "") {
			$('#formNewsletter #email').attr("placeholder", 'Preencha seu e-mail...');
			$("#formNewsletter #email").focus();
			erro = true;
		} else if(!regValEmail.test( $('#formNewsletter #email').val() )) {
			$("#formNewsletter #email").attr("placeholder", 'Preencha corretamente seu email...');
			$("#formNewsletter #email").focus();
			alert("Seu e-mail não foi preenchido corretamente!");
			erro = true;
		}
		if (erro == false) {
			$.ajax({
				url: url_site+"acoes.php",
				data: $("#formNewsletter").serialize(),
				type: "POST",
				cache: false,
				success: function(data) {
					alert("E-mail cadastrado com sucesso!");
					limparFormulario("#formNewsletter");
				}					
			});
		}
	});
	
	$('#formBuscar #btn_buscar').click(function() {
		$.fancybox.showLoading();
		var erro = false;
		if ($("#formBuscar #busca").val() == "") {
			$('#formBuscar #busca').attr("placeholder", 'Preencha o código...');
			$("#formBuscar #busca").focus();
			erro = true;
		}
		if (erro == false) {
			$.ajax({
				url: url_site+"acoes.php",
				data: $("#formBuscar").serialize(),
				type: "POST",
				cache: false,
				success: function(data) {
					$("#conteudoProduto").html(data);
					//alert("E-mail cadastrado com sucesso!");
					limparFormulario("#formBuscar");
					$.fancybox.hideLoading();
				}					
			});
		}
	});

	
		
	$('.menu_idioma a').click(function() {
		var idioma = $(this).data('idioma');
		$.ajax({
			url: url_site+"acoes.php?acao=mudarIdioma&idioma="+idioma,
			type: "POST",
			cache: false,
			success: function(data) {
				location.reload();
			}					
		});
	})
	
	$(".fancybox").fancybox();
});

function limparFormulario (formulario) {
	$(formulario).find(':input').each(function() {
	    switch(this.type) {
	        case 'password':
	        case 'select-multiple':
	        case 'select-one':
	        case 'text':
	        case 'email':
	        case 'textarea':
	            $(this).val('');
	            break;
	        case 'checkbox':
	        case 'radio':
	            this.checked = false;
	    }
	});

}