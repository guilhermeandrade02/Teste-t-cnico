<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cidades;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Consultas;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function pacienteMedico($id_medico, Request $request)
    {
        
        $apenasAgendadas = $request->query('apenas-agendadas', false); 
    
         $pacientes = Pacientes::with(['consultas' => function ($query) use ($id_medico, $apenasAgendadas) {
            $query->where('medico_id', $id_medico);
            
            if ($apenasAgendadas) {
                $query->whereNull('data_realizada'); 
            }
        }])
        ->whereHas('consultas', function ($query) use ($id_medico, $apenasAgendadas) {
            $query->where('medico_id', $id_medico);
            
            if ($apenasAgendadas) {
                $query->whereNull('data_realizada'); 
            }
        })
        ->get()
        ->sortBy(function ($paciente) {
            return $paciente->consultas->min('data');
        });
    
        if ($pacientes->isEmpty()) {
            return response()->json(['message' => 'Nenhum paciente encontrado para esse médico.'], 404);
        }
    
        return response()->json($pacientes->values()->all(), 200);
    }



    public function consultaPaciente($nome){
        try {
            $cidade = Cidades::where('nome', 'LIKE', "%{$nome}%")->first();
            if (!$cidade) {
                return response()->json(['message' => 'Cidade não encontrada'], 404);
            }

            $medicos = Medicos::where('cidade_id', $cidade->id)->get();

            if ($medicos->isEmpty()) {
                return response()->json(['message' => 'Nenhum médico encontrado para essa cidade.'], 404);
            }
        
            $pacientesComConsultas = [];
        
            foreach ($medicos as $medico) {
                $pacientes = Pacientes::with(['consultas' => function ($query) use ($medico) {
                    $query->where('medico_id', $medico->id); 
                }])
                ->whereHas('consultas', function ($query) use ($medico) {
                    $query->where('medico_id', $medico->id);
                })
                ->get()
                ->sortBy(function ($paciente) {
                    return $paciente->consultas->min('data');
                });
        
            foreach ($pacientes as $paciente) {
                    $pacientesComConsultas[] = [
                        'medico' => $medico->nome, 
                        'paciente' => $paciente->nome,
                        'consultas' => $paciente->consultas, 
                    ];
                }
            }
        
            if (empty($pacientesComConsultas)) {
                return response()->json(['message' => 'Nenhum paciente encontrado para os médicos dessa cidade.'], 404);
            }
        
            return response()->json($pacientesComConsultas, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao buscar consultas: ' . $e->getMessage()], 500);
        }
            
    }


    public function update($id_paciente, Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nome' => 'required|string|max:255',
                'celular' => 'required|string|max:20',
            ]);  

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Erro de dados'
                ], 422);
            }

            $paciente = Pacientes::find($id_paciente);    

            if (!$paciente) {
                return response()->json(['message' => 'Paciente não encontrado.'], 404);
            }    

            $paciente->update($validator->validated()); 

            return response()->json([$paciente], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o paciente: ' . $e->getMessage()], 500);
        }
    }



    public function store(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20',
            'celular' =>  'required|string|max:20', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de dados'
            ], 422);
        }

        try{
            $paciente = Pacientes::create([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'celular' => $request->celular,
            ]);

            return response()->json($paciente, 201); 
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao adicionar paciente',
                'error' => $e->getMessage()
            ], 500); 
        }
    }
    
    
}
