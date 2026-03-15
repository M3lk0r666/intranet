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

        return view('intranet.ingenieria.clientes-polizas', compact('clients'));
    }
}
