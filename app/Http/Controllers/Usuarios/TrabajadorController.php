<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Usuarios\Trabajadores\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrabajadorController extends Controller
{
    public function aceptarSolicitudTrabajador(Request $request)
    {

        $idTrabajador = $request->id;

        $trabajador = Trabajador::find($idTrabajador);

        if ($trabajador) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $trabajador->update(['estado' => 1]);
            // Generar una nueva contraseña temporal
            $passwordTemporal = Str::random(8);

            // Hashear y actualizar la contraseña en el modelo User
            $trabajador->user->update(['password' => bcrypt($passwordTemporal)]);

            $correo = $trabajador->user->email;
            $asunto = 'Credenciales: ';
            // Crear el mensaje con la nueva contraseña
            $mensaje = "
                        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                            <h1 style='color: #4CAF50;'>Hola, {$trabajador->user->name}.</h1>
                            <p>¡Tu solicitud ha sido aceptada exitosamente! Aqu&iacute; est&aacute;n tus credenciales de acceso:</p>
                            <div style='background-color: #f9f9f9; border: 1px solid #ddd; padding: 10px; margin: 10px 0;'>
                                <p><strong>Correo:</strong> $correo</p>
                                <p><strong>Contraseña temporal:</strong> $passwordTemporal</p>
                            </div>
                            <p style='color: #d9534f;'><strong>Importante:</strong> Por favor, cambia tu contraseña despu&eacute;s de iniciar sesi&oacute;n para mantener tu cuenta segura.</p>
                            <p>Si tienes alg&uacute;n problema, no dudes en contactarnos.</p>
                            <p>Saludos,</p>
                            <p><strong>El equipo de InspireUp</strong></p>
                        </div>
                    ";


            app(MailController::class)->enviarCorreo($correo, $asunto, $mensaje);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('admin.usuarios',)->with('success', 'Se ha aceptado la solicitud correctamente');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('admin.usuarios')->with('error', 'No se pudo aceptar la solicitud');
    }

    public function desactivarTrabajador(Request $request)
    {
        // Obtener el ID del trabajador del request
        $id = $request->id;

        // Encontrar el trabajador por su ID
        $trabajador = Trabajador::find($id);

        if ($trabajador) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $trabajador->update(['estado' => 2]);

            // Preparar el correo
            $correo = $trabajador->user->email;
            $asunto = 'Notificación de Desactivaci&oacute;n de Cuenta';
            $mensaje = "
                        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                            <h1 style='color: #d9534f;'>Hola, {$trabajador->user->name}.</h1>
                            <p>Lamentamos informarte que tu cuenta ha sido <strong>desactivada</strong> por el administrador. Actualmente no puedes acceder a nuestra plataforma.</p>
                            <p>Si crees que esto es un error o necesitas m&aacute;s informaci&n, por favor contacta con el administrador.</p>
                            <p>Saludos cordiales,</p>
                            <p><strong>El equipo de InspireUp</strong></p>
                        </div>
                    ";

            // Enviar el correo
            app(MailController::class)->enviarCorreo($correo, $asunto, $mensaje);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('admin.usuarios')->with('warning', 'Trabajador desactivado con éxito. Puedes encontrarlo en Usuarios > Estado > Deshabilitado.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('admin.usuarios')->with('error', 'Trabajador no encontrado.');
    }
}
