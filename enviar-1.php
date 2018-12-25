<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '*******';                 // SMTP username
    $mail->Password = '*******';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('dasda@dasd.com', 'Mail Robot');
    $mail->addAddress('************', 'Yo');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($_POST["email"], 'Consulta');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Consulta';
    
    $template= file_get_contents("templates/amp.html");
    foreach($_POST as $key => $valor){
        $template=str_replace('{{'.$key.'}}', $valor, $template);
    }

    $mail->Body    = $template;
    $mail->AltBody = '<p>Este mail ha sido generado.</p>';

    $mail->send();
    echo 'El mail ha sido enviado';
} catch (Exception $e) {
    echo 'Hubo un error, por favor intentar más tarde.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}




?>