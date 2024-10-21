<?php

namespace App\Http\Controllers;

use App\Models\ProgramasEducativos\ProgramaEducativo;
use App\Models\usuarios\Beneficiarios\Beneficiario;
use App\Models\usuarios\Trabajadores\Administrador;
use App\Models\usuarios\Trabajadores\Coordinador;
use App\Models\usuarios\Trabajadores\Voluntario;
use Barryvdh\DomPDF\Facade\Pdf;  // Ajustar la referencia a la clase PDF
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generarPDF_P()
    {

        $programas = ProgramaEducativo::all();

        // Título para el PDF
        $titulo = 'Programas Educativos';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte_p', compact('programas', 'titulo'));

        // Devolver el PDF como descarga
        return $pdf->download('Programas_educativos.pdf');
    }

    public function generarPDF_A()
    {

        $administradores = Administrador::all();
        
        // Título para el PDF
        $titulo = 'Administradores';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte_a', compact('administradores', 'titulo'));
        
        // Devolver el PDF como descarga
        return $pdf->download('Administradores.pdf');
    }

    public function generarPDF_C()
    {

        $coordinadores = Coordinador::all();

        // Título para el PDF
        $titulo = 'Coordinadores';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte_c', compact('coordinadores', 'titulo'));

        // Devolver el PDF como descarga
        return $pdf->download('Coordinadores.pdf');
    }

    public function generarPDF_V()
    {

        $voluntarios = Voluntario::all();

        // Título para el PDF
        $titulo = 'Voluntarios';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte_v', compact('voluntarios', 'titulo'));

        // Devolver el PDF como descarga
        return $pdf->download('Voluntarios.pdf');
    }
    
    public function generarPDF_B()
    {

        $beneficiarios = Beneficiario::all();

        // Título para el PDF
        $titulo = 'Beneficiarios';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte_b', compact('beneficiarios', 'titulo'));

        // Devolver el PDF como descarga
        return $pdf->download('Beneficiarios.pdf');
    }

    public function generarPDF_All()
    {

        $administradores = Administrador::all();
        $coordinadores = Coordinador::all();
        $voluntarios = Voluntario::all();
        $beneficiarios = Beneficiario::all();

        // Título para el PDF
        $titulo = 'Usuarios';

        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('pdf.reporte_all', compact('administradores', 'coordinadores', 'voluntarios', 'beneficiarios', 'titulo'));

        // Devolver el PDF como descarga
        return $pdf->download('Usuarios.pdf');
    }
}