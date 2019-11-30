<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Api</title>

    <button onclick="cadastrarCargo ()" class="btn btn-primary">Cadastrar Cargos E funções</button>
        
        <table id="Cargos" class="table table-bordered">

            
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Profissão</th>
                <th scope="col">Função</th>                     
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>               
                <th scope="col">Função</th>
                <th scope="col">Descrição</th> 
                <th scope="col">Editar</th>              
                <th scope="col">Função</th>
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>             
                <th scope="col">Função</th>
                <th scope="col">Descrição</th>
                <th scope="col">Editar</th>
                
                
                
                </tr>
            </thead>
            <tbody>

     
            
            </tbody>
      
        </table>
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
                
        var cargos = document.getElementById("Cargos").getElementsByTagName('tbody')[0];




        axios.get('/api/funcionarios', { headers: { Authorization: 'Bearer' + token } })
        .then(response => {
            var func = response.data;
            console.log(func);

            func.forEach(funci => {
                var row = cargos.insertRow();

                
                var cell0 = row.insertCell(0);
                cell0.innerHTML = funci.funcionarios_nome
                cell0.className = 'table table-bordered'

                var cell1 = row.insertCell(1);
                cell1.innerHTML = funci.funcionarios_profissao
                

                var i = funci.id;
                console.log(i);
                axios.get(`/api/funcionarios/${i}/cargos`, { headers: { Authorization: 'Bearer' + token } })
                .then(response => {
                    var taref = response.data;
                    var listaTarefa = taref.cargo;
                    listaTarefa.forEach(listTa => {
                       // var row = cargos.insertRow();
                        //console.log(listTa);
                        var cell2 = row.insertCell(2);
                        //cell2.innerHTML = lista.id
                        cell2.innerHTML = listTa.cargos_tarefas

                        var cell3 = row.insertCell(3);
                        cell3.innerHTML = listTa.cargos_descricao

                        var btEditar = document.createElement('button')
                        btEditar.innerText = 'Editar'
                        
                        var btExcluir = document.createElement('button')
                        btExcluir.innerText = 'Excluir'

                        var cell4 = row.insertCell(4);
                        cell4.appendChild(btEditar);
               
                        cell4.appendChild(btExcluir);

                        
                        var idcarg = listTa.id;
                        var idfunc = listTa.funcionario_id;
                        
                        console.log(idfunc,idcarg);
                        
                        btEditar.onclick = function(){
                            alert('Codigo do Funcionario: '+idfunc+' Codigo da tarefa para editar: '+idcarg);
                            window.location.href = '/editarCargo';
                        }
                        
                        btExcluir.onclick = function(){
                            var id = idfunc;
                            var idCar = idcarg;
                    
                            axios.delete(`/api/funcionarios/${id}/cargos/${idCar}`, { headers: { Authorization: 'Bearer' + token } })
                            .then(response => {
                                window.location.href = '/home1';
                            })

                            .cath(error => {
                            alert(error.response.data.error)
                            })
                        
                        }
                        

                    })

                    
                    


                })
                
            })

        
        })

           
        function cadastrarCargo(){
            window.location.href = '/cadastraCargo';
        }

        function inicio(){
            window.location.href = '/';
        }
  
    </script>
    
    
  
    
</html>