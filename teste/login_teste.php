

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
<body>
    <div class="container" style='height:700px'>
      <section class="card-login">
          <!--Conteudo-->
          <div class="mt-0 mt-md-3" id='container'>
                
              <!--Card-->
              <div class="card mt-3 mt-md-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                <!--Row-->
                 <div class="row">

                    <div class="col-md-5 bg-primary b-rad" id='img'></div>
 
                    <div class="col-md-7" id='login'>
                      <!--Card Body-->
                      <div class="card-body"></div>
                     <!--Card Body Fim-->
                    </div>

                  </div>
               <!--Row-->  
              </div>
             <!--Card Fim-->
          </div>
          
        </div>
         <!--Conteudo Fim-->
    </section>
  </div>
    
</body>
</html>