<?php
//require_once 'PHPMailer/class.phpmailer.php';
//require_once 'PHPMailer/class.smtp.php';

$to = "ppimentel@andescode.cl";
$subject = "Contacto web Andescode";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">

								<body style="font: Verdana, Geneva, sans-serif">

								Hemos recibido una solicitud de contacto desde Andescode.cl con los siguientes datos:<p>
								<b>Nombre:</b> <p>
								<b>Fono:</b> <p>
								<b>correo:</b> <p>
								<b>Servicios:</b><p>


							
								
								</body>
								</html> ';
 


mail($to,$subject,$message,$headers);
?>