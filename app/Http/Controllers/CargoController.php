<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Cargo;

use Illuminate\Http\Request;

class CargoController extends Controller
{

  
    

    
    public function index(Request $request, $id)
    {
        $funcionario = Funcionario::with('cargo')->find($id);         //passa o id do funcionario e lista todos os cargos dele
        return $funcionario;
    }

    public function store(Request $request, $id)
    {
        
        if(!$funcionario_id = Funcionario::find($id))
            return response()->json(['error' => 'Funcionario informado não encontrado'], 404);  // passa o id do funcionario e cria um cargo novo para ele

        
        return $funcionario_id->cargo()->create($request->all());
    }

    public function show($funcionario_id, $cargo_id)
    {
        $funcionario = Funcionario::with(['cargo' => function ($query) use ($cargo_id) {
            $query->where('id', $cargo_id);       //passa o id do funcionario e o id do cargo e mostra so o funcionario e o id que foi passado
        }])->find($funcionario_id);

        return $funcionario;
    }

    public function update(Request $request, $funcionario_id, $cargo_id)
    {
        if(!$funcionario = Funcionario::find($funcionario_id))
            return response()->json(['error' => 'Funcionario informado não encontrado'], 404);    // atualiza o cargo do funcionario que foi passado o id 

        if(!$cargo = $funcionario->cargo()->find($cargo_id))
            return response()->json(['error' => 'cargos informada não encontrada'], 404);

        $cargo->update($request->only('cargos_tarefas', 'cargos_descricao'));

        return $cargo;

    }


    public function destroy($funcionario_id, $cargo_id)
    {
        if(!$funcionario = Funcionario::find($funcionario_id))
            return response()->json(['error' => 'Funcionario informado não encontrado'], 404);   // destroy o cargo do funcionario 

        if(!$cargo = $funcionario->cargo()->find($cargo_id))
            return response()->json(['error' => 'cargos informada não encontrada'], 404);

        $cargo->delete();

    }
}
