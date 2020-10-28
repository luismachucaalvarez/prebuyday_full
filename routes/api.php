<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\AuthController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('categorias', [CategoriaController::class, 'index'] );
//Route::get('categorias', 'CategoriaController@index');
Route::post('nuevocontacto', [ContactoController::class, 'store']);
Route::post('enviarcorreo', [CorreoController::class, 'enviarCorreoContacto']);
Route::get('contactos', [ContactoController::class, 'index']);
Route::get('contactos/{id}', [ContactoController::class, 'show']);
Route::delete('contactos/{id}', [ContactoController::class, 'borrarContacto']);
Route::get('usuarios', [AuthController::class, 'listarUsuarios']);
Route::post('auth/login', [AuthController::class, 'login']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::get('dashboard', function (){
        return response()->json(['data' => 'testdata']);
    });
    //Route::post('logout', 'AuthController@logout');
    //Route::post('refresh', 'AuthController@refresh');
    //Route::get('user-profile', 'AuthController@userProfile');
});
