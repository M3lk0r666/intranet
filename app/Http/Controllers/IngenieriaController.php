<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngenieriaController extends Controller
{
    public function switches()
    {
    
        return view('intranet.ingenieria.instalacion-switches');
    }
}
