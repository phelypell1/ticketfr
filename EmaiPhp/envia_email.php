<?php
session_start();
$nome = $_SESSION['login'];
$email = $_SESSION['email'];
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../EmaiPhp/PHPMailer/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 

// Método de envio 
$mail->IsSMTP(); 

// Enviar por SMTP 
$mail->Host = "smtp.office365.com"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
//$mail->Username = 'webmaster@freng.com.br';
$mail->Username = 'frincorporadora@hotmail.com';
//$mail->Username = 'webmaster@freng.com.br'; 
$mail->Password = 'Fw38q1V7sN';

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro. 
 //$mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "frincorporadora@hotmail.com";

// Seu nome 
$mail->FromName = "$nome"; 

// Define o(s) destinatário(s) 
$mail->AddAddress("frincorporadora@hotmail.com", "CPD"); 

// Opcional: mais de um destinatário
 $mail->AddAddress('webmaster@freng.com.br'); 

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 

// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
$mail->Subject = "Novo chamado aberto"; 

// Corpo do email 
$mail->Body = 
"<html>
    <body>
        <h1>Atenção</h1>
        <p>Foi aberto um novo chamado, verifique o sistema.</p>
        <p>E-mail automático não responder</p> 
    </body>

</html>"; 

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
if ($enviado) 
{ 
    echo "Seu email foi enviado com sucesso!"; 
    //include "../Views/chamado.php";
} else { 
    echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
    //include "../Views/chamado.php";
} 
?>