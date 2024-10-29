<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class ProdutosController extends Controller
{
    public function index(){
        //$produto = Produto::all()->toArray();

           $produtos = Produtos::select("produtos.id",
                                       "produtos.nome",
                                       "produtos.preco",
                                       "produtos.estoque",
                                       "produtos.fabricante",
                                       "produtos.descricao",
                                       "categoria.nome AS cat",)
                                    ->join("categoria","categoria.id", "=", "produtos.cat_id")
                                    ->orderBy("produtos.id")
                                    ->get();

        return view("Produtos.index",["produtos"=>$produtos]);
    }

    public function inserir(){
        $categorias = Categoria::all()->toArray();
        return view("Produtos.formulario",['categorias' => $categorias]);
    }

    public function excluir($id){
        $produto = Produtos::find($id);
        $produto->delete();
        return redirect("/produtos");
    }

    public function alterar($id){
        $produto = Produtos::find($id)->toArray();
        $categorias = Categoria::all()->toArray();
        return View("produtos.formulario",['produtos'=>$produto,'categorias' => $categorias]);
    }

  public function salvar_novo(Request $request)
  {
      $produto = new Produtos();


      $produto->nome = $request->input("nome");
      $produto->id_categoria = $request->input("id_categoria");
      $produto->preco = $request->input("preco");
      $produto->estoque = $request->input("estoque");
      $produto->fabricante = $request->input("fabricante");
      $produto->descricao = $request->input("descricao");

      // Upload e salvamento da imagem
      if ($request->hasFile('produto_imagem')) {
        $requestImage = $request->file('produto_imagem');
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName()) . "." . $extension;
        $requestImage->move(public_path('img/produtos'), $imageName);
        $produto->produto_imagem = $imageName;
      }

      $produto->save();

      return redirect("/produtos");
  }

    public function salvar_update(Request $request){
        $id = $request->input("id");
        $produto = Produtos::find($id);
        $produto->nome = $request->input("nome");
        $produto->cat_id = $request->input("cat_id");
        $produto->preco = $request->input("preco");
        $produto->estoque = $request->input("estoque");
        $produto->fabricante = $request->input("fabricante");
        $produto->descricao = $request->input("descricao");

        if ($request->hasFile('produto_imagem')) {
            $requestImage = $request->file('produto_imagem');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName()) . "." . $extension;
            $requestImage->move(public_path('img/produtos'), $imageName);
            $produto->produto_imagem = $imageName;
          }


        $produto->save();
        return redirect("/produtos");
    }
}
