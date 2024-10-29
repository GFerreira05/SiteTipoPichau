<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\EnderecosController;
use App\Http\Controllers\ProdutosController;

Route::get('/admin', function() {
    return view('admin_layout.index');
});

Route::get('/', function() {
    return view('loja_layout.index');
});

Route::group(['prefix' => 'login'], function(){
    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post("/login", [AuthController::class, 'autenticateUser'])->name('auth.login');
});

Route::middleware('auth')->group(function () {


    Route::group(['prefix' => 'categoria'], function(){
        Route::get('/',[CategoriaController::class,'index'])->name('tabela_categoria');
        Route::get('/novo',[CategoriaController::class,'inserir']);
        Route::post('/novo',[CategoriaController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[CategoriaController::class,'excluir']);
        Route::get('/update/{id}',[CategoriaController::class,'alterar']);
        Route::post('/update',[CategoriaController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('/',[UsuariosController::class,'index'])->name('tabela_usuarios');
        Route::get('/novo',[UsuariosController::class,'inserir']);
        Route::post('/novo',[UsuariosController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[UsuariosController::class,'excluir']);
        Route::get('/update/{id}',[UsuariosController::class,'alterar']);
        Route::post('/update',[UsuariosController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'paises'], function(){
        Route::get('/',[PaisesController::class,'index'])->name('tabela_paises');
        Route::get('/novo',[PaisesController::class,'inserir']);
        Route::post('/novo',[PaisesController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[PaisesController::class,'excluir']);
        Route::get('/update/{id}',[PaisesController::class,'alterar']);
        Route::post('/update',[PaisesController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'estados'], function(){
        Route::get('/',[EstadosController::class,'index'])->name('tabela_estados');
        Route::get('/novo',[EstadosController::class,'inserir']);
        Route::post('/novo',[EstadosController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[EstadosController::class,'excluir']);
        Route::get('/update/{id}',[EstadosController::class,'alterar']);
        Route::post('/update',[EstadosController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'cidades'], function(){
        Route::get('/',[CidadesController::class,'index'])->name('tabela_cidades');
        Route::get('/novo',[CidadesController::class,'inserir']);
        Route::post('/novo',[CidadesController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[CidadesController::class,'excluir']);
        Route::get('/update/{id}',[CidadesController::class,'alterar']);
        Route::post('/update',[CidadesController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'enderecos'], function(){
        Route::get('/',[EnderecosController::class,'index'])->name('tabela_enderecos');
        Route::get('/novo',[EnderecosController::class,'inserir']);
        Route::post('/novo',[EnderecosController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[EnderecosController::class,'excluir']);
        Route::get('/update/{id}',[EnderecosController::class,'alterar']);
        Route::post('/update',[EnderecosController::class,'salvar_update']);
    });

    Route::group(['prefix' => 'produto'], function(){
        Route::get('/',[ProdutosController::class,'index'])->name('tabela_produtos');
        Route::get('/novo',[ProdutosController::class,'inserir']);
        Route::post('/novo',[ProdutosController::class,'salvar_novo']);
        Route::get('/excluir/{id}',[ProdutosController::class,'excluir']);
        Route::get('/update/{id}',[ProdutosController::class,'alterar']);
        Route::post('/update',[ProdutosController::class,'salvar_update']);
    });

    Route::post("/logout", [AuthController::class, 'logoutUser'])->name('auth.logout');
});
