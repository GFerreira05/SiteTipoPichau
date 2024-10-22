<?php

namespace App\Http\Controllers;
use App\Models\Paises;

use Illuminate\Http\Request;

class PaisesController extends Controller
{
    public function index(){
        
        $dados = Paises::all()->toArray();  //select de categorias - laravel    
        
        return View("paises.index",
        [
            'paises' => $dados
        ]);
    }

    public function inserir(){
        return View("Paises.formulario");
    }

    public function salvar_novo(Request $request){
        $paises = new Paises;
        $paises->nome = $request->nome;
        $paises->save();
        return redirect("/paises");                  
        exit;
    }

    public function excluir($id){
        $paises = Paises::find($id);
        $paises->delete();
        return redirect("/paises");        
    }
    
    public function alterar($id){
        $paises = Paises::find($id)->toArray();
        return View("Paises.formulario",['paises'=>$paises]);
        var_dump($paises);          
    }

    public function salvar_update(Request $request){
        $id = $request->input("id");
        $paises = Paises::find($id);
        $paises->nome = $request->input("nome");
        $paises->save();
        return redirect("/paises");            
    }
}
