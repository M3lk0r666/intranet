<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('documents')
            ->orderBy('name')
            ->get();

            $clientsFormatted = $clients->map(function ($c) {
                return [
                    'id' => $c->id,
                    'name' => $c->name,
                    'documents' => $c->documents->map(function ($d) {
                        return [
                            'id' => $d->id,
                            'type' => $d->type,
                            'file' => basename($d->file),
                            'url' => asset('storage/' . $d->file),
                            'year' => $d->year,
                        ];
                    }),
                ];
            });

        return view('intranet.ingenieria.clientes-polizas', compact('clients','clientsFormatted'));
    }
}
