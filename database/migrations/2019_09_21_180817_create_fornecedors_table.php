<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 10)->unique();
            $table->string('nome', 255);
            $table->string('endereco', 255);
            $table->string('telefone', 14);
            $table->boolean('ativo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Fornecedores');
    }
}
