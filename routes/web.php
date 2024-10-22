<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaisesController;

Route::get('/', function() {
    return view('admin_layout.index');
});




Route::group(['prefix' => 'login'], function(){
    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post("/login", [AuthController::class, 'autenticateUser'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'categoria'], function(){
        Route::get('/',[CategoriaController::class,'index'])->name('home');
        Route::get('/novo',[CategoriaController::class,'inserir']);    
        Route::post('/novo',[CategoriaController::class,'salvar_novo']);   
        Route::get('/excluir/{id}',[CategoriaController::class,'excluir']);
        Route::get('/update/{id}',[CategoriaController::class,'alterar']);
        Route::post('/update',[CategoriaController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('/',[UsuariosController::class,'index'])->name('home');
        Route::get('/novo',[UsuariosController::class,'inserir']);    
        Route::post('/novo',[UsuariosController::class,'salvar_novo']);   
        Route::get('/excluir/{id}',[UsuariosController::class,'excluir']);
        Route::get('/update/{id}',[UsuariosController::class,'alterar']);
        Route::post('/update',[UsuariosController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'paises'], function(){
        Route::get('/',[PaisesController::class,'index'])->name('home');
        Route::get('/novo',[PaisesController::class,'inserir']);    
        Route::post('/novo',[PaisesController::class,'salvar_novo']);   
        Route::get('/excluir/{id}',[PaisesController::class,'excluir']);
        Route::get('/update/{id}',[PaisesController::class,'alterar']);
        Route::post('/update',[PaisesController::class,'salvar_update']);
    });

    Route::post("/logout", [AuthController::class, 'logoutUser'])->name('auth.logout');
});
