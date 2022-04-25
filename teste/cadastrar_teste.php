<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">

    <script src="../arquivos_js/jquery-3.2.1.slim.min.js"></script>
    <script src="../arquivos_js/popper.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script defer src="../arquivos_js/all.js"></script>

    <style>
      .card-login {
        padding: 25px;
        margin: 0 auto;
        max-width:800px;
        margin-top:50px;
      }
      .b-rad{
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%)
      }
      .alert {
        padding: .15rem 1.25rem;
        margin-right:1rem;
      }
      .text-link{
        border-radius:20px; 
        width:200px; 
        margin-left:70px
      }
      @media (max-width:991.98px) {
        .text-link{
          margin-left:40px
        }
        
      }
      @media (max-width:767.98px) {
        #img{
          display:none;
        }
        
      }
    </style>

</head>
<body>
    <div class="container" style='height:700px'>
      <section class="card-login">
       <!--Row-->
       <div class="row" style="height:100%;">
          <!--Conteudo-->
          <div class="col-sm-12 col-md-12 mt-0 mt-md-3" id='container' style='height:100%;'>
                
              <!-- Card -->
           <div class="card mt-3 mt-md-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
               <div class="row" style='height:100%'>
                   <!-- Form -->
                    <div class="col-md-7">
                       <div class="card-body">
                          <form>
                            <div class='mb-4 text-center'>
                            <h3 class='text-primary'>Crie uma conta</h3>
                            <hr>
                            </div>
                             <div class="form-group">
                                <div class="input-group mb-3" >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="nome">
                                        <i class="fas fa-user"></i>
                                      </span>
                                    </div>
                                    <input type="text"  class="form-control" name='nome' placeholder="Nome" aria-describedby="nome" required>
                                </div>
                             </div>

                             <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="email_label">
                                        <i class="fas fa-envelope"></i>
                                      </span>
                                    </div>
                                    <input type="email" class="form-control"  id='email' name='email' placeholder="E-mail"  aria-describedby="email_label" onblur="teste()" required>
                                </div>
                             </div>

                             <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="senha">
                                        <i class="fas fa-lock"></i>
                                      </span>
                                    </div>
                                    <input type="password" class="form-control" name='senha' placeholder="Senha" aria-describedby="senha" required>
                                </div>
                             </div>
                             <button class="mt-4 mb-2 btn btn-lg btn-primary btn-block" name='cadastrar' type="submit" >Cadastrar</button>
                             <a href="login_teste.php" class='mt-3 d-sm-block d-md-none'> Faça o Login</a>
                            </form>
                            <p class='alert alert-danger ml-4' id='erro' style='display:none'>Este email já existe. Tente outro! </p>
                       </div>
                       
                     </div>
                   <!-- Form Fim -->

                   <!-- Img -->
                    <div class="col-md-5 d-none d-md-block bg-primary b-rad" style='display:flex; flex-direction: column;justify-content: center; text-align:center'>
                        <div class='pt-4'>
                            <a class="navbar-brand text-white mb-4" href="#">
                              <img src="../img/logo.png" width="50" height="35" alt="Orçamento pessoal">
                              <span>Orçamento Pessoal</span>
                              
                            </a>
                        </div>
                        <div class='mb-5 text-white'>
                            <h3>Olá, Seja Bem Vindo!</h3>
                            <p class='mb-3'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius cum iure enim, veniam, quia facere.</p>
                            <a href="login.php" class="bg-primary mt-4 btn btn-md btn-outline-light text-white d-block text-link" >Login</a>
                        </div>
                    </div>
                    <!-- Img Fim -->
               </div> 
           </div>
           <!--Card Fim-->

          </div>
           <!--Conteudo Fim-->
        </div>
        <!--Row Fim-->
    </div>
    </section>
  </div>
    
  <script src="js/function.js"></script>
    <script>
      function teste() {
        var email  = document.getElementById('email')
        var p_erro = document.getElementById('erro')
        //alert(email.value)
        //Requisição a Taxa de Cambio
        var request_validar = new XMLHttpRequest()

        request_validar.open('POST','php/validar_codigo.php?email='+email.value+'&criar=ok');
        request_validar.onreadystatechange = () =>{
          if (request_validar.readyState == 4 && request_validar.status == 200 ) { 
            var objJsonValidar = request_validar.responseText
            //console.log(objJsonValidar);
            if (objJsonValidar=='Email já existe') {
                email.style.borderColor = "#ff0000";
		        	  email.style.outline     = "#ff0000";
                p_erro.style.display    = 'block';
              setTimeout(() => {
                p_erro.style.display    = 'none';
              }, 4000);
              //alert('Este email já existe, tente outro')
            }
          }else if (request.readyState == 4 && request.status == 404) {
           console.log('Erro na requisição') 
        } 
        }
        request_validar.send()
      }
    </script>
</body>
</html>