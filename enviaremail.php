<?php
// Habilita a exibição de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclua as bibliotecas do PHPMailer
require 'PHPMailerAutoload.php';
require 'class.phpmailer.php';
require 'send.php';

// Define o endereço de e-mail do destinatário
$destinatario = "andretarumajundiai@gmail.com";

// Define o assunto do e-mail
$assunto = "Relatório de Controle de Jornada";

// Define o corpo do e-mail
$mensagem = "Por favor, encontre em anexo o relatório de controle de jornada.";

// Configure o objeto PHPMailer
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.live.com'; // Servidor SMTP do Hotmail
$mail->SMTPAuth = true;
$mail->Username = 'andre_taruma1993@hotmail.com'; // Seu endereço de e-mail do Hotmail
$mail->Password = 'Favo@1234'; // Sua senha do Hotmail
$mail->SMTPSecure = 'tls'; // TLS ou SSL
$mail->Port = 587; // Porta SMTP (587 para TLS, 465 para SSL)

$mail->setFrom('andre_taruma1993@hotmail.com', 'Seu Nome');
$mail->addAddress($destinatario);
$mail->Subject = $assunto;
$mail->Body = $mensagem;

// Nome do arquivo anexo
$nome_arquivo = "controleJornada.xls";

// Adicione o arquivo como anexo
$mail->addAttachment('controleJornada.xls', $nome_arquivo);

// Tente enviar o e-mail
if ($mail->send()) {
    echo 'E-mail enviado com sucesso!';
} else {
    echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
}
?>
