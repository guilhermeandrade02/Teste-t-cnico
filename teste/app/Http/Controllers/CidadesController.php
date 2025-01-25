<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Cidades;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function index()
    {
        try {
            $cidades = Cidades::select('id', 'nome', 'estado')->orderBy('nome', 'asc')->get();
            return response()->json($cidades, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar as cidades', 'message' => $e->getMessage()], 500);
        }
    }


    public function mostrarPorNome($nome){
        try {
            $cidades = Cidades::where('nome', 'LIKE', "%{$nome}%")->select('id', 'nome', 'estado')->orderBy('nome', 'asc')->get();             
            return response()->json($cidades);
        } catch (Exception $e) {  
            return response()->json([
                'error' => 'Ocorreu um erro ao tentar listar as cidades.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
