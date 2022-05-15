<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\kategoriak;
use Illuminate\Http\Request;

class KategoriaController extends Controller
{
    public function index()
    {
        return response()->json(kategoriak::all());
    }
}


