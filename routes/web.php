<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    });

    //Gestion de profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('user.profil');
    Route::get('/edit-profil/{id}', [ProfilController::class, 'edit'])->name('edit.profil');
    Route::get('/changer-mon-mot-de-passe-edunov', [ProfilController::class, 'editpassword'])->name('edit.password');
    Route::post('/changer-mon-mot-de-passe-edunov', [ProfilController::class, 'changedpassword'])->name('post.password');

    //Création de compte utilisateur
    Route::get('/compte-utilisateur', [UserController::class, 'index'])->name('liste.user');
    Route::get('/creer-un-utilisateur', [UserController::class, 'store'])->name('creation.user');
     
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
