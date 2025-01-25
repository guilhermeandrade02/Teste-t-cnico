<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Cidades;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function index()
    {
        // Recupera todas as cidades
        $cidades = Cidades::all();
        
        // Retorna os dados como JSON
        return response()->json($cidades, 200);  // 200 é o status HTTP para "OK"
    }
}
