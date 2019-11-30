<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/register', 'AuthController@register');    //rota para criar o registro 
Route::post('auth/login', 'AuthController@login');          // rota para entrar e receber o toquem de autenticação

Route::middleware('auth:api')->group(function ($e) {     // causo estiver atenticao ten acesso as outras rotas

    Route::get('funcionarios','FuncionarioController@index');         //verificar todos os funcionarios 
    Route::get('funcionarios/{funcionario}','FuncionarioController@show');  // listar funcionario passado o id
    Route::post('funcionarios','FuncionarioController@store');          // criar funcionario
    Route::put('funcionarios/{funcionario}','FuncionarioController@update'); //alterar funcionario
    Route::delete('funcionarios/{funcionario}','FuncionarioController@destroy'); // deletar funcionario pelo id

    
    Route::get('funcionarios/cargos','CargoController@indexAll');
    Route::get('funcionarios/{funcionario}/cargos','CargoController@index');   //mostra todos as tarefas do funcionario  passando id dele
    Route::get('funcionarios/{funcionario}/cargos/{cargo}','CargoController@show'); // mostra 1 tarefa especifica conforme id do duncionario e id da tarefa
    Route::post('funcionarios/{funcionario}/cargos','CargoController@store'); //cria terefa passando id do funcionario
    Route::put('funcionarios/{funcionario}/cargos/{cargo}','CargoController@update'); //atualiza tarefa paasar id func e id tarefa a alterar
    Route::delete('funcionarios/{funcionario}/cargos/{cargo}','CargoController@destroy');  // deleta passar id do funcionario e id tarefa
 

    Route::post('auth/logout', 'AuthController@logout');   
    Route::get('auth', 'AuthController@index');

});
