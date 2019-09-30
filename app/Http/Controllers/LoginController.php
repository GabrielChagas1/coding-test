<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function entrar(Request $req){
        $dados = $req->all();
        if(Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']])){
            return redirect()->route('admin.dashboard.index');
        }
        return redirect()->route('login')->with('invalido', true);
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('login');
    }
}