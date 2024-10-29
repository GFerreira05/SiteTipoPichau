<?php

namespace App\Http\Controllers;
use App\Models\Cidades;
use App\Models\Estados;

use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function index(){
        //$produto = Produto::all()->toArray();

           $cidades = Cidades::select("cidades.id",
                                        "cidades.nome",
                                        "estados.nome AS estado")
                                    ->join("estados","estados.id", "=", "cidades.estados_id")
                                    ->orderBy("cidades.id")
                                    ->get();

        return view("cidades.index",["cidades"=>$cidades]);
    }

    public function inserir(){
        $estados = Estados::all()->toArray();
        return view("cidades.formulario",['estados' => $estados] );
    }

    public function excluir($id){
        $cidades = Cidades::find($id);
        $cidades->delete();
        return redirect("/cidades");
    }

    public function alterar($id){
        $cidades = Cidades::find($id)->toArray();
        $estados = Estados::all()->toArray();
        return View("estados.formulario",['estados'=>$estados,'paises' => $paises]);
    }

  public function salvar_novo(Request $request)
  {
      $cidades = new Cidades();


      $cidades->nome = $request->input("nome");
      $cidades->estados_id = $request->input("estados_id");

      $cidades->save();

      return redirect("/cidades");
  }

    public function salvar_update(Request $request){
        $id = $request->input("id");
        $cidades = Cidades::find($id);
        $cidades->nome = $request->input("nome");
        $cidades->estados_id = $request->input("estados_id");

        $cidades->save();
        return redirect("/cidades");
    }
}
