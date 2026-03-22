<?php

namespace App\Http\Controllers;

use App\Models\FileDocument;
use Illuminate\Http\Request;

class FileDocumentController extends Controller
{
    // Vista principal de documentos públicos
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category', 'all');
        $search = $request->input('search', '');
        
        // Obtener categorías con contadores
        $categories = FileDocument::getCategories();
        $categoriesWithCount = [];
        
        foreach ($categories as $key => $category) {
            $categoriesWithCount[$key] = [
                'name' => $category['name'],
                'color' => $category['color'],
                'icon' => $category['icon'],
                'description' => $category['description'],
                'count' => FileDocument::where('category', $key)->count(),
            ];
        }
        
        // Consulta de documentos
        $query = FileDocument::query();
        
        if ($selectedCategory !== 'all') {
            $query->where('category', $selectedCategory);
        }
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        $documents = $query->orderBy('created_at', 'desc')->paginate(12);
        
        // Documentos más descargados (para sidebar)
        $topDownloads = FileDocument::orderBy('downloads', 'desc')->take(5)->get();
        
        // Documentos recientes
        $recentDocuments = FileDocument::latest()->take(5)->get();
        
        return view('documents.index', compact(
            'documents',
            'categoriesWithCount',
            'selectedCategory',
            'search',
            'topDownloads',
            'recentDocuments'
        ));
    }
    
    // Vista individual de documento
    public function show(FileDocument $document)
    {
        /* // Incrementar vistas (puedes crear un campo 'views' si quieres)
        $document->increment('downloads'); // O crear campo 'views'
        
        // Documentos relacionados (misma categoría)
        $relatedDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        return view('documents.show', compact('document', 'relatedDocuments')); */

        //$document->load('user', 'category_info');
        $relatedDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->limit(5)
            ->get();
        $sameCategoryDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->limit(8)
            ->get();

        return view('documents.show', compact('document', 'relatedDocuments', 'sameCategoryDocuments'));
    }
    
    // Descargar documento
    public function download(FileDocument $document)
    {
        /* // Incrementar contador de descargas
        $document->increment('downloads');
        
        // Registrar descarga en la sesión (para evitar spam)
        $downloaded = session()->get('downloaded_documents', []);
        if (!in_array($document->id, $downloaded)) {
            $downloaded[] = $document->id;
            session()->put('downloaded_documents', $downloaded);
        }
        
        return response()->download(
            storage_path('app/public/' . $document->file_path),
            $document->original_name
        ); */

        // Incrementar contador de descargas
        $document->increment('downloads');
        
        // Obtener la ruta del archivo
        $path = storage_path('app/public/' . $document->file_path);
        
        // Verificar que el archivo exista
        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado');
        }
        
        // Descargar el archivo
        return response()->download($path, $document->original_filename);
    }

    public function incrementView(FileDocument $document)
    {
        // Solo incrementar si el usuario no es un bot y no ha visto recientemente
        $document->increment('views');
        return response()->json(['success' => true]);
    }

    public function getContent($id)
    {
        // Solo para archivos de texto
        /* if (!in_array($document->extension, ['txt', 'md', 'html', 'css', 'js'])) {
            abort(400, 'Formato no soportado para vista previa');
        }
        
        $path = storage_path('app/public/' . $document->file_path);
        
        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado');
        }
        
        return response()->file($path, [
            'Content-Type' => 'text/plain; charset=utf-8'
        ]); */

        /* if (!in_array(strtolower($document->extension), ['txt', 'md', 'html', 'css', 'js'])) {
            abort(400, 'Formato no soportado para vista previa');
        }
    
        $path = storage_path('app/public/' . $document->file_path);
    
        if (!file_exists($path)) {
            abort(404, 'Archivo no encontrado');
        }
    
        return response()->make(file_get_contents($path), 200, [
            'Content-Type' => 'text/plain; charset=utf-8'
        ]); */

        return $id;
    }

    public function biblioteca(Request $request)
    {

        $selectedCategory = $request->input('category', 'all');
        $search = $request->input('search', '');
        
        // Obtener categorías con contadores
        $categories = FileDocument::getCategories();
        $categoriesWithCount = [];
        
        foreach ($categories as $key => $category) {
            $categoriesWithCount[$key] = [
                'name' => $category['name'],
                'color' => $category['color'],
                'icon' => $category['icon'],
                'description' => $category['description'],
                'count' => FileDocument::where('category', $key)->count(),
            ];
        }
        
        // Consulta de documentos
        $query = FileDocument::query();
        
        if ($selectedCategory !== 'all') {
            $query->where('category', $selectedCategory);
        }
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        $documents = $query->orderBy('created_at', 'desc')->paginate(12);
        
        // Documentos más descargados (para sidebar)
        $topDownloads = FileDocument::orderBy('downloads', 'desc')->take(5)->get();
        
        // Documentos recientes
        $recentDocuments = FileDocument::latest()->take(5)->get();
        
        return view('documents.biblioteca', compact(
            'documents',
            'categoriesWithCount',
            'selectedCategory',
            'search',
            'topDownloads',
            'recentDocuments'
        ));
    }

    // Vista individual de documento
    public function verdocs(FileDocument $document)
    {
        /* // Incrementar vistas (puedes crear un campo 'views' si quieres)
        $document->increment('downloads'); // O crear campo 'views'
        
        // Documentos relacionados (misma categoría)
        $relatedDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        return view('documents.show', compact('document', 'relatedDocuments')); */

        //$document->load('user', 'category_info');
        $relatedDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->limit(5)
            ->get();
        $sameCategoryDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->limit(8)
            ->get();

        return view('documents.ver-detalle', compact('document', 'relatedDocuments', 'sameCategoryDocuments'));
    }

    // Vista individual de documento
    public function verdetalle(FileDocument $document)
    {
        /* // Incrementar vistas (puedes crear un campo 'views' si quieres)
        $document->increment('downloads'); // O crear campo 'views'
        
        // Documentos relacionados (misma categoría)
        $relatedDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        return view('documents.show', compact('document', 'relatedDocuments')); */

        //$document->load('user', 'category_info');
        $relatedDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->limit(5)
            ->get();
        $sameCategoryDocuments = FileDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->limit(8)
            ->get();

        return view('documents.ver-detalle', compact('document', 'relatedDocuments', 'sameCategoryDocuments'));
    }



}
