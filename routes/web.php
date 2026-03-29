<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\IntranetController;
use App\Http\Controllers\FileDocumentController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\IngenieriaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VideoController;

/*Route::redirect('/', 'posts')->name('home');
 Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('intranet.welcome');
})->name('home');

/* Route::get('/procesos', function () {
    return view('procesos');
}); */

//Rutas para la Intranet-Bienvenido
Route::get('/bienvenido', [IntranetController::class, 'welcome'])->name('bienvenido');
Route::get('/politica-privacidad', [IntranetController::class, 'politica'])->name('politica-privacidad');

//Rutas para la Intranet-Principal
Route::get('/', [IntranetController::class, 'index'])->name('intranet.index');

//Rutas para la Intranet-Procesos
Route::get('/procesos-empresariales', [IntranetController::class, 'estructura'])->name('procesos-empresariales');
//Ruta Organigrama
Route::get('/estructura-interna/organigrama', [IntranetController::class, 'organigrama'])->name('estructurainterna.organigrama');
//Ruta ProcesoComercial-IT
Route::get('/estructura-interna/proceso-comercial', [IntranetController::class, 'proceso'])->name('estructurainterna.proceso-comercial');
//Ruta ProcesoComercialFase1
Route::get('/estructura-interna/proceso-comercial/demanda-omnicanal', [IntranetController::class, 'demandaomni'])->name('estructurainterna.proceso-comercial.demanda-omnicanal');
//Ruta ProcesoComercialFase2
Route::get('/estructura-interna/proceso-comercial/asinacion-cuenta', [IntranetController::class, 'asignacuenta'])->name('estructurainterna.proceso-comercial.asignacion-cuenta');
//Ruta ProcesoComercialFase3
Route::get('/estructura-interna/proceso-comercial/analisis-requerimiento', [IntranetController::class, 'analisisreque'])->name('estructurainterna.proceso-comercial.analisis-requerimiento');
//Ruta ProcesoComercialFase4
Route::get('/estructura-interna/proceso-comercial/solucion-propuesta', [IntranetController::class, 'solucion'])->name('estructurainterna.proceso-comercial.solucion-propuesta');
//Ruta ProcesoComercialFase6
Route::get('/estructura-interna/proceso-comercial/negociacion-cierre', [IntranetController::class, 'cierre'])->name('estructurainterna.proceso-comercial.negociacion-cierre');

//Ruta ProcesoAdministracion
Route::get('/estructura-interna/administracion', [IntranetController::class, 'administracion'])->name('estructurainterna.admnistracion');
//Ruta AltaColaborador
Route::get('/estrcutura-interna/proceso-amdinistracion/alta-colaborador', [IntranetController::class, 'colaboralta'])->name('administracion.alta-colaborador');
//Ruta BajaColaborador
Route::get('/estrcutura-interna/proceso-amdinistracion/baja-colaborador', [IntranetController::class, 'colaborbaja'])->name('administracion.baja-colaborador');
//Ruta usoCamioneta
Route::get('/estrcutura-interna/proceso-amdinistracion/uso-camioneta', [IntranetController::class, 'camioneta'])->name('administracion.uso-camioneta');
//Ruta incidencias
Route::get('/estrcutura-interna/proceso-amdinistracion/incidencias', [IntranetController::class, 'incidencia'])->name('administracion.incidencias');
//Ruta horarios
Route::get('/estrcutura-interna/proceso-amdinistracion/horario-laboral', [IntranetController::class, 'horario'])->name('administracion.horario-laboral');
//Ruta facturacion
Route::get('/estrcutura-interna/proceso-amdinistracion/facturacion-inventario', [IntranetController::class, 'factura'])->name('administracion.facturacion-inventario');

//Ruta ProcesoComercial-IT-Diagrama
Route::get('/estructura-interna/proceso-comercial/diagrama', [IntranetController::class, 'diagrama'])->name('estructurainterna.proceso-diagrama');
//Ruta Operciones
Route::get('/estructura-interna/operaciones', [IntranetController::class, 'operacion'])->name('estructurainterna.operaciones');
//Ruta ImagenCorporativa
Route::get('/estructura-interna/imagen-corporativa', [IntranetController::class, 'imgcorporativa'])->name('estructurainterna.imagen-corporativa');
//Ruta Ingenieria
Route::get('/estructura-interna/ingenieria', [IntranetController::class, 'ingenieria'])->name('estructurainterna.ingenieria');
//Ruta ProcesoIngenieria
Route::get('/estructura-interna/proceso-ingenieria', [IntranetController::class, 'proinge'])->name('estructurainterna.proceso-ingenieria');
//Ruta ProcesoIngenieria
Route::get('/estructura-interna/proceso-ingenieria/ingenieria-diagrama', [IntranetController::class, 'ingediagrama'])->name('estructurainterna.proceso-ingenieria.ingenieria-diagrama');
//Ruta ProcesoIngenieriaSoporte
Route::get('/estructura-interna/proceso-ingenieria/soporte-cliente', [IntranetController::class, 'soporte'])->name('estructurainterna.proceso-ingenieria.soporte-cliente');
//Ruta ProcesoIngenieriaSoporte
Route::get('/estructura-interna/proceso-ingenieria/soporte-cliente/diagrama', [IntranetController::class, 'soportediagrama'])->name('estructurainterna.proceso-ingenieria.soporte-diagrama');

//Ruta PoC
Route::get('/estructura-interna/proceso-ingenieria/solicitud-poc', [IntranetController::class, 'poc'])->name('estructurainterna.proceso-ingenieria.solicitud-poc');
//Ruta MantoPreventivo
Route::get('/estructura-interna/proceso-ingenieria/mantto-preventivo', [IntranetController::class, 'preventivo'])->name('estructurainterna.proceso-ingenieria.mantto-preventivo');
//Ruta MantoCorrectivo
Route::get('/estructura-interna/proceso-ingenieria/mantto-correctivo', [IntranetController::class, 'correctivo'])->name('estructurainterna.proceso-ingenieria.mantto-correctivo');

//Ruta GuiasOnSite
Route::get('/ingenieria/guias-on-site', [IngenieriaController::class, 'onsite'])->name('ingenieria.guias-on-site');
//Ruta guias
Route::get('/ingenieria/guias/instalacion-switch', [IngenieriaController::class, 'switch'])->name('ingenieria.instalacion-switch');
// Ruta para descargar PDF del post
Route::get('/ingenieria/guias/instalacion-switch/pdf', [IngenieriaController::class, 'downloadPDF'])->name('ingenieria.instalacion-switch-pdf');

Route::get('/ingenieria/guias/instalacion-firewall', [IngenieriaController::class, 'firewall'])->name('ingenieria.instalacion-firewall');
Route::get('/ingenieria/guias/implementacion-aps', [IngenieriaController::class, 'wireless'])->name('ingenieria.instalacion-aps');

Route::get('/ingenieria/guias/instalacion-poc', [IngenieriaController::class, 'poc'])->name('ingenieria.instalacion-poc');
Route::get('/ingenieria/guias/mantto-preventivo', [IngenieriaController::class, 'preventivo'])->name('ingenieria.guia-preventivo');
Route::get('/ingenieria/guias/mantto-correctivo', [IngenieriaController::class, 'correctivo'])->name('ingenieria.guia-correctivo');
Route::get('/ingenieria/guias/site-survey', [IngenieriaController::class, 'survey'])->name('ingenieria.site-survey');
Route::get('/ingenieria/guias/site-survey/si-wifi', [IngenieriaController::class, 'surveysi'])->name('ingenieria.sitesurvey-si');
Route::get('/ingenieria/guias/site-survey/no-wifi', [IngenieriaController::class, 'surveyno'])->name('ingenieria.sitesurvey-no');

//Ruta Soporte
Route::get('/ingenieria/portal-soporte', [IntranetController::class, 'portsoporte'])->name('ingenieria.portal-soporte');
//Ruta guiaTicket
Route::get('/ingenieria/guia-tickets', [IntranetController::class, 'tickets'])->name('ingenieria.guia-tickets');
//Ruta directorio
Route::get('/directorio-empresarial', [IntranetController::class, 'directorio'])->name('estructurainterna.directorio-empresarial');

// Rutas para posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Ruta para descargar PDF del post
Route::get('/posts/{post}/pdf', [PostController::class, 'downloadPDF'])->name('posts.pdf');
// Ruta Vista Previa de un post
Route::get('/posts/{post}/pdf/preview', [PostController::class, 'previewPDF'])->name('posts.pdf.preview');

//Rutas para los documentos
Route::get('/documentos', [FileDocumentController::class, 'biblioteca'])->name('documentos.biblioteca');
Route::get('/documentos/{document}', [FileDocumentController::class, 'verdetalle'])->name('documentos.ver-detalle');
Route::get('/documentos/{document}/descargar', [FileDocumentController::class, 'download'])->name('documentos.download');
Route::post('/documentos/{document}/view', [FileDocumentController::class, 'incrementView'])->name('documentos.view');
Route::get('/biblioteca/documentos/{document}/content', [FileDocumentController::class, 'getContent'])->name('documentos.content');

Route::get('/intranet/documentos', [FileDocumentController::class, 'index'])->name('documentos.index');
Route::get('/intranet/biblioteca-recursos/{document}', [FileDocumentController::class, 'show'])->name('documentos.show');
//Route::get('/intranet/documentos/{document}', [FileDocumentController::class, 'verdocs'])->name('documentos.ver-detalle');
//Route::get('/intranet/documentos/{document}/descargar', [FileDocumentController::class, 'download'])->name('documentos.download');
//Route::post('/intranet/documentos/{document}/view', [FileDocumentController::class, 'incrementView'])->name('documentos.view');
//Route::get('/intranet/documentos/{document}/content', [FileDocumentController::class, 'getContent'])->name('documentos.content');

//Ruta para ClientePolizas
Route::get('/intranet/ingenieria/clientes', [ClientController::class,'index'])->name('ingenieria.clientes-polizas');

//Route::post('/documents/{document}/view', [FileDocumentController::class, 'incrementView'])->name('intranet.documents.view');
//Route::get('/documents/{document}/content', [FileDocumentController::class, 'getContent'])->name('intranet.documents.content');

# Rutas VIDEOS
Route::get('/formacion-academica/videos', [VideoController::class,'index'])->name('formacion-academica.index');



//revisar el como se muestran los elementos, se ve bien
Route::get('/estructura-interna', function () {
    return view('estructura-interna');
});

/* Route::get('/proceso-comercial-it', function () {
    return view('proceso-comercial-it');
}); */

//para los videos -revisar este se va usar para los videos
Route::get('/formacion-academica', function () {
    return view('formacion-academica');
});

// Ruta para mostrar el frontend
Route::get('/videos', function () {
    return view('videos.oldindex');
});





//Rutas para las Guias las que se arman automaticamente
//Route::get('/intranet/guias', [GuideController::class, 'index'])->name('intranet.guias.index');
//Route::get('/intranet/guias/search', [GuideController::class, 'search'])->name('intranet.guias.search');
//Route::get('/intranet/guias/{slug}', [GuideController::class, 'show'])->name('intranet.guias.show');
//Route::get('/intranet/guias/{slug}/download', [GuideController::class, 'download'])->name('intranet.guias.download');

// Rutas para categorías
Route::get('/categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categoria/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Búsqueda
Route::get('/buscar', [SearchController::class, 'index'])->name('search.index');
//Route::get('/categorias/{category}', [CategoryController::class, 'show'])->name('categories.show');
//Route::get('/etiquetas/{tag}', [TagController::class, 'show'])->name('tags.show');

// Si no tienes controladores para categorías y tags
Route::get('/categorias/{category}', function($category) {
    // Redirigir a posts filtrados por categoría
    return redirect()->route('posts.index', ['category' => $category]);
})->name('categories.show');

Route::get('/etiquetas/{tag}', function($tag) {
    // Redirigir a posts filtrados por tag
    return redirect()->route('posts.index', ['tag' => $tag]);
})->name('tags.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Rutas para la Intranet-Formacion Academica
//', [IntranetController::class, 'formacion'])->name('intranet.formacion-academica');

//Rutas para Formacion Academica-Submnenus
//Route::get('/intranet/formacion-academica/historia_ia', [IntranetController::class, 'historia'])->name('intranet.formacion-academica.historia_ia');


