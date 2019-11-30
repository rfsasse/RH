<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Api</title>

    <button onclick="cadastrar ()" class="btn btn-primary">Cadastrar funcionario</button>
    <button onclick="cargos ()" class="btn btn-primary">Cargos</button>
    
    <!--<button onclick="sair ()" class="btn btn-primary">Sair</button>-->

        <table id="Funcionarios" class="table table-bordered">

            
            <thead class="thead-dark">
                <tr>
                <th scope="col">Codigo Funcionário</th>
                <th scope="col">Nome</th>
                <th scope="col">Profição</th>
                
                </tr>
            </thead>
            <tbody>

     
            
            </tbody>
            
        </table>
       

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

        var funcionarios = document.getElementById("Funcionarios").getElementsByTagName('tbody')[0];
        
        axios.get('/api/funcionarios', { headers: { Authorization: 'Bearer' + token } })
        .then(response => {
            
            var empregados = response.data;

            empregados.forEach(funci => {


                var row = funcionarios.insertRow();

                var cell0 = row.insertCell(0);
                cell0.innerHTML = funci.id
                
                cell0.className = 'table table-bordered'

                var cell1 = row.insertCell(1);
                cell1.innerHTML = funci.funcionarios_nome
                


                var cell2 = row.insertCell(2);
                cell2.innerHTML = funci.funcionarios_profissao
                

                var btEditar = document.createElement('button')
                btEditar.innerText = 'Editar'
                
                
                var btExcluir = document.createElement('button')
                btExcluir.innerText = 'Excluir'
             

                var cell3 = row.insertCell(3);
                cell3.appendChild(btEditar);
               
                 cell3.appendChild(btExcluir);
                
                
                var idFunc = funci.id;
                
                btEditar.onclick = function(){
                    alert('Código do funcionario: '+idFunc);
                    window.location.href = '/editarFuncionario';
                }

                
                btExcluir.onclick = function(){
                    var id = idFunc;
                    
                    
                    axios.delete(`/api/funcionarios/${id}`, { headers: { Authorization: 'Bearer' + token } })
                    .then(response => {
                        window.location.href = '/';
                    })

                    .cath(error => {
                    alert(error.response.data.error)
                    })
                    
                }

            })
        })

       
        
        function cadastrar(){
           
            window.location.href = '/cadastraFuncionario';
        }

        function cargos(){
           
            window.location.href = '/home1';
        }
        
        function editarFuncionario(){
            window.location.href = '/editarFuncionario';
        }
       
      
       
        

        

            
        
                
    </script>
    
    
  
    
</html>