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
        $programas_activos = ProgramaEducativo::getProgramasActivos()->take(5)->get();
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
        $total_BA = Beneficiario::getTotalBeneficiariosActivos(1);
        $total_BI = Beneficiario::getTotalBeneficiariosActivos(2);
        $total_BSO = Beneficiario::getTotalBeneficiariosActivos(3);
        $total_BC = Beneficiario::getTotalBeneficiariosActivos(4);
        $total_BP = Beneficiario::getTotalNivelE(1);
        $total_BS = Beneficiario::getTotalNivelE(2);
        $total_BB = Beneficiario::getTotalNivelE(3);
        $total_BU = Beneficiario::getTotalNivelE(4);

        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        if ($seccion == 1) {

            if (empty($request->estado)) {
                $estado = $request->get('estado', '0');
            } else {
                $estado = $request->estado;
            }
            
            $beneficiariosearch = null;

            switch($estado){
                case '0':
                    $datos = Beneficiario::getBeneficiarios()->paginate(10);
                    $search = $request->input('search');
                    $beneficiariosearch = Beneficiario::getBeneficiarios($search)->paginate(10);
                    break;
                case '1':
                    $datos = Beneficiario::getBeneficiariosE(1)->paginate(10);
                    break;
                case '2':
                    $datos = Beneficiario::getBeneficiariosE(2)->paginate(10);                    
                    break;
            }

                
            return view('Dashboard.Coordinador.beneficiarios', compact(['estado', 'seccion'], 'datos', 'total_BI', 'total_BSO', 'total_BA', 'total_BC', 'total_BP', 'total_BS', 'total_BB', 'total_BU', 'beneficiariosearch'));
        } else {
            
            if (empty($request->estado)) {
                $estado = $request->get('estado', '0');
            } else {
                $estado = $request->estado;
            }

            $seccion = $request->get('seccion', 2);
            $beneficiariosearch2 = null;
            switch($estado){
                case '0':
                    $datos = Beneficiario::getBeneficiarios2()->paginate(10);
                    $search = $request->input('search');
                    $beneficiariosearch2 = Beneficiario::getBeneficiarios2($search)->paginate(10);
                    break;
                case '3':
                    $datos = Beneficiario::getBeneficiariosE(3)->paginate(10);
                    break;
                case '4':
                    $datos = Beneficiario::getBeneficiariosE(4)->paginate(10);                    
                    break;
            }
                    
            return view('Dashboard.Coordinador.beneficiarios', compact(['seccion', 'estado'], 'datos', 'beneficiariosearch2', 'seccion'));
        }
    }

    public function programas(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        if (empty($request->estado)) {
            $estado = $request->get('estado', '0');
        } else {
            $estado = $request->estado;
        }

        if ($seccion == 1) {
            $monto_total_donaciones = Donacion::getMontoTotal();
            $total_donaciones = Donacion::all();
            $total_donaciones_semana = Donacion::getTotalMontoSemana();
            $programas = ProgramaEducativo::getProgramasActivos()->get();

            return view(
                'Dashboard.Coordinador.programas',
                compact(
                    [
                        'monto_total_donaciones',
                        'total_donaciones',
                        'total_donaciones_semana',
                        'seccion',
                        'programas',
                        'estado'
                    ]
                )
            );
        } else {
            $search = $request->input('search');
            
            

            if (empty($request->estado)) {
                $estado = $request->get('estado', '0');
            } else {
                $estado = $request->estado;
            }

            $seccion = $request->get('seccion', 2);

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
                
                return view('Dashboard.Coordinador.programas', compact('seccion', 'programas', 'estado'));
        }
    }
    
}
