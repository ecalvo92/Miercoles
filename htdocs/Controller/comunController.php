<?php

function EnviarCorreo($asunto,$cuerpo,$destinatario)
{
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    $correoSalida = "****@hotmail.com";
    $contrasennaSalida = "*****";

    $mail = new PHPMailer();
    $mail -> CharSet = 'UTF-8';

    $mail -> IsSMTP();
    $mail -> IsHTML(true); 
    $mail -> Host = 'smtp.office365.com';
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;                      
    $mail -> SMTPAuth = true;
    $mail -> Username = $correoSalida;               
    $mail -> Password = $contrasennaSalida;                                
    
    $mail -> SetFrom($correoSalida);
    $mail -> Subject = $asunto;
    $mail -> MsgHTML($cuerpo);   
    $mail -> AddAddress($destinatario);

    $mail -> send();
}

?>