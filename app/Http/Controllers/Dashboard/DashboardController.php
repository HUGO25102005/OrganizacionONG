<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comprobantes\ComprobanteIngreso;
use App\Models\ProgramasEducativos\InformesSeguimientos;
use App\Models\ProgramasEducativos\ProgramasEducativos;
use App\Models\Registros\Donacion;
use App\Models\Registros\RegistroActividades;
use App\Models\User;
use App\Models\usuarios\Admin;
use App\Models\usuarios\Beneficiario;
use App\Models\usuarios\Coordinador;
use App\Models\usuarios\Voluntario;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminHome()
    {


        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);
        return view('Dashboard.Admin.index');
    }
    public function adminPanelControl()
    {

        $total_ingresos = ComprobanteIngreso::getMontoTotalDonaciones();
        $ultimas_donaciones = Donacion::all();
        $programas_activos = ProgramasEducativos::getTotalProgramasActivos();
        $informes_seguimiento = InformesSeguimientos::getTotalInformesSeguimineto();
        $actividades_registradas = RegistroActividades::getTotalActividades();
        $total_beneficiarios = Beneficiario::getTotalBeneficiarios();
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);

        return view(
            'Dashboard.Admin.panel-control',
            compact(
                'total_ingresos',
                'ultimas_donaciones',
                'programas_activos',
                'informes_seguimiento',
                'actividades_registradas',
                'total_beneficiarios',
            )
        );
    }
    public function adminDonaciones()
    {

        $monto_total_donaciones = ComprobanteIngreso::getMontoTotalDonaciones();
        $total_recaudado_semana = ComprobanteIngreso::getTotalRecaudadoSemana();
        $total_donaciones = Donacion::getTotalDonaciones();
        $total_donaciones_semana = Donacion::getTotalDonacionesSemana();

        return view(
            'Dashboard.Admin.donaciones',
            compact(
                'monto_total_donaciones',
                'total_recaudado_semana',
                'total_donaciones',
                'total_donaciones_semana',
            )
        );
    }
    public function adminProgramas(Request $request)
    {
        $search = $request->input('search');
        $programas = ProgramasEducativos::when($search, function ($query, $search) {
            return $query->where('Nombre_Programa', 'LIKE', '%' . $search . '%')
                ->orWhereHas('usuario', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orWhereDate('Fecha_Inicio', '=', date('Y-m-d', strtotime($search))) // Cambiar a orWhereDate
                ->orWhereDate('Fecha_Termino', '=', date('Y-m-d', strtotime($search))) // Cambiar a orWhereDate
                ->orWhere('Estado', 'LIKE', '%' . $search . '%');
        })
            ->paginate(5);

        return view('Dashboard.Admin.programas', compact('programas'));
    }
    public function adminUsuarios(Request $request)
    {
        $tipo = $request->get('tipo', 'Administrador'); // Cambia 'Administrador' por 'admin' para que coincida con los tipos

        /** @
        // Utiliza un array para mapear los tipos a los modelos correspondientes
        $modelMap = [
            'admin' => Admin::class,
            'coordinador' => Coordinador::class,
            'voluntario' => Voluntario::class,
            'beneficiario' => Beneficiario::class,
        ];

        // Verifica si el tipo es válido antes de continuar
        if (array_key_exists($tipo, $modelMap)) {
            $datos = $modelMap[$tipo]::paginate(10); // Pagina los datos del modelo correspondiente
        } else {
            // Manejo de error o redirección si el tipo no es válido
            return redirect()->route('admin.usuarios', ['tipo' => 'admin']); // Redirigir a la pestaña de administradores por defecto
        }
        */

        if($tipo != 'Beneficiario'){
            $datos = User::where('Rol', $tipo)->paginate(10);
        } else {
            $datos = Beneficiario::paginate(10);
        }



        return view('Dashboard.Admin.usuarios', compact('tipo', 'datos')); // Pasa los datos a la vista
    }
}
