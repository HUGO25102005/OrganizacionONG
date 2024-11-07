<?php

namespace App\Http\Controllers\Dashboard\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donaciones\Donacion;
use App\Models\ProgramasEducativos\InformesSeguimientos;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\Registros\RegistroActividades;
use App\Models\User;
use App\Models\usuarios\Beneficiarios\Beneficiario;
use App\Models\Usuarios\Trabajadores\Administrador;
use App\Models\Usuarios\Trabajadores\Coordinador;
use App\Models\Usuarios\Trabajadores\Trabajador;
use App\Models\Usuarios\Trabajadores\Voluntario;

class DashboardCoordinadorController extends Controller
{
    public function home()
    {
        session(['name' => auth()->user()->name, 'rol' => 'Coordinador', 'id' => auth()->user()->id]);
        return view('Dashboard.Coordinador.index');
    }

    public function panelControl()
    {
        $total_ingresos = Donacion::getMontoTotal();
        $ultimas_donaciones = Donacion::all();
        $programas_activos = ProgramaEducativo::getProgramasActivos();
        $total_PS = ProgramaEducativo::getTotalProgramas(1);
        $total_PR = ProgramaEducativo::getTotalProgramas(2);
        $total_PAP = ProgramaEducativo::getTotalProgramas(3);
        $total_PA = ProgramaEducativo::getTotalProgramas(4);
        $total_PT = ProgramaEducativo::getTotalProgramas(5);
        $total_PC = ProgramaEducativo::getTotalProgramas(6);
        $solicitudes_P = ProgramaEducativo::getTotalSolicitudesProgramas();
        $informes_seguimiento = InformesSeguimientos::getTotalInformesSeguimineto();
        $actividades_registradas = RegistroActividades::getTotalActividades();
        $total_beneficiarios = Beneficiario::getTotalBeneficiarios();
        $beneficiarios = Beneficiario::getBeneficiariosActivos();
        $total_BA = Beneficiario::getTotalBeneficiariosActivos(1);
        $total_BI = Beneficiario::getTotalBeneficiariosActivos(2);
        $total_BSO = Beneficiario::getTotalBeneficiariosActivos(3);
        $total_BSU = Beneficiario::getTotalBeneficiariosActivos(4);

        session(['name' => auth()->user()->name,]);

        return view(
            'Dashboard.Coordinador.panel-control',
            compact(
                'total_ingresos',
                'ultimas_donaciones',
                'programas_activos',
                'informes_seguimiento',
                'actividades_registradas',
                'total_beneficiarios',
                'beneficiarios',
                'total_BA',
                'total_PA',
                'solicitudes_P',
                'total_PS',
                'total_PR',
                'total_PAP',
                'total_PT',
                'total_PC',
                'total_BI',
                'total_BSO',
                'total_BSU'
            )
        );
    }

    public function beneficiarios(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        if ($seccion == 1) {

            if (empty($request->rol)) {
                $rol = $request->get('rol', 'Coordinador'); // Cambia 'Administrador' por 'admin' para que coincida con los rols
            } else {
                $rol = $request->rol;
            }

            $estado = $request->get('estado', '1');
            switch ($rol) {
                case 'Administrador':
                    $datos = Administrador::getAdministradoresActivos($estado)->paginate(10);
                    break;
                case 'Coordinador':
                    $datos = Coordinador::getCoordinadoresActivos($estado)->paginate(10);
                    break;
                case 'Voluntario':
                    $datos = Voluntario::getVoluntariosActivos($estado)->paginate(10);
                    break;
                case 'Beneficiario':
                    $datos = Beneficiario::paginate(10);
                    break;
                default:
            }

            return view('Dashboard.Coordinador.beneficiarios', compact(['rol', 'estado', 'seccion'], 'datos'));
        } else {

            $rol = $request->get('rol', 'Coordinador'); // Cambia 'Administrador' por 'admin' para que coincida con los rols

            $estado = '3';

            if (!$request->fecha_inicio) {
                $fecha_inicio = date('Y-m-d', strtotime('-1 month'));
            } else {
                $fecha_inicio = $request->fecha_inicio;
            }

            if (!$request->fecha_fin) {
                $fecha_fin = date('Y-m-d', strtotime('+1 week'));
            } else {
                $fecha_fin = $request->fecha_fin;
            }

            switch ($rol) {
                case 'Administrador':
                    $datos = Administrador::getAdministradoresActivos($estado, $fecha_inicio, $fecha_fin)->paginate(10);
                    break;
                case 'Coordinador':
                    $datos = Coordinador::getCoordinadoresActivos($estado, $fecha_inicio, $fecha_fin)->paginate(10);
                    break;
            }

            return view('Dashboard.Coordinador.beneficiarios', compact(['rol', 'seccion', 'fecha_inicio', 'fecha_fin', 'estado'], 'datos'));
        }
    }

    public function programas(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }
        if ($seccion == 1) {
            $monto_total_donaciones = Donacion::getMontoTotal();
            $total_donaciones = Donacion::all();
            $total_donaciones_semana = Donacion::getTotalMontoSemana();

            return view(
                'Dashboard.Coordinador.programas',
                compact(
                    [
                        'monto_total_donaciones',
                        'total_donaciones',
                        'total_donaciones_semana',
                        'seccion'
                    ]
                )
            );
        } else {
            $search = $request->input('search');

            $programas = ProgramaEducativo::when($search, function ($query, $search) {
                return $query->where('nombre_programa', 'LIKE', '%' . $search . '%')
                    //Aquí recorremos las relaciones para llegar a 'name' en el modelo Usuario
                    ->orWhereHas('voluntario.trabajador.user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereDate('fecha_inicio', '=', date('Y-m-d', strtotime($search)))
                    ->orWhereDate('fecha_termino', '=', date('Y-m-d', strtotime($search)))
                    ->orWhere('estado', 'LIKE', '%' . $search . '%');
                })
                    ->paginate(5);


                if (empty($request->seccion)) {
                    $seccion = $request->get('seccion', 1);
                } else {
                    $seccion = $request->seccion;
                }
                
                return view('Dashboard.Coordinador.programas', compact(['seccion', 'programas']));
        }
    }
    
}
