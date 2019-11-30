<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Api</title>

    

            <h3>Adicionar Função</h3>
            <form id="cadastrarCargo"  method="post">
          
               <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Função</label>
                    <input type="text" class="form-control" id="cargos_tarefas" placeholder="Função"> 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Descrição Tarefa</label>
                    <input type="text" class="form-control" id="cargos_descricao" placeholder="Descrição"> 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Codigo Funcionário</label>
                    <input type="text" class="form-control" id="funcionario_id" placeholder="Verificar codigo no inicio."> 
                    </div>
                </div>

                
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        <br>
        <button onclick="inicio ()" class="btn btn-primary">Inicio</button>
          

       

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--  codificar apartir deste ponto -->        
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>


        var token = localStorage.getItem('auth');
        
        if (!token)
            window.location.href = '/login';


        var cadastrarCargo = document.forms['cadastrarCargo'];
        
        cadastrarCargo.addEventListener('submit', (e) => {
                e.preventDefault();
                
        
        
            var funcionario_id = cadastrarCargo.funcionario_id.value;
            console.log(funcionario_id);

            var cargos_tarefas = cadastrarCargo.cargos_tarefas.value;
            console.log(cargos_tarefas);
            var cargos_descricao = cadastrarCargo.cargos_descricao.value;
            console.log(cargos_descricao);
            
            
            axios.post(`/api/funcionarios/${funcionario_id}/cargos`, {cargos_tarefas,cargos_descricao}, { headers: { Authorization: 'Bearer' + token } })
            .then(response => {

            window.location.href = '/cadastraCargo';
            
            })

            .cath(error => {
                alert(error.response.data.error)
            })
            
            
        
        })
        
  
        function inicio(){
            window.location.href = '/';
        }
        
  
  
    </script>
    
    
  
    
</html>