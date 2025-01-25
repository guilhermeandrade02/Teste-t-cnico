<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\MedicosController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']); // Rota para login


//Rotas Cidadas
Route::get('/cidades', [CidadesController::class, 'index']);
Route::get('/cidade/{nome}', [CidadesController::class, 'mostrarPorNome']);

//Rotas Médicos
Route::get('/medicos', [MedicosController::class, 'index']);
Route::get('/medicos/{nome}', [MedicosController::class, 'mostrarPorNome']);
Route::get('/cidades/{id_cidade}/medicos', [MedicosController::class, 'mostrarPorCidade']);
Route::get('/cidades/medicos/{nome}', [MedicosController::class, 'mostrarPorNomeCidade']);
Route::post('/medicos', [MedicosController::class, 'store']);
Route::middleware('auth:api')->post('/medicos/consulta', [MedicosController::class, 'storeConsulta']);

