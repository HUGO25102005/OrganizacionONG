<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerService
{
    public function enviarCorreo($destinatario, $asunto, $mensaje)
    {
        // Crear una instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.kyosoft.mx'; // Servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'cosera.notificaciones@kyosoft.mx'; // Tu dirección de correo
            $mail->Password = 'qaS*c;,nJ2Tv'; // Tu contraseña o token de aplicación
            $mail->SMTPSecure = 'tls';         // Habilitar TLS (seguridad)
            $mail->Port       = 587;   // Puerto SMTP

            // Configuración del correo
            $mail->setFrom('cosera.notificaciones@kyosoft.mx', 'InspireUp'); // Remitente
            $mail->addAddress($destinatario); // Destinatario
            $mail->isHTML(true); // Configurar correo como HTML
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;

            // $mail->SMTPDebug = 3; // Nivel de depuración (3 es detallado)
            // $mail->Debugoutput = 'html'; // Salida de la depuración en formato HTML

            // Enviar el correo
            $mail->send();
            return ['success' => true, 'message' => 'Correo enviado correctamente'];
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Error al enviar el correo: {$mail->ErrorInfo}"];
        }
    }
}
