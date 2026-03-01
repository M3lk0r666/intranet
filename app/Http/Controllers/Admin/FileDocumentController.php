<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileDocumentController extends Controller
{
    // Listar documentos
    /* public function index(Request $request)
    {
        $query = FileDocument::query();
        
        // Filtros
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('type')) {
            $query->where('extension', $request->type);
        }
        
        $documents = $query->latest();
        
        
        return view('admin.documents.index', compact('documents'));
    } */
    /* public function index()
    {
        $documents = FileDocument::latest()->paginate(10);
        $categories = FileDocument::getCategories();
        return view ('admin.documents.index', compact('documents'));
    } */
     // Listar documentos
     public function index(Request $request)
     {
         $query = FileDocument::query();
         
         // Filtros
         if ($request->has('search')) {
             $query->where('title', 'like', '%' . $request->search . '%')
                   ->orWhere('description', 'like', '%' . $request->search . '%');
         }
         
         if ($request->has('category') && $request->category !== 'all') {
             $query->byCategory($request->category);
         }
         
         if ($request->has('type')) {
             $query->where('extension', $request->type);
         }
         
         // Ordenamiento
         $orderBy = $request->get('order_by', 'created_at');
         $orderDir = $request->get('order_dir', 'desc');
         
         if (in_array($orderBy, ['title', 'downloads', 'size', 'created_at', 'category'])) {
             $query->orderBy($orderBy, $orderDir);
         } else {
             $query->latest();
         }
         
         $documents = $query->paginate(10)->withQueryString();
         $categories = FileDocument::getCategories();
         
         return view('admin.documents.index', compact('documents', 'categories'));
     }
    

    // Mostrar formulario de subida
    public function create()
    {
        $categories = FileDocument::getCategories();
        return view('admin.documents.create', compact('categories'));
    }

    // Almacenar documento
    public function store(Request $request)
    {
        $categories = FileDocument::getCategories();
        $categoryKeys = array_keys($categories);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'document' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar',
                'max:10240', // 10MB
            ],
            'category' => 'required|in:' . implode(',', $categoryKeys),
            'description' => 'nullable|string|max:500'
        ]);

        $file = $request->file('document');
        $originalName = $file->getClientOriginalName();
        $extension = strtolower($file->getClientOriginalExtension());
        $fileName = Str::uuid() . '.' . $extension;
        $filePath = 'documents/' . date('Y/m');
        
        // Guardar archivo
        $path = $file->storeAs($filePath, $fileName, 'public');
        
        // Crear registro en BD
        $document = FileDocument::create([
            'title' => $request->title,
            'original_name' => $originalName,
            'file_name' => $fileName,
            'file_path' => $path,
            'extension' => $extension,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize() / 1024, // Convertir a KB
            'user_id' => auth()->id(),
            'category' => $request->category,
            'description' => $request->description
        ]);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Documento subido exitosamente.');
    

    }

    // Método para editar
    public function edit(FileDocument $document)
    {
        $categories = FileDocument::getCategories();
        return view('admin.documents.edit', compact('document', 'categories'));
    }

    // Método para actualizar
    public function update(Request $request, FileDocument $document)
    {
        $categories = FileDocument::getCategories();
        $categoryKeys = array_keys($categories);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:' . implode(',', $categoryKeys),
            'description' => 'nullable|string|max:500'
        ]);

        $document->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description
        ]);

        return redirect()->route('admin.documents.index')
            ->with('success', 'Documento actualizado exitosamente.');
    }

    // Descargar documento
    public function download(FileDocument $document)
    {
        // Incrementar contador de descargas
        $document->increment('downloads');
        
        return Storage::disk('public')->download($document->file_path, $document->original_name);
    }

    // Visualizar documento (PDF)
    public function show(FileDocument $document)
    {
        if ($document->extension !== 'pdf') {
            return redirect()->route('admin.documents.download', $document);
        }
        
        $filePath = Storage::disk('public')->path($document->file_path);
        
        return response()->file($filePath);
    }

    // Eliminar documento
    public function destroy(FileDocument $document)
    {
        // Eliminar archivo físico
        Storage::disk('public')->delete($document->file_path);
        
        // Eliminar registro
        $document->delete();
        
        return redirect()->route('admin.documents.index')
            ->with('success', 'Documento eliminado exitosamente.');
    }
}
