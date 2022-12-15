<?php

use App\Http\Controllers\ProyectoresController;
use App\Http\Controllers\ProyectorHoraController;
use App\Models\Proyector_hora;
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
    return Inertia::render('Welcome', [
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

Route::get("get-reservas/{proyector_id}",[ProyectorHoraController::class,"getReservas"])
->middleware(['auth:sanctum','verified'])
->name('admin.get-reservas');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Redirect::route('admin.proyectores.index');
    })->name('dashboard');
});
