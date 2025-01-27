<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', [AuthController::class, 'user']); // Lista usuarios
Route::post('login', [AuthController::class, 'login']); // Rota para login


Route::get('/cidades', [CidadesController::class, 'index']); //Lista as cidades
Route::get('/cidade/{nome}', [CidadesController::class, 'mostrarPorNome']); //Busca a cidade pelo nome


Route::get('/medicos', [MedicosController::class, 'index']); //Lista os médicos
Route::get('/medicos/{nome}', [MedicosController::class, 'mostrarPorNome']); //Busca o médico pelo nome
Route::get('/cidades/{id_cidade}/medicos', [MedicosController::class, 'mostrarPorCidade']); //Busca os médicos pela ID da cidade
Route::get('/cidades/medicos/{nome}', [MedicosController::class, 'mostrarPorNomeCidade']);  //Busca os médicos pelo nome da cidade



Route::middleware('auth:api')->group(function () {
    Route::post('/medicos', [MedicosController::class, 'store']); // Cadastro de médico
    Route::post('/medicos/consulta', [MedicosController::class, 'storeConsulta']); // Adicionar consulta
    Route::get('/medicos/{id_medico}/pacientes', [PacientesController::class, 'pacienteMedico']); // Busca as consultas do médico pela ID
    Route::get('/medicos/consulta/{nome}', [PacientesController::class, 'consultaPaciente']); //Busca pacientes da cidade pelo nome da cidade
    Route::post('/pacientes/{id_paciente}', [PacientesController::class, 'update']); //Edita o cadastro do paciente
    Route::post('/pacientes', [PacientesController::class, 'store']); //Adiciona um paciente
});
