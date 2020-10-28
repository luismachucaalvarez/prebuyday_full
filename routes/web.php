<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


/*Route::get('{any}', function (){
    return view('app');
})->where('any', '.*');*/

//Route::post('nuevocontacto', [ContactoController::class, 'enviarCorreo']);

Route::get('api/categorias', [CategoriaController::class, 'index'] );
Route::get('api/cargos', [\App\Http\Controllers\CargoController::class, 'index']);
Route::get('api/contactos', [ContactoController::class, 'index']);
Route::get('api/contactos/{id}', [ContactoController::class, 'show']);
Route::post('api/auth/login', [AuthController::class], 'login');
Route::get('api/usuarios', [AuthController::class, 'listarUsuarios']);
//Route::get('/api/nuevocontacto', [\App\Http\Controllers\CorreoController::class, 'enviarCorreoContacto'])->name('contacto');

Route::view('/{any}', 'app')->where('any', '.*');
//Route::get('admin')



