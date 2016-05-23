<?php
$Nome       = $_POST["name"];   // Pega o valor do campo Nome
$Email       = $_POST["email"];   // Pega o valor do campo Telefone
$Assunto      = $_POST["subject"];  // Pega o valor do campo Email
$Mensagem   = $_POST["message"];   // Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email

$Vai        = "Nome: $Nome\n\nE-mail: $Email\n\nAssunto: $Assunto\n\nMensagem: $Mensagem\n";
/*date_default_timezone_set('Etc/UTC');
*/
require("phpmailer/PHPMailerAutoload.php");
require("phpmailer/class.smtp.php");

define('GUSER', 'flaviolopessantos@gmail.com');   // <-- Insira aqui o seu GMail
define('GPWD', 'frontendflavio');        // <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
    global $error;
    $mail = new PHPMailer();
    $mail->setLanguage('pt');
    $mail->IsSMTP();        // Ativar SMTP
    $mail->SMTPDebug = 0;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;     // Autenticação ativada
    $mail->SMTPSecure = 'tsl';  // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.tecmovgruas.com'; // SMTP utilizado
    $mail->Port = 587;          // A porta 587 deverá estar aberta em seu servidor
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'Mensagem enviada!';
        return true;
    }
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 

 if (smtpmailer('flaviolopessantos@gmail.com', 'flaviolopessantos@gmail.com', 'renata', 'Assunto do Email', $Vai)) {

    Header("location:obrigado.html"); // Redireciona para uma página de obrigado.

}
if (!empty($error)) echo $error;
?>