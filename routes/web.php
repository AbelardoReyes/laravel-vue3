<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Categoria;
use App\Http\Controllers\Calzado;

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

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

Route::prefix('/zapateria/categoria')->group(function () {
    //Index
    Route::get('/index', [Categoria::class, 'index'])->name('categoria.index');
    //Rutas para crear
    Route::get('/formulario', [Categoria::class, 'formulario'])->name('categoria.formulario');
    Route::post('/crearCategoria', [Categoria::class, 'crearCategoria'])->name('categoria.crearCategoria');
    //Rutas para editar
    Route::get('/vistaEditar/{id}', [Categoria::class, 'vistaEditar'])->name('categoria.vistaEditar');
    Route::put('/editarCategoria/{id}', [Categoria::class, 'editarCategoria'])->name('categoria.editarCategoria');
    //Rutas para eliminar
    Route::get('/vistaEliminar/{id}', [Categoria::class, 'vistaEliminar'])->name('categoria.vistaEliminar');
    Route::delete('/eliminarCategoria/{id}', [Categoria::class, 'eliminarCategoria'])->name('categoria.eliminarCategoria');
    //Rutas agregar Calzado
    Route::get('/formularioCalzado/{id}', [Categoria::class, 'formularioCalzado'])->name('categoria.formularioCalzado');
    Route::post('/crearCalzado', [Categoria::class, 'crearCalzado'])->name('categoria.crearCalzado');
});
Route::prefix('/zapateria/calzado')->group(function () {
    //Index
    Route::get('/index', [Calzado::class, 'index'])->name('calzado.index');
    Route::post(('/crearNuevoCalzado'), [Calzado::class, 'crearNuevoCalzado'])->name('calzado.crearNuevoCalzado');
    //Rutas para editar

    //Rutas para eliminar
    Route::get('/vistaEliminar/{id}', [Calzado::class, 'vistaEliminar'])->name('calzado.vistaEliminar');
});



require __DIR__ . '/auth.php';
