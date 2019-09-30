<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Estoque extends Model
{
    protected $table = 'Estoque'; 
    // protected $primaryKey = '...'; //algo assim
    protected $fillable = ['produtoId', 'fornecedorId', 'quantidade', 'descricao'];

    public function FKproduto()
    {
        return $this->belongsTo('Models\Produto', 'produtoId', 'id');
    }
    public function FKfornecedor()
    {
        return $this->belongsTo('Models\Fornecedor', 'fornecedorId', 'id');
    }

    public static function getEstoque(){
        return DB::table('estoque')
                ->join('produtos','estoque.produtoId','=','produtos.id')
                ->join('fornecedores','estoque.fornecedorId','=','fornecedores.id')
                ->select('produtos.nome as produto','fornecedores.nome as fornecedor','estoque.quantidade', 'estoque.descricao', 'estoque.created_at', 'estoque.id')
                ->get();
    }
}
