<?php
  require 'php/function.php';
  if (isset($_SESSION['autentico']) && $_SESSION['autentico']) {
    header('Location:home.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">

    <script src="arquivos_js/jquery-3.2.1.slim.min.js"></script>
    <script src="arquivos_js/popper.min.js"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script defer src="arquivos_js/all.js"></script>

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
      .card{
        height:355px;
        box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);
      }
      @media (max-width:991.98px) {
        .text-link{
          margin-left:40px
        }
        .card-login{
          padding:12px;
        }
        .navbar-brand img{
          width:45px
        }
        .h3, h3 {
            font-size: 1.6rem;
        }
        
      }
      @media (max-width:767.98px) {
        #img{
          display:none;
        }
        .card{
            height:375px;
        }
        body{
         height:100vh;
         margin-bottom:30px;
        }
      }
      @media (max-width:575.98px) {
        
        .h3, h3 {
            font-size: 1.4rem;
        }
        .card-login{
          padding:15px;
        }
      }
      
    </style>

</head>
<body>
    <div class="container">
      <section class="card-login">
       <!--Row-->
       <div class="row">
          <!--Conteudo-->
          <div class="col-sm-12 col-md-12 mt-0 mt-md-3" id='container'>
                
              <!-- Card -->
           <div class="card mt-3 mt-md-5">
               <div class="row" style='height:100%'>
                   <!-- Form -->
                    <div class="col-md-7">
                       <div class="card-body">
                          <form action='confirmar_email.php' method='post'>
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
                                    <input type="email" class="form-control"  id='email' name='email' placeholder="E-mail"  aria-describedby="email_label" onblur="issetEmail()" required>
                                </div>
                             </div>

                             <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="senha_label">
                                        <i class="fas fa-lock"></i>
                                      </span>
                                    </div>
                                    <input type="password" class="form-control" name='senha' id="senha" placeholder="Senha" aria-describedby="senha_label" required onblur="validarSenha()">
                                </div>
                             </div>
                             <button class="mt-4 mb-2 btn btn-primary btn-block" name='cadastrar' type="submit" >Cadastrar</button>
                             <a href="login.php" class='mt-3 d-sm-block d-md-none'> Faça o Login</a>
                            </form>
                            <p class='alert alert-danger ml-4' id='erro' style='display:none'>Este email já existe. Tente outro! </p>
                       </div>
                       
                     </div>
                   <!-- Form Fim -->

                   <!-- Img -->
                    <div class="col-md-5 d-none d-md-block bg-primary b-rad" style='display:flex; flex-direction: column;justify-content: center; text-align:center'>
                        <div class='pt-4'>
                            <a class="navbar-brand text-white mb-4" href="#">
                              <img src="img/logo.png" width="50" height="35" alt="Orçamento pessoal">
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
      function issetEmail() {
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
      function validarSenha() {
        var senha  = document.getElementById('senha').value.length
        var p_erro = document.getElementById('erro')
        if (!(senha>=8 && senha<=15)) {

          p_erro.innerText     = 'Digite uma de no mínimo 8 caractres e no máximo 15'
          p_erro.style.display = 'block';
          setTimeout( ()=>{
              document.getElementById('erro').remove()
          },3000)
          
        }else if(senha==0){
          p_erro.style.display = 'none';
        }
      }
    </script>
</body>
</html>