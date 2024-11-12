<?php

namespace App\Http\Controllers\Dashboard\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Caja\CajaFondo;
use App\Models\Caja\Presupuesto;
use App\Models\Donaciones\Convocatoria;
use App\Models\Donaciones\Donacion;
use App\Models\Donaciones\Recaudacion;
use App\Models\ProgramasEducativos\InformesSeguimientos;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\Registros\RegistroActividades;
use App\Models\User;
use App\Models\usuarios\Beneficiarios\Beneficiario;
use App\Models\Usuarios\Trabajadores\Administrador;
use App\Models\Usuarios\Trabajadores\Coordinador;
use App\Models\Usuarios\Trabajadores\Trabajador;
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
        $programas_activos = ProgramaEducativo::getTotalProgramas(4);
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
    public function donaciones(Request $request)
    {

        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        if ($seccion == 1) {
            $monto_disponible = CajaFondo::getMontoDisponible();
            $monto_usado = Presupuesto::getMontoTotal();
            $monto_total_donaciones = Donacion::getMontoTotal();
            $total_donaciones = Donacion::paginate(10);
            $total_donaciones_semana = Donacion::getTotalMontoSemana();
            $total_donaciones_mes = Donacion::getTotalMontoMes();
            $topDonadantes = Donacion::getTopDonadores();

            return view(
                'Dashboard.Admin.donaciones',
                compact(
                    [
                        'topDonadantes',
                        'monto_usado',
                        'monto_disponible',
                        'monto_total_donaciones',
                        'total_donaciones',
                        'total_donaciones_semana',
                        'total_donaciones_mes',
                        'seccion'
                    ]
                )
            );
        } else {

            if (empty($request->estado)) {
                $estado = 0;
            } else {
                $estado = $request->estado;
            }

            $searchTerm = $request->search;

            $convocatoriasActivas = Convocatoria::getTotalConvocatoriasPorEstado(1);
            $convocatoriasFinalizadas = Convocatoria::getTotalConvocatoriasPorEstado(2);
            $convocatoriasCanceladas = Convocatoria::getTotalConvocatoriasPorEstado(3);
            $convocatorias = Convocatoria::getConvocatoriaListWithSearch($estado, $searchTerm); // Llama a la función con búsqueda
            $totProductSolici = Convocatoria::getTotalProductosSolicitdos();
            $totProductRecaudados = Recaudacion::getTotalProductosRecaudados();
            $totRegisRecau = Recaudacion::getTotalRegistros();
            $porcentajeRecaudacion = $totProductRecaudados == 0 ? 0 : ($totProductRecaudados * 100) / $totProductSolici;
            // dd($totProductSolici);
            return view(
                'Dashboard.Admin.donaciones',
                compact(
                    [
                        'seccion',
                        'estado',
                        'convocatoriasActivas',
                        'convocatoriasFinalizadas',
                        'convocatoriasCanceladas',
                        'convocatorias',
                        'totProductSolici',
                        'totProductRecaudados',
                        'porcentajeRecaudacion',
                        'totRegisRecau',
                    ]
                )
            );
        }
    }
    public function recursos(Request $request)
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
                'Dashboard.Admin.recursos',
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


            return view('Dashboard.Admin.recursos', compact(['seccion', 'programas']));
        }
    }
    public function usuarios(Request $request)
    {
        // dd($request);
        // Determinar la sección solicitada
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        // dd($seccion);
        // Determinar el rol solicitado o por defecto 'Administrador'
        $rol = $request->get('rol', 'Administrador');

        // Determinar el estado por defecto para la primera sección
        $estado = $seccion == 1 ? $request->get('estado', '1') : '3';

        // Variables de fecha para la segunda sección (con valores por defecto si no se proporcionan)
        $fecha_inicio = $request->get('fecha_inicio', date('Y-m-d', strtotime('-1 month')));
        $fecha_fin = $request->get('fecha_fin', date('Y-m-d', strtotime('+1 week')));

        // Determinar el término de búsqueda si existe
        $search = $request->input('search');

        // dd($seccion);
        // Ejecutar la lógica para cada sección
        if ($seccion == 1) {
            // Sección 1: Búsqueda condicional basada en el rol y el estado
            switch ($rol) {
                case 'Administrador':
                    $datos = Administrador::when($search, function ($query, $search) {
                        return $query->whereHas('trabajador.user', function ($query) use ($search) {
                            // Búsqueda por nombre
                            $query->where('name', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido paterno
                                ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido materno
                                ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por correo
                                ->orWhere('email', 'LIKE', '%' . $search . '%')
                                // Búsqueda por ID de usuario
                                ->orWhere('id', '=', $search);  // Asegúrate de que el 'id' sea numérico
                        });
                    })
                        ->whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
                            $query->where('estado', '=', intval($estado));

                            if ($fecha_inicio) {
                                $query->where('created_at', '>=', $fecha_inicio);
                            }

                            if ($fecha_fin) {
                                $query->where('created_at', '<=', $fecha_fin);
                            }
                        })
                        ->paginate(10);

                    break;
                case 'Coordinador':
                    $datos = Coordinador::when($search, function ($query, $search) {
                        // Si hay un término de búsqueda, filtramos por el nombre del coordinador
                        return $query->whereHas('trabajador.user', function ($query) use ($search) {
                            // Búsqueda por nombre
                            $query->where('name', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido paterno
                                ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido materno
                                ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por correo
                                ->orWhere('email', 'LIKE', '%' . $search . '%')
                                // Búsqueda por ID de usuario
                                ->orWhere('id', '=', $search);  // Asegúrate de que el 'id' sea numérico
                        });
                    })
                        ->whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
                            // Filtramos según el estado, fecha de creación, etc.
                            $query->where('estado', '=', intval($estado));

                            if ($fecha_inicio) {
                                $query->where('created_at', '>=', $fecha_inicio);
                            }

                            if ($fecha_fin) {
                                $query->where('created_at', '<=', $fecha_fin);
                            }
                        })
                        ->paginate(10);  // Paginamos los resultados
                    break;
                case 'Voluntario':
                    $datos = Voluntario::when($search, function ($query, $search) {
                        // Filtramos por nombre del voluntario
                        return $query->whereHas('trabajador.user', function ($query) use ($search) {
                            // Búsqueda por nombre
                            $query->where('name', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido paterno
                                ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido materno
                                ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por correo
                                ->orWhere('email', 'LIKE', '%' . $search . '%')
                                // Búsqueda por ID de usuario
                                ->orWhere('id', '=', $search);  // Asegúrate de que el 'id' sea numérico
                        });
                    })
                        ->whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
                            // Filtramos por el estado, fecha de creación, etc. en la tabla 'trabajadores'
                            $query->where('estado', '=', intval($estado));

                            if ($fecha_inicio) {
                                $query->where('created_at', '>=', $fecha_inicio);
                            }

                            if ($fecha_fin) {
                                $query->where('created_at', '<=', $fecha_fin);
                            }
                        })
                        ->paginate(10);  // Paginamos los resultados
                    break;

                case 'Beneficiario':
                    $datos = Beneficiario::when($search, function ($query, $search) {
                        // Filtramos por nombre del beneficiario
                        return $query->where('nombre', 'LIKE', '%' . $search . '%');
                    })
                        ->paginate(10);  // Paginamos los resultados
                    break;

                default:
                    $datos = collect(); // Devuelve una colección vacía en caso de rol no definido
            }

            return view('Dashboard.Admin.usuarios', compact(['rol', 'estado', 'seccion', 'datos']));
        } else {
            // Sección 2: Búsqueda por fechas y rol
            switch ($rol) {
                case 'Administrador':
                    $datos = Administrador::when($search, function ($query, $search) {
                        return $query->whereHas('trabajador.user', function ($query) use ($search) {
                            // Búsqueda por nombre
                            $query->where('name', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido paterno
                                ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido materno
                                ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por correo
                                ->orWhere('email', 'LIKE', '%' . $search . '%')
                                // Búsqueda por ID de usuario
                                ->orWhere('id', '=', $search);  // Asegúrate de que el 'id' sea numérico
                        });
                    })
                        ->whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
                            $query->where('estado', '=', intval($estado));

                            if ($fecha_inicio) {
                                $query->where('created_at', '>=', $fecha_inicio);
                            }

                            if ($fecha_fin) {
                                $query->where('created_at', '<=', $fecha_fin);
                            }
                        })
                        ->paginate(10);

                    break;
                case 'Coordinador':
                    $datos = Coordinador::when($search, function ($query, $search) {
                        // Si hay un término de búsqueda, filtramos por el nombre del coordinador
                        return $query->whereHas('trabajador.user', function ($query) use ($search) {
                            // Búsqueda por nombre
                            $query->where('name', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido paterno
                                ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido materno
                                ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por correo
                                ->orWhere('email', 'LIKE', '%' . $search . '%')
                                // Búsqueda por ID de usuario
                                ->orWhere('id', '=', $search);  // Asegúrate de que el 'id' sea numérico
                        });
                    })
                        ->whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
                            // Filtramos según el estado, fecha de creación, etc.
                            $query->where('estado', '=', intval($estado));

                            if ($fecha_inicio) {
                                $query->where('created_at', '>=', $fecha_inicio);
                            }

                            if ($fecha_fin) {
                                $query->where('created_at', '<=', $fecha_fin);
                            }
                        })
                        ->paginate(10);  // Paginamos los resultados
                    break;
                case 'Voluntario':
                    $datos = Voluntario::when($search, function ($query, $search) {
                        // Si hay un término de búsqueda, filtramos por el nombre del Voluntario
                        return $query->whereHas('trabajador.user', function ($query) use ($search) {
                            // Búsqueda por nombre
                            $query->where('name', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido paterno
                                ->orWhere('apellido_paterno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por apellido materno
                                ->orWhere('apellido_materno', 'LIKE', '%' . $search . '%')
                                // Búsqueda por correo
                                ->orWhere('email', 'LIKE', '%' . $search . '%')
                                // Búsqueda por ID de usuario
                                ->orWhere('id', '=', $search);  // Asegúrate de que el 'id' sea numérico
                        });
                    })
                        ->whereHas('trabajador', function ($query) use ($estado, $fecha_inicio, $fecha_fin) {
                            // Filtramos según el estado, fecha de creación, etc.
                            $query->where('estado', '=', intval($estado));

                            if ($fecha_inicio) {
                                $query->where('created_at', '>=', $fecha_inicio);
                            }

                            if ($fecha_fin) {
                                $query->where('created_at', '<=', $fecha_fin);
                            }
                        })
                        ->paginate(10);
                    break;
                default:
                    $datos = collect();
            }

            return view('Dashboard.Admin.usuarios', compact(['rol', 'seccion', 'fecha_inicio', 'fecha_fin', 'estado', 'datos']));
        }
    }
}
