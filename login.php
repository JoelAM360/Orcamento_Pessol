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
        height:50vh
      }
      .b-rad {
        border-top-left-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
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
            height:370px;
        }
        body{
         height:100vh;
         margin-bottom:30px
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
                
              <!--Card-->
              <div class="card mt-3 mt-md-5">
               <div class="row" style='height:100%;'>
                    <div class="col-md-5 bg-primary b-rad" id='img'>
                        <div class='pt-4'>
                            <a class="navbar-brand text-white mb-4" href="#">
                              <img src="img/logo.png" width="50" height="35" alt="Orçamento pessoal">
                              <span>Orçamento Pessoal</span>
                              
                            </a>
                        </div>
                        <div class='mb-5 text-white text-justify'>
                            <h3>Olá, Seja Bem Vindo!</h3>
                            <p class='mb-3'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius cum iure enim, veniam, quia facere.</p>
                            <a href="cadastro_user.php" class="bg-primary mt-4 btn btn-md btn-outline-light text-white d-block text-link">Cadastre-se</a>
                        </div>
                    </div>
 
                   <div class="col-md-7" id='login'>
                     <!--Card Body-->
                     <div class="card-body">
                       
                         <!-- Form-->
                         <form action='php/function.php' method='post'>
                             <div class='text-center'>
                                 <h3 class='text-primary'>Acesse a sua conta</h3>
                                 <hr>
                             </div>
                             
                              <div class="form-group">
                                
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                       <span class="input-group-text" id="email">
                                         <i class="fas fa-envelope"></i>
                                       </span>
                                     </div>
                                     <input type="email" class="form-control" name='email' placeholder="E-mail"  aria-describedby="email">
                                 </div>
                              </div>
 
                              <div class="form-group mt-4">
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                       <span class="input-group-text" id="senha">
                                         <i class="fas fa-lock"></i>
                                       </span>
                                     </div>
                                     <input type="password" class="form-control" name='senha' placeholder="Senha" aria-describedby="senha">
                                 </div>
                              </div>
                              <button class="mt-3 mb-2 btn btn-primary btn-block" name='login' type="submit" >Entrar</button>
                              <a href="recuperar_senha.php?esquece_senha=1" >Esqueceu a sua senha</a>
                              <a href="cadastro_user.php" class='d-sm-inline d-md-none'> / Cadastre-se</a>
                             </form>
                            <!-- Erro Na Autenticação -->
                             <?php if (isset($_GET['erro']) && $_GET['erro']==1 ) { ?>
                               <p class='alert alert-danger ml-4' id='erro' >Email e/ou Senha Invalida </p>
                             <?php } ?>
                             <?php if (isset($_GET['recuperado']) && $_GET['recuperado']=='ok' ) { ?>
                               <p class='alert alert-warning ml-4' id='erro' >Loga-se com nova senha </p>
                             <?php } ?>
                   
                       </div>
                    </div>
                    <!--Card Body Fim-->
                   </div>
                   
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
</body>
</html>