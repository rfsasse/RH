<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Registrar</title>
    </head>
    <body>


            <h3>Login</h3>
            
            <form id="loginForm" name="loginForm" method="post" >
            <div class="form-row align-items-center">
                <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Email</label>
                <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Email">
                </div>
                <div class="col-auto">
                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    
                    </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                </div>
                <div class="col-auto">
                
                </div>
                <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Login</button>
                
                </div>
            </div>
            </form>
            <div>Ainda não é cadastrado? <a href="/register">Registrar</a> </div>



            


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

            var loginForm = document.forms["loginForm"];
                
            
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();
                
        
                var email = loginForm.email.value;
                var password = loginForm.password.value
                
                

                axios.post('/api/auth/login',{
                    email,
                    password
                })

                .then(response => {

                    localStorage.setItem('auth', response.data.access_token)
                    window.location.href = '/';
                    
                })

                .cath(error => {
                    alert(error.response.data.error)
                })


            })
            
           
    
        </script>
    
    
  
     </body>
</html>