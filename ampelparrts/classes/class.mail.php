<?php
/*
  Nome: 			mail.php
  Desenvolvedor:	Davi Nunes Camargo
  Empresa:			signoweb.com.br
  Descrição:		Classe de envio de e-mail
*/
class Mail{
	var $de_nome = "MasterCar"; // E-mail de contato
	var $de_email_contato = EMAIL_CONTATO; // Nome do e-mail de contato
	var $headers; // Cabeçalho do e-mail
	var $enviaSMTP = 'false';
	var $enviaFuncao = 0; //0 - Função mail / 1 - Função sendmail
	
	
	function email_contato($para_email, $para_nome, $mensagem, $assunto) {

		$headers  = "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "X-Priority: 3\n";
		$headers .= "X-MSMail-Priority: Normal\n";
		$headers .= "X-Mailer: php\n";
		$headers .= "From: \"".$this->de_nome."\" <".$para_email.">\n";
		$headers .= "Return-Path: <".$para_email.">\n"; 	

		$titulo = "MasterCar - Contato";
		$message = "Assunto: ".$assunto."<br>\n
					Nome: ".$para_nome."<br>\n
					E-mail: ".$para_email."<br>\n
					Mensagem: ".$mensagem;
			  
		if (mail($this->de_email_contato, $titulo, $message, $headers)){
			return true;
		}else{
			return false;
		}
		
	}	
	
}

?>