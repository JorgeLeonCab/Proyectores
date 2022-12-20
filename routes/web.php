<?php

use App\Http\Controllers\ProyectoresController;
use App\Http\Controllers\ProyectorHoraController;
use App\Http\Controllers\UserController;
use App\Models\Proyector_hora;
use Database\Seeders\ProyectorHoraSeeder;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Redirect::route('admin.proyectores.index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::resource("proyectores",ProyectoresController::class)
->middleware(['auth:sanctum','verified'])
->names('admin.proyectores');

Route::get("get-proyectores",[ProyectoresController::class,"getProyectores"])
->middleware(['auth:sanctum','verified'])
->name('admin.get-proyectores');

Route::resource("proyectores-hora", ProyectorHoraController::class)
->middleware(['auth:sanctum','verified'])
->names('admin.proyectores-hora');

Route::get("get-reservas/{proyector_id}",[ProyectorHoraController::class,"getReservas"])
->middleware(['auth:sanctum','verified'])
->name('admin.get-reservas');

Route::get("get-apartados",[ProyectorHoraController::class, "getApartados"])
->middleware(['auth:sanctum','verified'])
->name('admin.get-apartado');

Route::put("cambiar-estado/{apartado_id}/{estado}",[ProyectorHoraController::class, "cambiarEstado"])
->middleware(['auth:sanctum','verified'])
->name('admin.cambiar-estado');

// Route::get("set-admin",[UserController::class,"setAdmin"])
// ->middleware(['auth:sanctum','verified'])
// ->name('admin.set-admin');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Redirect::route('admin.proyectores.index');
    })->name('dashboard');
});
