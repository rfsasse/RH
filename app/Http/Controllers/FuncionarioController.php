<?php

namespace App\Http\Controllers;
use App\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return Funcionario::get();             // mostra todos os funcionarios do banco
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      return Funcionario::create($request->all());    //cria um funcionario no banco
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      if(!$funcionario = Funcionario::find($id))
          return response()->json(['error' => 'Funcionario informado não encontrado'], 404);   // mostra funcionario pelo id

      return $funcionario;
  }

  public function update(Request $request, $id)
  {
      if(!$funcionario = Funcionario::find($id))
          return response()->json(['error' => 'Funcionario informado não encontrado'], 404);  // atualiza  a informação do funcionario passa o id

      $funcionario->update($request->only('funcionarios_nome'));

      return $funcionario;

  }

  

  public function destroy($id)
  {
      if(!$funcionario = Funcionario::find($id))
          return response()->json(['error' => 'Funcionario informado não encontrado'], 404);  // procura o id e deleta o funcionario

      $funcionario->delete();

  }
}
