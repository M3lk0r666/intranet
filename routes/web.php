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
Route::get('/intranet', [IntranetController::class, 'index'])->name('intranet.index');

//Rutas para la Intranet-Procesos
Route::get('/intranet/procesos-empresariales', [IntranetController::class, 'estructura'])->name('intranet.procesos-empresariales');
//Ruta Organigrama
Route::get('/intranet/estructura-interna/organigrama', [IntranetController::class, 'organigrama'])->name('intranet.estructurainterna.organigrama');
//Ruta ProcesoComercial-IT
Route::get('/intranet/estructura-interna/proceso-comercial', [IntranetController::class, 'proceso'])->name('intranet.estructurainterna.proceso-comercial');
//Ruta ProcesoComercialFase1
Route::get('/intranet/estructura-interna/proceso-comercial/demanda-omnicanal', [IntranetController::class, 'demandaomni'])->name('intranet.estructurainterna.proceso-comercial.demanda-omnicanal');
//Ruta ProcesoComercialFase2
Route::get('/intranet/estructura-interna/proceso-comercial/asinacion-cuenta', [IntranetController::class, 'asignacuenta'])->name('intranet.estructurainterna.proceso-comercial.asignacion-cuenta');
//Ruta ProcesoComercialFase3
Route::get('/intranet/estructura-interna/proceso-comercial/analisis-requerimiento', [IntranetController::class, 'analisisreque'])->name('intranet.estructurainterna.proceso-comercial.analisis-requerimiento');
//Ruta ProcesoComercialFase4
Route::get('/intranet/estructura-interna/proceso-comercial/solucion-propuesta', [IntranetController::class, 'solucion'])->name('intranet.estructurainterna.proceso-comercial.solucion-propuesta');
//Ruta ProcesoComercialFase6
Route::get('/intranet/estructura-interna/proceso-comercial/negociacion-cierre', [IntranetController::class, 'cierre'])->name('intranet.estructurainterna.proceso-comercial.negociacion-cierre');

//Ruta ProcesoAdministracion
Route::get('/intranet/estructura-interna/administracion', [IntranetController::class, 'administracion'])->name('intranet.estructurainterna.admnistracion');
//Ruta AltaColaborador
Route::get('/intranet/estrcutura-interna/proceso-amdinistracion/alta-colaborador', [IntranetController::class, 'colaboralta'])->name('intranet.administracion.alta-colaborador');
//Ruta BajaColaborador
Route::get('/intranet/estrcutura-interna/proceso-amdinistracion/baja-colaborador', [IntranetController::class, 'colaborbaja'])->name('intranet.administracion.baja-colaborador');
//Ruta usoCamioneta
Route::get('/intranet/estrcutura-interna/proceso-amdinistracion/uso-camioneta', [IntranetController::class, 'camioneta'])->name('intranet.administracion.uso-camioneta');
//Ruta incidencias
Route::get('/intranet/estrcutura-interna/proceso-amdinistracion/incidencias', [IntranetController::class, 'incidencia'])->name('intranet.administracion.incidencias');
//Ruta horarios
Route::get('/intranet/estrcutura-interna/proceso-amdinistracion/horario-laboral', [IntranetController::class, 'horario'])->name('intranet.administracion.horario-laboral');
//Ruta facturacion
Route::get('/intranet/estrcutura-interna/proceso-amdinistracion/facturacion-inventario', [IntranetController::class, 'factura'])->name('intranet.administracion.facturacion-inventario');

//Ruta ProcesoComercial-IT-Diagrama
Route::get('/intranet/estructura-interna/proceso-comercial/diagrama', [IntranetController::class, 'diagrama'])->name('intranet.estructurainterna.proceso-diagrama');
//Ruta Operciones
Route::get('/intranet/estructura-interna/operaciones', [IntranetController::class, 'operacion'])->name('intranet.estructurainterna.operaciones');
//Ruta ImagenCorporativa
Route::get('/intranet/estructura-interna/imagen-corporativa', [IntranetController::class, 'imgcorporativa'])->name('intranet.estructurainterna.imagen-corporativa');
//Ruta Ingenieria
Route::get('/intranet/estructura-interna/ingenieria', [IntranetController::class, 'ingenieria'])->name('intranet.estructurainterna.ingenieria');
//Ruta ProcesoIngenieria
Route::get('/intranet/estructura-interna/proceso-ingenieria', [IntranetController::class, 'proinge'])->name('intranet.estructurainterna.proceso-ingenieria');
//Ruta ProcesoIngenieria
Route::get('/intranet/estructura-interna/proceso-ingenieria/ingenieria-diagrama', [IntranetController::class, 'ingediagrama'])->name('intranet.estructurainterna.proceso-ingenieria.ingenieria-diagrama');
//Ruta ProcesoIngenieriaSoporte
Route::get('/intranet/estructura-interna/proceso-ingenieria/soporte-cliente', [IntranetController::class, 'soporte'])->name('intranet.estructurainterna.proceso-ingenieria.soporte-cliente');
//Ruta ProcesoIngenieriaSoporte
Route::get('/intranet/estructura-interna/proceso-ingenieria/soporte-cliente/diagrama', [IntranetController::class, 'soportediagrama'])->name('intranet.estructurainterna.proceso-ingenieria.soporte-diagrama');

//Ruta PoC
Route::get('/intranet/estructura-interna/proceso-ingenieria/solicitud-poc', [IntranetController::class, 'poc'])->name('intranet.estructurainterna.proceso-ingenieria.solicitud-poc');
//Ruta MantoPreventivo
Route::get('/intranet/estructura-interna/proceso-ingenieria/mantto-preventivo', [IntranetController::class, 'preventivo'])->name('intranet.estructurainterna.proceso-ingenieria.mantto-preventivo');
//Ruta MantoCorrectivo
Route::get('/intranet/estructura-interna/proceso-ingenieria/mantto-correctivo', [IntranetController::class, 'correctivo'])->name('intranet.estructurainterna.proceso-ingenieria.mantto-correctivo');

//Ruta GuiasOnSite
Route::get('/intranet/ingenieria/guias/instalacion-switches', [IngenieriaController::class, 'switches'])->name('intranet.ingenieria.instalacion-switches');

//Ruta Soporte
Route::get('/intranet/ingenieria/portal-soporte', [IntranetController::class, 'portsoporte'])->name('intranet.ingenieria.portal-soporte');
//Ruta guiaTicket
Route::get('/intranet/ingenieria/guia-tickets', [IntranetController::class, 'tickets'])->name('intranet.ingenieria.guia-tickets');
//Ruta directorio
Route::get('/intranet/directorio-empresarial', [IntranetController::class, 'directorio'])->name('intranet.estructurainterna.directorio-empresarial');

// Rutas para posts
Route::get('intranet/posts', [PostController::class, 'index'])->name('intranet.posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Ruta para descargar PDF del post
Route::get('/posts/{post}/pdf', [PostController::class, 'downloadPDF'])->name('posts.pdf');
// Ruta Vista Previa de un post
Route::get('/posts/{post}/pdf/preview', [PostController::class, 'previewPDF'])->name('posts.pdf.preview');

//Rutas para los documentos
Route::get('/intranet/biblioteca-recursos', [FileDocumentController::class, 'biblioteca'])->name('intranet.biblioteca-recursos.departamentos');
Route::get('/intranet/documentos', [FileDocumentController::class, 'index'])->name('intranet.documentos.index');
Route::get('/intranet/biblioteca-recursos/{document}', [FileDocumentController::class, 'show'])->name('intranet.documentos.show');
Route::get('/intranet/documentos/{document}', [FileDocumentController::class, 'verdocs'])->name('intranet.biblioteca-recursos.ver-detalle');
Route::get('/intranet/documentos/{document}/descargar', [FileDocumentController::class, 'download'])->name('intranet.documentos.download');
Route::post('/intranet/documentos/{document}/view', [FileDocumentController::class, 'incrementView'])->name('intranet.documentos.view');
Route::get('/intranet/documentos/{document}/content', [FileDocumentController::class, 'getContent'])->name('intranet.documentos.content');

//Route::post('/documents/{document}/view', [FileDocumentController::class, 'incrementView'])->name('intranet.documents.view');
//Route::get('/documents/{document}/content', [FileDocumentController::class, 'getContent'])->name('intranet.documents.content');


//revisar el como se muestran los elementos, se ve bien
Route::get('/estructura-interna', function () {
    return view('estructura-interna');
});

/* Route::get('/proceso-comercial-it', function () {
    return view('proceso-comercial-it');
}); */

//para los videos -revisar
Route::get('/formacion-academica', function () {
    return view('formacion-academica');
});

// Ruta para mostrar el frontend
Route::get('/videos', function () {
    return view('videos.oldindex');
});



# Rutas VIDEOS




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


