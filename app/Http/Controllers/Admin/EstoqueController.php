<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Estoque;
use DB;


class EstoqueController extends Controller
{
    public function index(){
        $estoques = Estoque::getEstoque();
        // dd($estoques);
        return View('admin.estoque.index', compact('estoques'));
    }

    public function adicionar(){

        $produtos = Produto::where('ativo', 1)->get();
        $fornecedores = Fornecedor::where('ativo', 1)->get();
        return View('admin.estoque.adicionar', compact('fornecedores', 'produtos'));
    }

    public function cadastrar(Request $request){
        $this->validate(
            $request, 
            [
            'produtoId' => 'required',
            'fornecedorId' => 'required',
            'quantidade' => 'required',
            'descricao' => 'required',
            ],
            [
            
            'required' => 'O campo :attribute é obrigatório'
            ]
        );

        $estoque = $request->all();//recuperando os dados digitados

        $produto = Produto::findOrFail($estoque['produtoId']);
        $produto->estoque = $produto->estoque + $estoque["quantidade"];//encontrando e alterando os produtos

        //$estoques = $this->Estoque();

        if($produto->save()){//salvando o produto e inserindo um novo registro em estoque
            Estoque::create($estoque);
            return redirect()->route('admin.estoque.index')->with('cadastrar', true); 
        }
        return redirect()->route('admin.estoque.index')->with('erro', true);
    }

    public function atualizar($id){
        $estoque = Estoque::findOrFail($id);
        $produtos = Produto::where('ativo', 1)->get();
        $fornecedores = Fornecedor::where('ativo', 1)->get();
        return view('admin.estoque.atualizar', compact('estoque', 'produtos', 'fornecedores'));
    }

    public function editar(Request $request, $id){
        $this->validate(
            $request, 
            [
            'produtoId' => 'required',
            'fornecedorId' => 'required',
            'quantidade' => 'required',
            'descricao' => 'required',
            ],
            [
            
            'required' => 'O campo :attribute é obrigatório'
            ]
        );

        $estoque = $request->all();//recuperando os dados digitados

        if($estoque['quantidade'] != $estoque['quantidade-antiga']){
            $produto = Produto::findOrFail($estoque['produtoId']);
            $produto->estoque = $produto->estoque - $estoque["quantidade-antiga"];
            $produto->estoque = $produto->estoque + $estoque["quantidade"];
        }

        if($produto->save()){
            Estoque::find($id)->update($estoque);
            return redirect()->route('admin.estoque.index')->with('cadastrar', true); 
        }
        return redirect()->route('admin.estoque.index')->with('erro', true);
    }

    public function excluir(Request $request, $id){
        $estoque = Estoque::findOrFail($id);
        $dados = $request->all();

        $produto = Produto::findOrFail($estoque['produtoId']);
        $produto->estoque = $produto->estoque - $estoque->quantidade;//encontrando e alterando os produtos

        if($produto->save()){
            Estoque::destroy($id);
            return redirect()->route('admin.estoque.index')->with('exclusao', true);
        }
        return redirect()->route('admin.estoque.index');
    }
}
