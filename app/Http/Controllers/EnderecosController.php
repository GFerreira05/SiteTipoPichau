<?php

namespace App\Http\Controllers;
use App\Models\Enderecos;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Paises;
use App\Models\Usuarios;

use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function index(){
        //$produto = Produto::all()->toArray();

           $enderecos = Enderecos::select("enderecos.id",
                                        "enderecos.local",
                                        "cidades.nome AS cidade",
                                        "estados.nome AS estado",
                                        "paises.nome AS pais",
                                        "usuarios.nome AS usuario")
                                    ->join("cidades","cidades.id", "=", "enderecos.cidades_id")
                                    ->join("estados","estados.id", "=", "enderecos.estados_id")
                                    ->join("paises","paises.id", "=", "enderecos.paises_id")
                                    ->join("usuarios","usuarios.id", "=", "enderecos.usuarios_id")
                                    ->orderBy("enderecos.id")
                                    ->get();

        return view("enderecos.index",["enderecos"=>$enderecos]);
    }

    public function inserir(){
        $enderecos = Enderecos::all()->toArray();
        return view("enderecos.formulario",['enderecos' => $enderecos] );
    }

    public function excluir($id){
        $enderecos = Enderecos::find($id);
        $enderecos->delete();
        return redirect("/enderecos");
    }

    public function alterar($id){
        $enderecos = Enderecos::find($id)->toArray();
        $cidades = Cidades::all()->toArray();
        $estados = Estados::all()->toArray();
        $paises = Paises::all()->toArray();
        $usuarios = Usuarios::all()->toArray();
        return View("enderecos.formulario",['enderecos'=>$enderecos,'cidades' => $cidades, 'estados' => $estados, 'paises' => $paises, 'usuarios' => $usuarios]);
    }

  public function salvar_novo(Request $request)
  {
      $enderecos = new Enderecos();


      $enderecos->local = $request->input("local");
      $enderecos->cidades_id = $request->input("cidades_id");
      $enderecos->estados_id = $request->input("estados_id");
      $enderecos->paises_id = $request->input("paises_id");
      $enderecos->usuarios_id = $request->input("usuarios_id");

      $enderecos->save();

      return redirect("/enderecos");
  }

    public function salvar_update(Request $request){
        $id = $request->input("id");
        $enderecos = Enderecos::find($id);
        $enderecos->local = $request->input("local");
        $enderecos->cidades_id = $request->input("cidades_id");
      $enderecos->estados_id = $request->input("estados_id");
      $enderecos->paises_id = $request->input("paises_id");
      $enderecos->usuarios_id = $request->input("usuarios_id");

        $enderecos->save();
        return redirect("/enderecos");
    }
}
