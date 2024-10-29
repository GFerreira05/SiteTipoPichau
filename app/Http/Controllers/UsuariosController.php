<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosController extends Controller
{
    public function index(){

        $dados = Usuarios::all()->toArray();  //select de categorias - laravel

        return View("usuarios.index",
        [
            'usuarios' => $dados
        ]);
    }

    public function inserir(){
        return View("usuarios.formulario");
    }

    public function salvar_novo(Request $request){
        $usuarios = new Usuarios;
        $usuarios->nome = $request->input("nome");
        $usuarios->email = $request->input("email");
        $usuarios->senha = $request->input("senha");
        $usuarios->telefone = $request->input("telefone");
        $usuarios->tipo_usuario = $request->input("tipo_usuario");
        $usuarios->save();
        return redirect("/usuarios");
        exit;
    }

    public function excluir($id){
        $usuarios = Usuarios::find($id);
        $usuarios->delete();
        return redirect("/usuarios");
    }

    public function alterar($id){
        $usuarios = Usuarios::find($id)->toArray();
        return View("usuarios.formulario",['usuarios'=>$usuarios]);
        var_dump($usuarios);
    }

    public function salvar_update(Request $request){
        $id = $request->input("id");
        $usuarios = Usuarios::find($id);
        $usuarios->nome = $request->input("nome");
        $usuarios->email = $request->input("email");
        $usuarios->senha = $request->input("senha");
        $usuarios->telefone = $request->input("telefone");
        $usuarios->tipo_usuario = $request->input("tipo_usuario");
        $usuarios->save();
        return redirect("/usuarios");
    }
}
