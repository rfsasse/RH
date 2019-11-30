<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Api</title>

    

            <h3>Cadastrar Funcionario</h3>
            <form id="cadastrarFuncionario"  method="post">
          
               <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Nome</label>
                    <input type="text" class="form-control" id="funcionario_nome" placeholder="Nome"> 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Profissão</label>
                    <input type="text" class="form-control" id="funcionario_profissao" placeholder="Profissão"> 
                    </div>
                </div>
            
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
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


        var cadastrarFuncionario = document.forms['cadastrarFuncionario'];
        
        cadastrarFuncionario.addEventListener('submit', (e) => {
                e.preventDefault();
                
        
        
            var funcionarios_nome = cadastrarFuncionario.funcionario_nome.value;
            

            var funcionarios_profissao = cadastrarFuncionario.funcionario_profissao.value;
            

            axios.post('/api/funcionarios', {funcionarios_nome,funcionarios_profissao}, { headers: { Authorization: 'Bearer' + token } })
            .then(response => {

            window.location.href = '/';
            
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