<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(Request $request)
    {
        $fornecedores = Fornecedor::getFornecedores();
        return view('admin.fornecedores.index', compact('fornecedores'));
    }

    public function adicionar(){
        return view('admin.fornecedores.adicionar');
    }

    //função para add um fornecedor
    public function cadastrar(Request $request){
        try {
            $this->validate(
                $request, 
                [
                'codigo' => 'required|unique:fornecedores',
                'nome' => 'required',
                'endereco' => 'required',
                'telefone' => 'required'

                ],
                [
                'unique' => 'O :attribute já está cadastrado',
                'required' => 'O campo :attribute é obrigatório'
                ]
            );
            $dados = $request->all();
            isset($dados['ativo']) ? $dados['ativo'] = 1 : $dados['ativo'] = 0;

            Fornecedor::create($dados);
        
            return redirect()->route('admin.fornecedores.index')->with('cadastrar', true);

        } catch (\Throwable $th) {
           throw $th;
        }
    }

    public function atualizar($id){
        $fornecedor = Fornecedor::findOrFail($id);
        return View('admin.fornecedores.atualizar', compact('fornecedor'));
    }

    public function editar(Request $request, $id){
        try {
            $this->validate(
                $request, 
                [
                'codigo' => 'required|unique:fornecedores',
                'nome' => 'required',
                'endereco' => 'required',
                'telefone' => 'required'

                ],
                [
                'unique' => 'O :attribute já está foi cadastrado',
                'required' => 'O campo :attribute é obrigatório'
                ]
            );
            $dados = $request->all();
            isset($dados['ativo']) ? $dados['ativo'] = 1 : $dados['ativo'] = 0;
            Fornecedor::find($id)->update($dados);

            return redirect()->route('admin.fornecedores.index')->with('editar', true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function excluir($id){
        try {
            Fornecedor::destroy($id);

            return redirect()->route('admin.fornecedores.index')->with('exclusao', true);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
