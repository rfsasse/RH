<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
  protected $fillable = ['funcionarios_id','cargos_tarefas', 'cargos_descricao']; //  noem tabelas cargo

  public function funcionario()
  {
      return $this->belongsTo(Funcionario::class);   // pertence para o funcionario foreign key
  }
}
