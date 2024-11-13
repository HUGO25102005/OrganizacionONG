<?php

namespace App\Http\Controllers\Donaciones;

use App\Http\Controllers\Controller;
use App\Models\Donaciones\CargarCampaniasPage;
use App\Models\User;
use Illuminate\Http\Request;

class CargarCampaniasPageController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        // Valida el id_conv y otros posibles campos requeridos
        $data = $request->validate([
            'id_convocatoria' => 'required|exists:convocatorias,id',
            'id_administrador' => 'nullable|exists:administradores,id',
        ]);

        //dd($data);
        try {
            // Verifica si el usuario existe en la sesión
            $userId = session('id');
            $userExists = User::where('id', $userId)->exists();

            if ($userExists) {
                // Crea la campaña
                $campania = CargarCampaniasPage::create($data);

                // Redirecciona con un mensaje de éxito
                $seccion = 2;
                return redirect()
                    ->route('admin.donaciones', compact('seccion'))
                    ->with('success', 'Campaña cargada exitosamente.');
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Usuario no encontrado.');
            }
        } catch (\Exception $e) {
            // Redirecciona en caso de error con el mensaje de la excepción
            return redirect()
                ->back()
                ->with('error', 'Error al crear la campaña: ' . $e->getMessage());
        }
    }



    public function destroy($id)
    {
        $campania = CargarCampaniasPage::where('id_convocatoria', $id)->firstOrFail();

        if (!$campania) {

            return redirect()
                ->route('admin.donaciones', compact('seccion'))
                ->with('error', 'La campaña no existe.');
        } else {

            $campania->delete();
            $seccion = 2;

            return redirect()
                ->route('admin.donaciones', compact('seccion'))
                ->with('warning', 'La campaña fue bajada de la pagina exitosamente.');
        }
    }
}
