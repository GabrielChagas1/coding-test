<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use File;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::getProdutos();
        $produtosAbaixo = Produto::where('estoque', '<=', '3')->get();

        return View('admin.produtos.index', compact('produtos', 'produtosAbaixo'));
    }

    public function adicionar(){
        return View('admin.produtos.adicionar');
    }

    public function cadastrar(Request $request){
        try {

            $this->validate(
                $request, 
                [
                'codigo' => 'required|unique:produtos',
                'nome' => 'required',
                'img' => 'required',
                'valor' => 'required'

                ],
                [
                'unique' => 'O :attribute já está foi cadastrado',
                'required' => 'O campo :attribute é obrigatório'
                ]
            );

            $dados = $request->all();
            $dados['estoque'] = 0;
            $dados['valor'] = floatval($dados['valor']);
            isset($dados['ativo']) ? $dados['ativo'] = 1 : $dados['ativo'] = 0;

            if($request->hasFile('img')){
                $imagem = $request->file('img');
                $num = rand(1111, 9999);
                $dir = "img/produtos";
                $ex = $imagem->guessClientExtension();
                $nomeImagem = "img".$num.".".$ex;
                $imagem->move($dir, $nomeImagem);
                $dados['img'] = $dir."/".$nomeImagem;
            }
            Produto::create($dados);

            return redirect()->route('admin.produtos.index')->with('cadastrar', true);

        } catch (\Throwable $th) {
           throw $th;
        }
    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id);//recuperando o produto
        return View('admin.produtos.atualizar', compact('produto'));
    }

    public function editar(Request $request, $id){
        try {

            $this->validate(
                $request, 
                [
                'nome' => 'required',
                'valor' => 'required'
                ],
                [
                'required' => 'O campo :attribute é obrigatório'
                ]
            );

            $dados = $request->all();
            $dados['estoque'] = 0;
            $dados['valor'] = floatval($dados['valor']);

            isset($dados['ativo']) ? $dados['ativo'] = 1 : $dados['ativo'] = 0;

            //manipulando imagens
            if($request->hasFile('img')){
                $imagem = $request->file('img');
                $num = rand(1111, 9999);
                $dir = "img/produtos";
                $ex = $imagem->guessClientExtension();
                $nomeImagem = "img".$num.".".$ex;
                $imagem->move($dir, $nomeImagem);
                $dados['img'] = $dir."/".$nomeImagem;
                //remover imagem antigo do diretorio
                if(isset($dados['imagem_antiga'])){
                    File::delete($dados['imagem_antiga']);
                }  
            }

            //atualizando o produto
            $produto = Produto::findOrFail($id);
            $produto->update($dados);

            return redirect()->route('admin.produtos.index')->with('editar', true); 

        } catch (\Throwable $th) {
           throw $th;
        }
    }

    public function excluir($id){
        try {
            //excluindo produto
            Produto::destroy($id);
            return redirect()->route('admin.produtos.index')->with('exclusao', true);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
