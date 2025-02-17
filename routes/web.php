<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    Route::resource('produto', 'ProdutoController');
    Route::resource('produto-detalhe', 'ProdutoDetalheController');
});

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//nome não pode ser numerico
//categoria_id tem que ser numerico
Route::get('/contato/{nome}/{categoriaid}', function (
    string $nome,
    int $categoriaid = 1
) {
    echo "Estamaos aqui: {$nome} - {$categoriaid}";
})->where('nome', '[A-Za-z]+')->where('categoria_id', '[0-9]+');

Route::get('/rota1', function () {
    echo 'Rota 2';
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

//ou
// Route::redirect('/rota2', '/rota1');

//enviando parametros para o controlelr
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') .
        '">clique aqui</a> para ir para pagina inicial.';
});

// Route::get('/contato/{nome}/{descricao}', function (string $nome, string $descricao) {
//     echo "Estamaos aqui: {$nome} - {$descricao}";
// });

//parametro mensagem opcional
// Route::get('/contato/{nome}/{descricao}/{mensagem?}', function (
//     string $nome,
//     string $descricao,
//     string $mensagem = "mensagem nao informada"
// ) {
//     echo "Estamaos aqui: {$nome} - {$descricao} - {$mensagem}";
// });
