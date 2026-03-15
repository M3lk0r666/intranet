<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class IngenieriaController extends Controller
{
    public function switch()
    {
    
        return view('intranet.ingenieria.instalacion-switch',[
            'pdf' => false
        ]);
    }

    public function downloadPDF()
    {
        
        // Opción 1: Descargar directamente
        $pdf = Pdf::setOptions(['isRemoteEnabled' => true])->loadView('intranet.ingenieria.instalacion-switch-pdf');
        
        // Configurar el papel (opcional)
        $pdf->setPaper('A4', 'portrait');
        
        // Opción A: Descargar con nombre personalizado
        $filename = 'instalacion-switch.pdf';
        
        return $pdf->download($filename);
        
        // Opción B: Mostrar en el navegador
        // return $pdf->stream($filename);
        
        // Opción C: Guardar en storage y luego descargar
        // $pdf->save(storage_path("app/public/pdfs/{$filename}"));
        // return response()->download(storage_path("app/public/pdfs/{$filename}"));
    }

    public function firewall()
    {
    
        return view('intranet.ingenieria.instalacion-firewall');
    }

    public function wireless()
    {
    
        return view('intranet.ingenieria.instalacion-aps');
    }

    public function poc()
    {
    
        return view('intranet.ingenieria.instalacion-poc');
    }

    public function preventivo()
    {
    
        return view('intranet.ingenieria.guia-preventivo');
    }

    public function correctivo()
    {
    
        return view('intranet.ingenieria.guia-correctivo');
    }

    public function survey()
    {
        return view('intranet.ingenieria.site-survey');
    }

    public function surveysi()
    {
        return view('intranet.ingenieria.sitesurvey-si');
    }

    public function surveyno()
    {
        return view('intranet.ingenieria.sitesurvey-no');
    }

    public function onsite()
    {
        return view('intranet.ingenieria.guias-on-site');
    }
}

