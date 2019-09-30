<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $table = "Produtos";

    protected $fillable = [
        'codigo',
        'nome',
        'img',
        'estoque',
        'valor',
        'ativo'
    ];

    public static function getProdutos(){
        return Produto::orderBy('nome', 'asc')->get();
    }
}
