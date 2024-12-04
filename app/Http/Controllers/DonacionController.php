<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Models\Donaciones\Donante; */
use App\Models\Donaciones\Donacion;
use App\Models\Donaciones\Donante;
use App\Http\Controllers\MailController;

class DonacionController extends Controller
{
    public function procesarDonacion(Request $request)
    {

        try {
            // Validar los datos recibidos
            $request->validate([
                'transaction_id' => 'required|string', // ID de la transacción
                'status' => 'required|string', // Estado de la transacción
                'amount' => 'required|numeric', // Monto de la transacción
                'currency' => 'required|string|max:4', // Moneda de la transacción
            ]);

            $correo = $request->correo ?? '';

            if ($request->id_donante != 2 && !empty($correo)) {

                $correo = $request->correo;

                // Buscar donante por correo
                $donante = Donante::where('email', '=', $correo)->first();

                if ($donante) {
                    // Si el donante existe, actualizamos sus datos
                    $donante->update([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'country_code' => $request->country_code,
                    ]);

                    $idParaDonacion = $donante->id; // Obtenemos el ID del donante existente
                } else {
                    // Si no existe, creamos uno nuevo
                    $nuevoDonante = Donante::create([
                        'email' => $correo,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'country_code' => $request->country_code,
                    ]);

                    $idParaDonacion = $nuevoDonante->id; // Obtenemos el ID del nuevo donante
                }


                // Guardar la donación en la base de datos
                $donacion = Donacion::create([
                    'id_transaccion' => $request->transaction_id,
                    'currency' => $request->currency,
                    'monto' => $request->amount,
                    'status' => $request->status,
                    'id_donante' => $idParaDonacion,
                ]);
            } else {
                $donacion = Donacion::create([
                    'id_transaccion' => $request->transaction_id,
                    'currency' => $request->currency,
                    'monto' => $request->amount,
                    'status' => $request->status,
                    'id_donante' => $request->id_donante,
                ]);
            }

            if ($donacion) {
                $asunto = "Gracias por tu donaci&oacute;n - InspireUp";
                $mensaje = "
                            <p>Estimado(a) {$request->first_name} {$request->last_name},</p>
                            <p>Gracias por tu generosa donación a InspireUp. Nos alegra contar con tu apoyo para seguir promoviendo nuestras iniciativas.</p>
                            <p><strong>Detalles de tu donación:</strong></p>
                            <ul>
                                <li><strong>ID de Donaci&oacute;n:</strong> {$donacion->id}</li>
                                <li><strong>Monto:</strong> {$request->amount} {$request->currency}</li>
                                <li><strong>ID de Transacci&oacute;n:</strong> {$request->transaction_id}</li>
                            </ul>
                            <p>Si tienes alguna duda o aclaraci&oacute;n, por favor no dudes en escribirnos a <a href='mailto:inspireup.notificador@gmail.com'>inspireup.notificador@gmail.com</a>.</p>
                            <p>¡Gracias por hacer la diferencia!</p>
                            <p>Atentamente,</p>
                            <p><strong>Equipo InspireUp</strong></p>
                        ";
                app(MailController::class)->enviarCorreo($correo, $asunto, $mensaje);
            }
            // dd($donacion);
            // Retornar respuesta exitosa
            return response()->json([
                'message' => 'Donación procesada correctamente.',
                'donacion' => $donacion,
            ], 200);
        } catch (\Exception $e) {
            // Registrar el error en los logs
            /* \Log::error('Error al procesar la donación:', ['exception' => $e->getMessage()]); */
            return response()->json([
                'error' => 'Error al procesar la donación: ' . $e->getMessage(),
            ], 500);
        }
    }
}
