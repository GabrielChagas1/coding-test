<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    public $table = "Fornecedores";

    protected $fillable = [
        'codigo',
        'nome',
        'endereco',
        'telefone',
        'ativo',
    ];

    public static function getFornecedores(){
        return Fornecedor::orderBy('nome', 'asc')->get();
    }
}
