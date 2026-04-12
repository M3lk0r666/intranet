<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientDocument;
use Illuminate\Support\Facades\Storage;

class ClientDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'documents.*.file' => 'required|file|mimes:pdf,xls,xlsx,doc,docx,txt|max:2048',
        ]);

        $documents = $request->documents;
        $files = $request->file('documents');

        if ($files) {

            foreach ($files as $index => $fileData) {

                if (isset($fileData['file'])) {

                    $file = $fileData['file'];

                    $originalName = time().'_'.$file->getClientOriginalName();

                    $path = $file->storeAs(
                        'polizas/'.$request->client_id,
                        $originalName,
                        'public'
                    );

                    ClientDocument::create([
                        'client_id' => $request->client_id,
                        'type' => $documents[$index]['type'] ?? null,
                        'technology' => $documents[$index]['technology'] ?? null,
                        'year' => $documents[$index]['year'] ?? null,
                        'file' => $path
                    ]);
                }
            }
        }

        return back()->with('success','Documentos agregados correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientDocument $inventario)
    {
        // Cargar relación con cliente (opcional pero recomendado)
        $inventario->load('client');

        return view('admin.polizas.edit', compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    |--------------------------------------------------------------------------
    | UPDATE → editar documento
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, ClientDocument $inventario)
    {
        /* $request->validate([
            'type' => 'required',
            'file' => 'nullable|file|mimes:pdf,xls,xlsx,doc,docx,txt|max:2048'
        ]);

        if ($request->hasFile('file')) {

            if ($document->file && Storage::disk('public')->exists($document->file)) {
                Storage::disk('public')->delete($document->file);
            }

            $file = $request->file('file');

            $originalName = time().'_'.$file->getClientOriginalName();

            $path = $file->storeAs(
                'polizas/'.$document->client_id,
                $originalName,
                'public'
            );

            $document->file = $path;
        }

        $document->update([
            'type' => $request->type,
            'technology' => $request->technology,
            'year' => $request->year
        ]);

        return back()->with('success','Documento actualizado correctamente'); */

        $request->validate([
            'type' => 'required',
            'technology' => 'nullable|string|max:255',
            'year' => 'nullable|digits:4'
        ]);
    
        $inventario->update([
            'type' => $request->type,
            'technology' => $request->technology,
            'year' => $request->year
        ]);
    
        return redirect()->route('admin.clients.show', $inventario->client)->with('success','Documento actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    /*
    |--------------------------------------------------------------------------
    | DESTROY → eliminar documento
    |--------------------------------------------------------------------------
    */
    public function destroy(ClientDocument $inventario)
    {
        // eliminar archivo físico
        if ($inventario->file && Storage::disk('public')->exists($inventario->file)) {
            Storage::disk('public')->delete($inventario->file);
        }

        // eliminar registro
        $inventario->delete();

        return back()->with('success','Documento eliminado correctamente');
    }

}
