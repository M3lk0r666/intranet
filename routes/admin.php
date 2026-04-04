<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FileDocumentController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\GuideExportController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StepController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ImageController;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);
//Para Imagen el contenido del Post
Route::post('/upload-image', [ImageController::class, 'upload']);

Route::resource('tags', TagController::class);

// Rutas Videos
Route::resource('videos', VideoController::class);

// Rutas Contenido
Route::resource('contents', ContentController::class);
Route::patch('contents/{content}/toggle', [ContentController::class, 'toggle'])->name('contents.toggle');


//Rutas Documentos
Route::resource('documents', FileDocumentController::class);
Route::get('documents/{document}/download', [FileDocumentController::class, 'download'])->name('documents.download');

//Rutas Guias
Route::resource('guides', GuideController::class);
Route::post('guides/{guide}/import', [GuideController::class, 'importFromFile'])->name('guides.import');

Route::get('guides/{guide}/import', [GuideController::class, 'importForm'])->name('guides.import.form');
Route::post('guides/{guide}/import', [GuideController::class, 'importProcess'])->name('guides.import.process');
//Route::delete('guide-files/{file}', [AdminGuideController::class, 'deleteFile'])->name('guides.import.delete-file');
Route::delete('guide-files/{file}', [GuideController::class, 'deleteFile'])->name('guides.import.delete-file');

//Rutas PolizasClientes
Route::resource('clients', ClientController::class);

//Directorio
Route::resource('profiles', ProfileController::class);
Route::resource('departments', DepartmentController::class);

//Rutas de Gestion Roles
Route::resource('roles', RoleController::class);

// Importación

// Exportación
Route::get('guides/{guide}/export', [GuideExportController::class, 'export'])->name('guides.export');

// Secciones
Route::post('sections', [SectionController::class, 'store'])->name('sections.store');
Route::put('sections/{section}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');
Route::post('sections/reorder', [SectionController::class, 'reorder'])->name('sections.reorder');

// Pasos
Route::post('steps', [StepController::class, 'store'])->name('steps.store');
Route::put('steps/{step}', [StepController::class, 'update'])->name('steps.update');
Route::delete('steps/{step}', [StepController::class, 'destroy'])->name('steps.destroy');
Route::post('steps/update-order', [StepController::class, 'updateOrder'])->name('steps.update-order');

// Crear una ruta temporal para probar
Route::get('/test-processor', function () {
    $content = <<<TXT
# Actividades Previas
## Recopilación de Configuración
- Solicitar archivo de configuración
- Verificar documentación
- Confirmar requisitos

> show configuration
> show version detail
> show licence detail

Nota: Es importante tener toda la información

## Preparación
- Crear script
- Documentar mapeo
- Preparar diagramas
TXT;

    $processor = new \App\Services\GuideFileProcessor();
    $result = $processor->process($content, 'txt');
    
    dd($result); // Ver la estructura procesada
});