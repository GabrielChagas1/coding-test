<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produtoId')->unsigned()->nullable();
            $table->integer('fornecedorId')->unsigned()->nullable();
            $table->integer('quantidade');
            $table->string('descricao');
            $table->timestamps();

            //referências
            $table->foreign('fornecedorId')->references('id')->on('fornecedores')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('produtoId')->references('id')->on('produtos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque');
    }
}
