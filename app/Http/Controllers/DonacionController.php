<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* use App\Models\Donaciones\Donante; */
use App\Models\Donaciones\Donacion;

class DonacionController extends Controller
{
    public function procesarDonacion(Request $request)
    {
        dd($request->all());
        try {
            // Validar los datos recibidos
            $request->validate([
                'transaction_id' => 'required|string', // ID de la transacción
                'status' => 'required|string', // Estado de la transacción
                'amount' => 'required|numeric', // Monto de la transacción
                'currency' => 'required|string|max:4', // Moneda de la transacción
            ]);

            // Guardar la donación en la base de datos
            $donacion = Donacion::create([
                'id_transaccion' => $request->transaction_id,
                'currency' => $request->currency,
                'monto' => $request->amount,
                'status' => $request->status,
            ]);

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