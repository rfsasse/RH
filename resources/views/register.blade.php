<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Api</title>
    </head>
    <body>

   

            <h3>Registrar usuário</h3>
            <form id="registrar" name="registrar" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="registraEmail" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="registraSenha" placeholder="Password">
                    </div>
                </div>
                
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">Nome</label>
                    <input type="text" class="form-control" id="registraNome" placeholder="Nome"> 
                    </div>
                
                
                </div>
            
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>


            <br/>
           


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!--  codificar apartir deste ponto -->        
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script>

        
          
      
            





            var token = localStorage.getItem('auth');
            
            if (token)
                window.location.href = '/';

            //var loginForm = document.forms["loginForm"];
                
            
           
            
            var registrar = document.forms["registrar"];
            
            registrar.addEventListener('submit', (e) => {
                e.preventDefault();
                


                var email = registrar.registraEmail.value;
                
                var password = registrar.registraSenha.value;
                
                var name = registrar.registraNome.value;
                
               

                axios.post('http://127.0.0.1:8000/api/auth/register',{
                    name,
                    email,
                    password
                
                    
                })

                .then(response => {
                    window.location.href = '/login';
                    
                })

                .cath(error => {
                    alert(error.response.data.error)
                })

            })




           

    
        </script>
    
    
  
     </body>
</html>