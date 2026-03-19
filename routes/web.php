<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('libros', LibroController::class);
// Usar las rutas con los nombres de los metodos del controlador (Protegido por inicio de sesion)
Route::middleware(['auth', 'second'])->group(function () {
});

//ruta para el catalogo de libros
Route::get('/home', [
    LibroController::class, 'home'
])->name('home');

# Ruta para obtener la vista de la actualizazion 
Route:: get('/libros/{id}/edit',[
    LibroController::class,'edit'
]) ->name('libros.edit');


//Ruta para actualizar el registro 

Route::put('/libros/{id}', [
    LibroController::class, 'update' 
])-> name('libros.update');

//Ruta para regresar la vista del registro
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//Ruta para guardar el registro de usuario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//Ruta para regresar la vista del inicio de sesión
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');
//Ruta para iniciar sesion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

// Ruta para cerrar sesion
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    //Ruta para el panel de administrador
    Route::get('/admin-dashboard', [
    AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});


