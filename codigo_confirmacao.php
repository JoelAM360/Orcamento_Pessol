
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
        max-width:400px;
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
                
                   <div class="col-md" id='login'>
                     <!--Card Body-->
                     <div class="card-body" style="height:63vh; ">
                       
                         <form action='php/function.php' method='post'>
                            <div class='text-center'>
                                <h3 class='text-primary'>Código recuperação</h3>
                                <hr>
                            </div>
                            
                             <div class="form-group">
                               <p style='margin-bottom:27px;font-size:20px'>Insere o código recuperação que enviamos para o seu e-amil</p>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="codigo_re">
                                        <i class="fas fa-check"></i>
                                      </span>
                                    </div>
                                    <input type="text" class="form-control" id='codigo' name='codigo' placeholder="Digite o código"  aria-describedby="codigo_re">
                                </div>
                             </div>
                             <button class="mt-3 mb-2 btn btn-primary btn-block" name='confirmar' type="submit" >Confirmar</button>
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