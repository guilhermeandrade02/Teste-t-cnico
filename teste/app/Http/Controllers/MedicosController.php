<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cidades;
use App\Models\Medicos;
use App\Models\Consultas;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class MedicosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->only('store');
    }

    public function index()
    {
        try {
            $medicos = Medicos::select('id', 'nome', 'especialidade', 'cidade_id')->orderBy('nome', 'asc')->get();
            return response()->json($medicos, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar os médicos', 'message' => $e->getMessage()], 500);
        }
    }


    public function mostrarPorNome($nome)
    {
        try {
            $medico = Medicos::where('nome', 'LIKE', "%{$nome}%")->select('id', 'nome', 'especialidade', 'cidade_id')->orderBy('nome', 'asc')->get();  
            return response()->json($medico, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar o médico', 'message' => $e->getMessage()], 500);
        }
    }


    public function mostrarPorCidade($id_cidade)
    {
        try {
            $medicos = Medicos::where('cidade_id', $id_cidade)->select('id', 'nome', 'especialidade', 'cidade_id')->orderBy('nome', 'asc')->get();  
            return response()->json($medicos, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao pesquisar',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function mostrarPorNomeCidade($nome){

        $cidade = Cidades::where('nome', 'LIKE', "%{$nome}%")->first();
        if (!$cidade) {
            return response()->json(['message' => 'Cidade não encontrada'], 404);
        }

        $medicos = Medicos::where('cidade_id', $cidade->id)->select('id', 'nome', 'especialidade', 'cidade_id')->orderBy('nome', 'asc')->get();  
        if ($medicos->isEmpty()) {
            return response()->json(['message' => 'Nenhum médico encontrado para esta cidade'], 404);
        }

        return response()->json($medicos);
    }


    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'especialidade' => 'required|string|max:255',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de dados'
            ], 422);
        }

        try {
            $medico = Medicos::create([
                'nome' => $request->nome,
                'especialidade' => $request->especialidade,
                'cidade_id' => $request->cidade_id,
            ]);

            return response()->json($medico, 201); 
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar médico',
                'error' => $e->getMessage()
            ], 500); 
        }
    }
    

   


    public function storeConsulta(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'medico_id' => 'required|integer',
            'paciente_id' => 'required|integer',
            'data' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de dados'
            ], 422);
        }

        try {
            $consulta = Consultas::create([
                'medico_id' => $request->medico_id,
                'paciente_id' => $request->paciente_id,
                'data' => $request->data,
            ]);

            return response()->json($consulta, 201); 
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao criar a consulta',
                'error' => $e->getMessage()
            ], 500); 
        }
    }

}
