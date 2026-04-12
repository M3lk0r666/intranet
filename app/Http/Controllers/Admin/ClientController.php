<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientDocument;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        /* $documents = ClientDocument::with('client')
            ->orderBy('client_id')
            ->orderBy('year','desc')
            ->get();

        $clients = Client::with('documents')->get();

        return view('admin.polizas.index', [
            'documents' => $documents,
            'clients' => $clients,
            'total' => $documents->count(),
            'pdfs' => $documents->filter(fn($d) => str_ends_with($d->file,'.pdf'))->count(),
            'excels' => $documents->filter(fn($d) => str_ends_with($d->file,'.xlsx') || str_ends_with($d->file,'.xls'))->count(),
        ]); */

        return view('admin.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* $clients = Client::orderBy('name')->get();
        return view('admin.polizas.create', compact('clients')); */

        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        /* $request->validate([
            'documents.*.file' => 'required|file|mimes:pdf,xls,xlsx,doc,docx,txt|max:2048',
        ]);

        
        if($request->client_id){
            $client = Client::findOrFail($request->client_id);
        }else{
            $client = Client::create([
                'name' => $request->name
            ]);
        }

        $documents = $request->documents;
        $files = $request->file('documents');

        if ($files) {
            foreach ($files as $index => $fileData) {
                if (isset($fileData['file'])) {
                    $file = $fileData['file'];
                    $originalName = time().'_'.$file->getClientOriginalName();
                    $path = $file->storeAs('polizas/'.$client->id,$originalName,'public');
                    
                    ClientDocument::create([
                        'client_id' => $client->id,
                        'type' => $documents[$index]['type'] ?? null,
                        'technology' => $documents[$index]['technology'] ?? null,
                        'year' => $documents[$index]['year'] ?? null,
                        'file' => $path
                    ]);
                }
            }
        }

        return redirect()->route('admin.clients.index'); */

        $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);

        $client = Client::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.clients.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Client $client)
    {
        /* $document = ClientDocument::findOrFail($request->doc);

        return view('admin.polizas.show', compact('client','document')); */

        $client->load('documents');

        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        /* return view('admin.polizas.edit', compact('document')); */

        return view('admin.clients.edit', compact('client'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        /* $request->validate([
            'type' => 'required',
            'file' => 'nullable|file|mimes:pdf,xls,xlsx,doc,docx,txt|max:2048'
        ]);

        // Si sube nuevo archivo
        if ($request->hasFile('file')) {

            // eliminar archivo anterior
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

        // actualizar datos
        $document->update([
            'type' => $request->type,
            'technology' => $request->technology,
            'year' => $request->year
        ]);

        return redirect()->route('admin.polizas.index')
            ->with('success','Documento actualizado'); */

        
            $data = $request->validate([
                'name' => 'required|string|min:3|max:255',
            ]);
    
            $client->update($data);
    
            session()->flash('swal',[
                    'icon' => 'success',
                    'title' => '¡Buen hecho!',
                    'text' => '¡El Cliente se ha actualizado con Exito!',
            ]);
    
            return redirect()->route('admin.clients.edit', $client);




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        /* // eliminar archivo físico
        if ($document->file && Storage::disk('public')->exists($document->file)) {
            Storage::disk('public')->delete($document->file);
        }

        // eliminar registro
        $document->delete();

        return back()->with('success','Documento eliminado'); */

        $client->delete();
        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Buen hecho!',
            'text' => '¡El Cliente se ha eliminado con Exito!',
        ]);

        return redirect()->route('admin.clients.index');

    }
}
