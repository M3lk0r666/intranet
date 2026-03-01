<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileDocument;

class IntranetController extends Controller
{
    //Metodos personalizados
    public function welcome()
    {
    
        return view('intranet.welcome');
    }

    public function politica()
    {
    
        return view('intranet.politica-privacidad');
    }

    public function index()
    {
    
        return view('intranet.index');
    }

    public function estructura()
    {
    
        return view('intranet.estructura-interna');
    }

    public function organigrama()
    {
    
        return view('intranet.estructurainterna.organigrama');
    }

    public function proceso()
    {
    
        return view('intranet.estructurainterna.proceso-comercial');
    }

    public function administracion()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.administracion');
    }

    public function colaboralta()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.alta-colaborador');
    }

    public function colaborbaja()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.baja-colaborador');
    }
    public function camioneta()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.uso-camioneta');
    }

    public function incidencia()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.incidencias');
    }

    public function horario()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.horario-laboral');
    }

    public function factura()
    {
    
        return view('intranet.estructurainterna.proceso-administracion.facturacion-inventario');
    }

    public function directorio()
    {
    
        return view('intranet.estructurainterna.directorio-empresarial');
    }

    public function portsoporte()
    {
    
        return view('intranet.ingenieria.portal-soporte');
    }

    public function tickets()
    {
    
        return view('intranet.ingenieria.guia-tickets');
    }

    public function demandaomni()
    {
    
        return view('intranet.estructurainterna.demanda-omnicanal');
    }

    public function asignacuenta()
    {
    
        return view('intranet.estructurainterna.asignacion-cuenta');
    }

    public function analisisreque()
    {
    
        return view('intranet.estructurainterna.analisis-requerimiento');
    }

    public function solucion()
    {
    
        return view('intranet.estructurainterna.solucion-propuesta');
    }

    public function cierre()
    {
    
        return view('intranet.estructurainterna.negociacion-cierre');
    }

    public function poc()
    {
    
        return view('intranet.ingenieria.solicitud-poc');
    }

    public function preventivo()
    {
    
        return view('intranet.ingenieria.mantto-preventivo');
    }

    public function correctivo()
    {
    
        return view('intranet.ingenieria.mantto-correctivo');
    }

    public function diagrama()
    {
    
        return view('intranet.estructurainterna.comercial-diagrama');
    }

    public function operacion()
    {
    
        return view('intranet.estructurainterna.operacion');
    }

    public function imgcorporativa()
    {
    
        return view('intranet.estructurainterna.imagen-corporativa');
    }

    public function ingenieria(FileDocument $document)
    {
        /* $documentos = FileDocument::byCategory('documents')->get();
        dd($documentos); */
    
        return view('intranet.estructurainterna.ingenieria');
    }

    public function proinge()
    {
    
        return view('intranet.estructurainterna.proceso-ingenieria');
    }
    public function ingediagrama()
    {
    
        return view('intranet.estructurainterna.ingeneria-entrega');
    }

    public function soporte()
    {
    
        return view('intranet.estructurainterna.soporte-cliente');
    }

    public function soportediagrama()
    {
    
        return view('intranet.estructurainterna.soporte-diagrama');
    }

    public function formacion()
    {
    
        return view('intranet.formacion-academica');
    }

    public function historia()
    {
    
        return view('intranet.formacion-academica.historia-ia');
    }


}
