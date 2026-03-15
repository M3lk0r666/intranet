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
        
        /* $clients = Client::with('documents')->get();
        $documents = ClientDocument::with('client')
        ->orderBy('client_id')
        ->orderBy('created_at','desc')
        ->get();

        return view('admin.polizas.index', compact('documents', 'clients')); */

        $clients = Client::with('documents')->orderBy('name')->get();

        return view('admin.polizas.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        return view('admin.polizas.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                    //$originalName = $file->getClientOriginalName();
                    $originalName = time().'_'.$file->getClientOriginalName();
                    
                    //$path = $file->store('clients', 'public');

                    $path = $file->storeAs('polizas/'.$client->id,$originalName,'public');
                    
                    ClientDocument::create([
                        'client_id' => $client->id,
                        'type' => $documents[$index]['type'] ?? null,
                        'technology' => $documents[$index]['technology'] ?? null,
                        'file' => $path
                    ]);
                }
            }
        }

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Client $client)
    {
        $document = ClientDocument::findOrFail($request->doc);

        return view('admin.polizas.show', compact('client','document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
