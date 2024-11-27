<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionUsuario;
use App\Models\User;
use App\Services\PHPMailerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;

class MailController extends Controller
{protected $mailer;

    public function __construct(PHPMailerService $mailer)
    {
        $this->mailer = $mailer;
    }

    public function enviarCorreo($correo, $asunto, $mensaje)
    {
        // $destinatario = 'rodriguezrosaleshugo@gmail.com';
        // $asunto = 'Correo de Prueba';
        // $mensaje = '<h1>Este es un correo de prueba desde PHPMailer en Laravel</h1>';

        $resultado = $this->mailer->enviarCorreo($correo, $asunto, $mensaje);

        if ($resultado['success']) {
            return response()->json(['message' => $resultado['message']]);
        }

        return response()->json(['error' => $resultado['message']], 500);
    }
}
