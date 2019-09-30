<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Fornecedor;
use App\User;


class DashboardController extends Controller
{
    public function index(){
        $produtosAbaixo = Produto::where('estoque', '<=', '3')->get();
        $produtos = Produto::orderBy('nome', 'asc')->count();
        $fornecedores = Fornecedor::orderBy('nome', 'asc')->count();
        $usuarios = User::all()->count();
        return view('welcome', compact('produtosAbaixo', 'produtos', 'fornecedores', 'usuarios'));
    }
}
