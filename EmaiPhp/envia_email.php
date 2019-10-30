<?php
session_start();
include "../Views/chamado.php";
    $text_selection = $_POST['campo_selection'];
    $text_assunto = $_POST['campo_assuntos'];
    $text_descricao = $_POST['campo_descricao'];
    $login = $_SESSION['id'];
    $email = $_SESSION['email'];
    $nome = $_SESSION['login'];


// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../EmaiPhp/PHPMailer/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 

// Método de envio 
$mail->IsSMTP(); 

// Enviar por SMTP 
$mail->Host = "mail.freng.com.br"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = 'webmaster@freng.com.br'; 
$mail->Password = 'Fr@102030'; 

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
 $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "webmaster@freng.com.br"; 

// Seu nome 
$mail->FromName = "$text_selection"; 

// Define o(s) destinatário(s) 
$mail->AddAddress('webmaster@freng.com.br', 'Webmaster'); 

// Opcional: mais de um destinatário
// $mail->AddAddress('fernando@email.com'); 

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 

// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
$mail->Subject = "$txt_set"; 

// Corpo do email 
$mail->Body = 'Testando'; 

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
if ($enviado) 
{ 
    echo "Seu email foi enviado com sucesso!"; 
} else { 
    echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
} 
?>