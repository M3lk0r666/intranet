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

    public function infra()
    {
        return view('intranet.ingenieria.levantamiento-infra');
    }

    public function exportPdf()
    {
        $pdf = Pdf::loadView('pdf.site-survey')
            ->setPaper('a4', 'portrait');
        return $pdf->download('guia-site-survey.pdf');
    }

    public function expswitch()
    {
        $pdf = Pdf::loadView('pdf.implementacion-switch')
            ->setPaper('a4', 'portrait');
        return $pdf->download('guia-implementacion-switch.pdf');
    }

    public function exportMantoCorrectivoPdf()
    {
        $pdf = Pdf::loadView('pdf.mantto-correctivo')
            ->setPaper('a4', 'portrait');

        return $pdf->download('mantto-correctivo.pdf');
    }

    public function exportFirewallPdf()
    {
        $pdf = Pdf::loadView('pdf.instalacion-firewall')
            ->setPaper('a4', 'portrait');

        return $pdf->download('guia-firewall.pdf');
    }

    public function exportApPdf()
    {
        $pdf = Pdf::loadView('pdf.instalacion-aps')
            ->setPaper('a4', 'portrait');

        return $pdf->download('guia-access-points.pdf');
    }

    public function exportPocPdf()
    {
        $pdf = Pdf::loadView('pdf.instalacion-poc')
            ->setPaper('a4', 'portrait');

        return $pdf->download('guia-poc.pdf');
    }

    public function exportManttoPreventivoPdf()
    {
        $pdf = Pdf::loadView('pdf.mantto-preventivo')
            ->setPaper('a4', 'portrait');

        return $pdf->download('mantenimiento-preventivo.pdf');
    }

    public function preRequisito()
    {
        return view('intranet.ingenieria.pre-requisito-switch');
    }

    public function exportChecklistSwitchPdf()
    {
        $pdf = Pdf::loadView('pdf.checklist-switches')
            ->setPaper('a4', 'portrait');

        return $pdf->download('checklist-switches.pdf');
    }
}

