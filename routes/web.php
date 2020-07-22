<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('listagem-usuario', 'UserController@listUser');

Route::any('/any', function(){
    return ("O tipo de rota Any aceita qualquer tipo de requisição get / put / post");
});


Route::match(['GET', 'POST'],'match', function(){

    return "As rotas match retorna de acordo com a requisição pré configurada na rota";
}
);

Route::get('/categorias/{flag}', function($param){

    return "Categoria: {$param}";
});

Route::get('/Liguagem/{flag}/backend', function($flag){

    return "Liguagem: {$flag}";
});

Route::get('/produto/{flag?}', function($flag=" "){

    return "produto: {$flag}";
});


Route::group([
    'middleware'=>[],
    'prefix'=> 'admin',
    'namespace' => 'Admin',
    'name'=>'admin'
], function(){

    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', function(){
        return redirect()->route('admin.dashboard');

    })->name('home');

});

/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------

*/

Route::resource('/produtos' , 'ProductController')->name('produto');

