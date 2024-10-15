<?php

namespace App\Http\Controllers\Dashboard\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Donaciones\Donacion;
use App\Models\ProgramasEducativos\InformesSeguimientos;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\Registros\RegistroActividades;
use App\Models\User;
use App\Models\usuarios\Beneficiarios\Beneficiario;
use App\Models\Usuarios\Trabajadores\Administrador;
use App\Models\Usuarios\Trabajadores\Coordinador;
use App\Models\Usuarios\Trabajadores\Voluntario;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        
        session(['name' => auth()->user()->name, 'rol' => 'Administrador', 'id' => auth()->user()->id]);

        return view('Dashboard.Admin.index');
    }

    public function panelControl()
    {

        $total_ingresos = Donacion::getMontoTotal();
        $ultimas_donaciones = Donacion::all();
        $programas_activos = ProgramaEducativo::getTotalProgramasActivos();
        $informes_seguimiento = InformesSeguimientos::getTotalInformesSeguimineto();
        $actividades_registradas = RegistroActividades::getTotalActividades();
        $total_beneficiarios = Beneficiario::getTotalBeneficiarios();
    
        session(['name' => auth()->user()->name,]);

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
    public function donaciones()
    {

        $monto_total_donaciones = Donacion::getMontoTotal();
        $total_donaciones = Donacion::all();
        $total_donaciones_semana = Donacion::getTotalMontoSemana();

        return view(
            'Dashboard.Admin.donaciones',
            compact(
                'monto_total_donaciones',
                'total_donaciones',
                'total_donaciones_semana',
            )
        );
    }
    public function programas(Request $request)
    {
        $search = $request->input('search');

        $programas = ProgramaEducativo::when($search, function ($query, $search) {
            return $query->where('nombre_programa', 'LIKE', '%' . $search . '%')
                // Aquí recorremos las relaciones para llegar a 'name' en el modelo Usuario
                ->orWhereHas('voluntario.trabajador.user', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orWhereDate('fecha_inicio', '=', date('Y-m-d', strtotime($search)))
                ->orWhereDate('fecha_termino', '=', date('Y-m-d', strtotime($search)))
                ->orWhere('estado', 'LIKE', '%' . $search . '%');
        })
        ->paginate(5);
        
        
        

        return view('Dashboard.Admin.programas', compact('programas'));
    }
    public function usuarios(Request $request)
    {
        $tipo = $request->get('tipo', 'Administrador'); // Cambia 'Administrador' por 'admin' para que coincida con los tipos
        
        switch($tipo){
            case 'Administrador':
                $datos = Administrador::paginate(10);
                break;
            case 'Coordinador': 
                $datos = Coordinador::paginate(10);
                break;
            case 'Voluntario':
                $datos = Voluntario::paginate(10);
                break;
            case 'Beneficiario':
                $datos = Beneficiario::paginate(10);
                break;
        }



        return view('Dashboard.Admin.usuarios', compact('tipo', 'datos')); // Pasa los datos a la vista
    }
    
}
