<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['funcionarios_nome','funcionarios_profissao']; // nome das tabelas 

    public function cargo()
    {
      return $this->hasMany('App\Cargo');  // 1 funcionario para muitos cargos
    }

}
