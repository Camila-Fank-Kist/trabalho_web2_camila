<?php

use Illuminate\Support\Facades\Route;
//importar o arquivo do controller -> controllers que contêm métodos para lidar com solicitações HTTP
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SaborController;
use App\Http\Controllers\MainController;

//carrega uma listagem do banco
Route::get('/avaliacao',
    [AvaliacaoController::class, 'index'])->name('avaliacao.index'); 
    //Route::get(): método que possui dois argumentos:
        // '/avaliacao': URL que corresponde a esta rota
        // [AvaliacaoController::class, 'index']: especifica o controller e o método que serão executados quando a rota for acessada -> quando a rota for acessada, o método index do controller AvaliacaoController será executado
    //name('avaliacao.index'): define um nome para a rota -> referência para gerar URLs para esta rota nos views ou controladores: usando route('avaliacao.index'), gera-se a URL correspondente a esta rota

//chama o formulário da avaliacao
Route::get('/avaliacao/create',
    [AvaliacaoController::class, 'create'])->name('avaliacao.create');

 //realiza a ação de salvar do formulário
 Route::post('/avaliacao',
    [AvaliacaoController::class, 'store'])->name('avaliacao.store');

//chama o formulário para edição
Route::get('/avaliacao/edit/{id}',
    [AvaliacaoController::class, 'edit'])->name('avaliacao.edit');

 //realiza a ação de atualizar os dados do formulário
 Route::put('/avaliacao/update/{id}',
    [AvaliacaoController::class, 'update'])->name('avaliacao.update');

//chama o método para excluir o registro
Route::get('/avaliacao/destroy/{id}',
    [AvaliacaoController::class, 'destroy'])->name('avaliacao.destroy');

//chama o método para serch para pesquisar e filtrar o registro da listagem
Route::post('/avaliacao/search',
    [AvaliacaoController::class, 'search'])->name('avaliacao.search');






//carrega uma listagem do banco
Route::get('/pedido',
    [PedidoController::class, 'index'])->name('pedido.index'); 
    
//chama o formulário da pedido
Route::get('/pedido/create',
    [PedidoController::class, 'create'])->name('pedido.create');

 //realiza a ação de salvar do formulário
 Route::post('/pedido',
    [PedidoController::class, 'store'])->name('pedido.store');

//chama o formulário para edição
Route::get('/pedido/edit/{id}',
    [PedidoController::class, 'edit'])->name('pedido.edit');

 //realiza a ação de atualizar os dados do formulário
 Route::put('/pedido/update/{id}',
    [PedidoController::class, 'update'])->name('pedido.update');

//chama o método para excluir o registro
Route::get('/pedido/destroy/{id}',
    [PedidoController::class, 'destroy'])->name('pedido.destroy');

//chama o método para serch para pesquisar e filtrar o registro da listagem
Route::post('/pedido/search',
    [PedidoController::class, 'search'])->name('pedido.search');






//carrega uma listagem do banco
Route::get('/sabor',
    [SaborController::class, 'index'])->name('sabor.index'); 
    
//chama o formulário da sabor
Route::get('/sabor/create',
    [SaborController::class, 'create'])->name('sabor.create');

 //realiza a ação de salvar do formulário
 Route::post('/sabor',
    [SaborController::class, 'store'])->name('sabor.store');

//chama o formulário para edição
Route::get('/sabor/edit/{id}',
    [SaborController::class, 'edit'])->name('sabor.edit');

 //realiza a ação de atualizar os dados do formulário
 Route::put('/sabor/update/{id}',
    [SaborController::class, 'update'])->name('sabor.update');

//chama o método para excluir o registro
Route::get('/sabor/destroy/{id}',
    [SaborController::class, 'destroy'])->name('sabor.destroy');

//chama o método para serch para pesquisar e filtrar o registro da listagem
Route::post('/sabor/search',
    [SaborController::class, 'search'])->name('sabor.search');

Route::get('/',
    [MainController::class, 'index'])->name('index');

/*Route::get('/', function () {
    return view('welcome');
});*/
