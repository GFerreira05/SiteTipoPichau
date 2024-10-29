<?php

namespace App\Http\Controllers;
use App\Models\Estados;
use App\Models\Paises;

use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function index(){
        //$produto = Produto::all()->toArray();
        
           $estados = Estados::select("estados.id",
                                       "estados.nome",
                                       "paises.nome AS pais")
                                    ->join("paises","paises.id", "=", "estados.paises_id")
                                    ->orderBy("estados.id")                                       
                                    ->get();

        return view("estados.index",["estados"=>$estados]);
    }

    public function inserir(){
        $paises = Paises::all()->toArray();      
        return view("estados.formulario",['paises' => $paises]);        
    }

    public function excluir($id){
        $estados = Estados::find($id);
        $estados->delete();
        return redirect("/estados"); 
    }
    
    public function alterar($id){
        $estados = Estados::find($id)->toArray();
        $paises = Paises::all()->toArray();
        return View("estados.formulario",['estados'=>$estados,'paises' => $paises]);             
    }

  public function salvar_novo(Request $request)
  {
      $estados = new Estados();
      

      $estados->nome = $request->input("nome");
      $estados->paises_id = $request->input("paises_id");      
      
      $estados->save();      
  
      return redirect("/estados"); 
  }  

    public function salvar_update(Request $request){        
        $id = $request->input("id");
        $estados = Estados::find($id);
        $estados->nome = $request->input("nome");
        $estados->paises_id = $request->input("paises_id");

        $estados->save();
        return redirect("/estados"); 
    }
}