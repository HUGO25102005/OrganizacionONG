<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\StoreBeneficiarioRequest;
use App\Models\User;
use App\Models\Usuarios\Beneficiarios\Beneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use Illuminate\Support\Str;

class BeneficiarioController extends Controller
{
    public function aceptarSolicitudBeneficiario(Request $request)
    {

        $idBeneficiario = $request->id;

        $beneficiario = Beneficiario::find($idBeneficiario);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 1]);
            $passwordTemporal = Str::random(8);

            // Hashear y actualizar la contraseña en el modelo User
            $beneficiario->user->update(['password' => bcrypt($passwordTemporal)]);

            $correo = $beneficiario->user->email;
            $asunto = 'Credenciales: ';
            // Crear el mensaje con la nueva contraseña
            $mensaje = "
                        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                            <h1 style='color: #4CAF50;'>Hola, {$beneficiario->user->name}.</h1>
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
            return redirect()->route('coordinador.beneficiarios',)->with('success', 'Beneficiario activado con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios')->with('error', 'Ocurrió un error al activar el beneficiario.');
    }

    public function aceptarSolicitudBeneficiario2(Request $request)
    {

        $idBeneficiario = $request->id;

        $beneficiario = Beneficiario::find($idBeneficiario);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 1]);
            $passwordTemporal = Str::random(8);

            // Hashear y actualizar la contraseña en el modelo User
            $beneficiario->user->update(['password' => bcrypt($passwordTemporal)]);

            $correo = $beneficiario->user->email;
            $asunto = 'Credenciales: ';
            // Crear el mensaje con la nueva contraseña
            $mensaje = "
                        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                            <h1 style='color: #4CAF50;'>Hola, {$beneficiario->user->name}.</h1>
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
            return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('success', 'Solicitud aceptada con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('error', 'Ocurrió un error al aceptar el beneficiario.');
    }

    public function desactivarBeneficiario(Request $request)
    {
        // Obtener el ID del trabajador del request
        $id = $request->id;

        // Encontrar el trabajador por su ID
        $beneficiario = Beneficiario::find($id);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 2]);
            
            $correo = $beneficiario->user->email;
            $asunto = 'Notificación de Desactivaci&oacute;n de Cuenta';
            $mensaje = "
                        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                            <h1 style='color: #d9534f;'>Hola, {$beneficiario->user->name}.</h1>
                            <p>Lamentamos informarte que tu cuenta ha sido <strong>desactivada</strong> por el administrador. Actualmente no puedes acceder a nuestra plataforma.</p>
                            <p>Si crees que esto es un error o necesitas m&aacute;s informaci&oacute;n, por favor contacta con el administrador.</p>
                            <p>Saludos cordiales,</p>
                            <p><strong>El equipo de InspireUp</strong></p>
                        </div>
                    ";

            // Enviar el correo
            app(MailController::class)->enviarCorreo($correo, $asunto, $mensaje);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.beneficiarios')->with('warning', 'Beneficiario desactivado con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios')->with('error', 'Ocurrió un error al desactivar el beneficiario.');
    }
    public function cancelarBeneficiario(Request $request)
    {
        // Obtener el ID del trabajador del request
        $id = $request->id;

        // Encontrar el trabajador por su ID
        $beneficiario = Beneficiario::find($id);

        if ($beneficiario) {
            // Actualizar el estado del trabajador, asumiendo que el campo se llama 'activo'
            $beneficiario->update(['estado' => 4]);
            
            $correo = $beneficiario->user->email;
            $asunto = 'Notificación de Rechazo de Cuenta';
            $mensaje = "
                        <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                            <h1 style='color: #d9534f;'>Hola, {$beneficiario->user->name}.</h1>
                            <p>Lamentamos informarte que tu cuenta ha sido <strong>rechazada</strong> por el administrador. Actualmente no puedes acceder a nuestra plataforma.</p>
                            <p>Si crees que esto es un error o necesitas m&aacute;s informaci&oacute;n, por favor contacta con el administrador.</p>
                            <p>Saludos cordiales,</p>
                            <p><strong>El equipo de InspireUp</strong></p>
                        </div>
                    ";

            // Enviar el correo
            app(MailController::class)->enviarCorreo($correo, $asunto, $mensaje);

            // Redirigir de vuelta con un mensaje de éxito
            return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('warning', 'Solicitud cancelada con éxito.');
        }

        // Si no se encuentra el trabajador, redirigir con un mensaje de error
        return redirect()->route('coordinador.beneficiarios', ['seccion' => 2])->with('error', 'Ocurrió un error al cancelar la solicitud.');
    }

    public function store(StoreBeneficiarioRequest $request)
    {
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'pais' => $request->pais,
            'estado' => $request->estado,
            'municipio' => $request->municipio,
            'cp' => $request->cp,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
        ]);

        // Crear el beneficiario y asignar los datos relacionados
        $beneficiario = Beneficiario::create([
            'id_user' => $user->id,  // Relación con el usuario recién creado
            'estado' => 3,  // Estado solicitado por defecto
            'nivel_educativo' => $request->nivel_educativo,
            'ocupacion' => $request->ocupacion,
            'num_dependientes' => $request->num_dependientes,
            'ingresos_mensuales' => $request->ingresos_mensuales,
        ]);
    }
}
