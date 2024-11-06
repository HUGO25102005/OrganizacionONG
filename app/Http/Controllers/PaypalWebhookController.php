<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donaciones\Donacion;
use App\Models\Donaciones\Donante;
use Illuminate\Support\Facades\Log;

class PaypalWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // PayPal envía un JSON que debemos decodificar
        $data = $request->all();

        // Verifica el evento y extrae datos relevantes
        if (isset($data['event_type']) && $data['event_type'] == 'PAYMENT.CAPTURE.COMPLETED') {
            // Obtén detalles de la transacción
            $transaction = $data['resource'];

            // Extrae los datos de donación y donante
            $payerId = $transaction['payer']['payer_id'];
            $firstName = $transaction['payer']['name']['given_name'];
            $lastName = $transaction['payer']['name']['surname'];
            $email = $transaction['payer']['email_address'];
            $countryCode = $transaction['payer']['address']['country_code'];
            $transactionId = $transaction['id'];
            $currency = $transaction['amount']['currency_code'];
            $amount = $transaction['amount']['value'];

            // Guarda o actualiza al donante
            $donante = Donante::updateOrCreate(
                ['payer_id' => $payerId],
                [
                    'email' => $email,
                    'Tipo_Donante' => 'Individual', // Puedes ajustarlo si es necesario
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'country_code' => $countryCode,
                ]
            );

            // Guarda la donación en la tabla 'donacion'
            Donacion::create([
                'id_transaccion' => $transactionId,
                'payer_id' => $donante->id,
                'currency' => $currency,
                'monto' => $amount,
            ]);

            // Responde a PayPal con éxito
            return response()->json(['status' => 'success'], 200);
        }

        // Si el evento no es el esperado, regresa una respuesta vacía
        return response()->json(['status' => 'ignored'], 200);
    }
}
