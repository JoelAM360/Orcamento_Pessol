

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
      
      @media (max-width:575.98px) {
        
        .h3, h3 {
            font-size: 1.4rem;
        }
      }
      
    </style>

</head>
<body style="overflow:hidden;">
    <div class="container" style='height:700px'>
      <section class="card-login">
       <!--Row-->
       <div class="row" style="height:100%;">
          <!--Conteudo-->
          <div class="col-sm-12 col-md-12 mt-0 mt-md-3" id='container' style='height:100%;'>
                
              <!--Card-->
              <div class="card mt-3 mt-md-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
               <div class="row">
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
                            <a href="login.php" class="bg-primary mt-2 btn btn-md btn-outline-light text-white d-block text-link">Login</a>
                            <a href="cadastro_user.php" class="bg-primary mt-2 btn btn-md btn-outline-light text-white d-block text-link">Cadastre-se</a>
                        </div>
                    </div>
 
                   <div class="col-md-7" id='login'>
                     <!--Card Body-->
                     <div class="card-body" style="height:55vh; ">
                       
                         <!-- Form-->
                         <form action='php/function.php' method='post'>
                             <div class='text-center'>
                                 <h3 class='text-primary'>Recuperar conta</h3>
                                 <hr>
                             </div>
                             
                              <div class="form-group">
                              <p style='margin-bottom:27px;font-size:20px'>Insere seu email para recuparar sua senha</p>
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                       <span class="input-group-text" id="email">
                                         <i class="fas fa-envelope"></i>
                                       </span>
                                     </div>
                                     <input type="email" class="form-control" name='email' placeholder="E-mail"  aria-describedby="email">
                                 </div>
                              </div>
 
                              
                              <button class="mt-3 mb-2 btn btn-primary btn-block" name='recuperar' type="submit" >Recuperar</button>
                              <a href="login.php" class='d-sm-inline d-md-none'> Login</a>
                              <a href="cadastro_user.php" class='d-sm-inline d-md-none'> / Cadastre-se</a>
                             </form>
                          
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