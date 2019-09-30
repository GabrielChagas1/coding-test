<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Rotas de login
Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login/entrar', ['as' => 'login.entrar', 'uses' => 'LoginController@entrar']);
Route::get('/login/sair', ['as' => 'login.sair', 'uses' => 'LoginController@sair']);


Route::group(['middleware' => 'auth'], function(){

    Route::get('/', ['as' => 'admin.dashboard.index', 'uses' => 'Admin\DashboardController@index']);
    // Rota para listar todos os fornecedores
    Route::get('/admin/fornecedores', ['as' => 'admin.fornecedores.index', 'uses' => 'Admin\FornecedorController@index']);
    // Rota que leva até a view para add um fornecedor
    Route::get('/admin/fornecedores/adicionar', ['as' => 'admin.fornecedores.adicionar', 'uses' => 'Admin\FornecedorController@adicionar']);
    // Rota que add um fornecedor
    Route::post('/admin/fornecedores/cadastrar', ['as' => 'admin.fornecedores.cadastrar', 'uses' => 'Admin\FornecedorController@cadastrar']);
    // Rota que leva até a view para editar um fornecedor
    Route::get('/admin/fornecedores/atualizar/{id}', ['as' => 'admin.fornecedores.atualizar', 'uses' => 'Admin\FornecedorController@atualizar']);
    // Rota que editar um fornecedor
    Route::put('/admin/fornecedores/editar/{id}', ['as' => 'admin.fornecedores.editar', 'uses' => 'Admin\FornecedorController@editar']);
    // Rota que leva até a view para excluir um fornecedor
    Route::post('/admin/fornecedores/excluir/{id}', ['as' => 'admin.fornecedores.excluir', 'uses' => 'Admin\FornecedorController@excluir']);

    // Rota para listar todos os produtos
    Route::get('/admin/produtos', ['as' => 'admin.produtos.index', 'uses' => 'Admin\ProdutoController@index']);
    // Rota que leva até a view para add um produtos
    Route::get('/admin/produtos/adicionar', ['as' => 'admin.produtos.adicionar', 'uses' => 'Admin\ProdutoController@adicionar']);
    // Rota que add um produtos
    Route::post('/admin/produtos/cadastrar', ['as' => 'admin.produtos.cadastrar', 'uses' => 'Admin\ProdutoController@cadastrar']);
    // Rota que leva até a view para editar um produtos
    Route::get('/admin/produtos/atualizar/{id}', ['as' => 'admin.produtos.atualizar', 'uses' => 'Admin\ProdutoController@atualizar']);
    // Rota que editar um produtos
    Route::put('/admin/produtos/editar/{id}', ['as' => 'admin.produtos.editar', 'uses' => 'Admin\ProdutoController@editar']);
    // Rota que leva até a view para excluir um produtos
    Route::post('/admin/produtos/excluir/{id}', ['as' => 'admin.produtos.excluir', 'uses' => 'Admin\ProdutoController@excluir']);

    // Rota para listar todos os estoque
    Route::get('/admin/estoque', ['as' => 'admin.estoque.index', 'uses' => 'Admin\EstoqueController@index']);
    // Rota que leva até a view para add um estoque
    Route::get('/admin/estoque/adicionar', ['as' => 'admin.estoque.adicionar', 'uses' => 'Admin\EstoqueController@adicionar']);
    // Rota que add um estoque
    Route::post('/admin/estoque/cadastrar', ['as' => 'admin.estoque.cadastrar', 'uses' => 'Admin\EstoqueController@cadastrar']);
    // Rota que leva até a view para editar um estoque
    Route::get('/admin/estoque/atualizar/{id}', ['as' => 'admin.estoque.atualizar', 'uses' => 'Admin\EstoqueController@atualizar']);
    // Rota que editar um estoque
    Route::put('/admin/estoque/editar/{id}', ['as' => 'admin.estoque.editar', 'uses' => 'Admin\EstoqueController@editar']);
    // Rota que leva até a view para excluir um estoque
    Route::post('/admin/estoque/excluir/{id}', ['as' => 'admin.estoque.excluir', 'uses' => 'Admin\EstoqueController@excluir']);
});