<?php

namespace App\Http\Controllers;

use App\Models\User; // Ajusta según tu modelo
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Obtener los datos que necesitas para el PDF
        $users = User::all(); // Ajusta según el modelo y consulta que uses

        // Título dinámico
        $titulo = "Reporte de Usuarios"; // Cambia este valor o pásalo como parámetro

        // Generar el PDF
        $pdf = PDF::loadView('pdf.reporte', compact('users', 'titulo'));

        // Descargar o mostrar el PDF
        return $pdf->download('reporte_usuarios.pdf');
    }
}
