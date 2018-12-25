<?php
require "datos.php";

$to = $mailDestino;
$subject = $motivo;

$template= file_get_contents("templates/amp.html");
foreach($_POST as $key => $valor){
    $template=str_replace('{{'.$key.'}}', $valor, $template);
}

$message= $template;

$headers = 'MIME-Version: 1.0' . "\r\n";
//$headers= 'multipart/alternative; boundary="001a114634ac3555ae05525685ae"';
//$headers = 'Content-type: text/x-amp-html; charset=utf-8' . "\r\n";
$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'To:  <'.$to.'>'. "\r\n";
$headers .= "From: ".$_POST["email"];

$status=mail($to,$subject,$message,$headers);
if($status)
{
    echo "<p> su mensaje ha sido enviado correctamente </p>";
}
else{
    echo "<p> hubo un error, por favor intentar más tarde </p>";
}

?> 
