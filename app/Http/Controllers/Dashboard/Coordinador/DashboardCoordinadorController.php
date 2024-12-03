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
        $total_PI = ProgramaEducativo::getTotalProgramas(2);
        $total_PAP = ProgramaEducativo::getTotalProgramas(3);
        $total_PA = ProgramaEducativo::getTotalProgramas(4);
        $total_PT = ProgramaEducativo::getTotalProgramas(5);
        $total_PC = ProgramaEducativo::getTotalProgramas(6);
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
                'total_PS',
                'total_PI',
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

                
            return view('Dashboard.Coordinador.beneficiarios', compact(['estado', 'seccion', 'datos', 'total_BI', 'total_BSO', 'total_BA', 'total_BC', 'total_BP', 'total_BS', 'total_BB', 'total_BU', 'beneficiariosearch']));
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
                    
            return view('Dashboard.Coordinador.beneficiarios', compact(['seccion', 'estado', 'datos', 'beneficiariosearch2']));
        }
    }

    public function programas(Request $request)
    {
        $monto_total_donaciones = Donacion::getMontoTotal();
        $total_donaciones = Donacion::all();
        $total_donaciones_semana = Donacion::getTotalMontoSemana();
        $programas = ProgramaEducativo::getProgramasActivos()->get();
        $programas_solicitados = ProgramaEducativo::getTotalProgramas(1);
        $programas_inactivos = ProgramaEducativo::getTotalProgramas(2);
        $programas_aprobados = ProgramaEducativo::getTotalProgramas(3);
        $programas_activos = ProgramaEducativo::getTotalProgramas(4);
        $programas_terminados = ProgramaEducativo::getTotalProgramas(5);
        $programas_cancelados = ProgramaEducativo::getTotalProgramas(6);


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
            $programassearch = null;
            switch($estado){
                case '0':
                    $datos = ProgramaEducativo::getProgramasAll()->paginate(10);
                    $search = $request->input('search'); 
                    $programassearch = ProgramaEducativo::getProgramasEducativos($search)->paginate(10);
                    break;
                case '2':
                    $datos = ProgramaEducativo::getProgramas(2)->paginate(10);
                    break;
                case '4':
                    $datos = ProgramaEducativo::getProgramas(4)->paginate(10);                    
                    break;
                case '5':
                    $datos = ProgramaEducativo::getProgramas(5)->paginate(10);                    
                    break;
            }

            return view(
                'Dashboard.Coordinador.programas',
                compact(
                    [
                        'monto_total_donaciones',
                        'total_donaciones',
                        'total_donaciones_semana',
                        'seccion',
                        'programas',
                        'estado',
                        'programas_solicitados',
                        'programas_inactivos',
                        'programas_aprobados',
                        'programas_activos',
                        'programas_terminados',
                        'programas_cancelados',
                        'datos',
                        'programassearch'
                    ]
                )
            );
        }  else {
            
            if (empty($request->estado)) {
                $estado = $request->get('estado', '0');
            } else {
                $estado = $request->estado;
            }

            $seccion = $request->get('seccion', 2);
            $programassearch1 = null;
            switch($estado){
                case '0':
                    $datos = ProgramaEducativo::getProgramasAll1()->paginate(10);
                    $search = $request->input('search');
                    $programassearch1 = ProgramaEducativo::getProgramasEducativos1($search)->paginate(10);
                    break;
                case '1':
                    $datos = ProgramaEducativo::getProgramas(1)->paginate(10);
                    break;
                case '3':
                    $datos = ProgramaEducativo::getProgramas(3)->paginate(10);                    
                    break;
                case '6':
                    $datos = ProgramaEducativo::getProgramas(6)->paginate(10);                    
                    break;
            }
                    
            return view('Dashboard.Coordinador.programas', compact(['seccion', 'estado', 'datos', 'programassearch1']));
        }
    }
    
}
