<?php
  require 'php/function.php';
  if (isset($_SESSION['autentico']) && $_SESSION['autentico']) {
    $listar=listar($_SESSION['id_user']);
    //print_r($listar);
    require_once 'php/pegar_foto.php';
    
    //
  }else {
    header('Location:login.php?erro=2');
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
    <link rel="stylesheet" href="css/style.css?v4.0">
    <link href="dashboard.css?v1.0" rel="stylesheet">
</head>
<body id='teste' style='height:100vh'>



  <div class="container-fluid" style="height:90vh;">
    <nav class="navbar navbar-expand-md navbar-light bg-white  sticky-top flex-md-nowrap p-2 " style="border-bottom: 1px solid #c2c1c1c7;left:0px">
      <a class="navbar-brand text-dark" href="#">
         <img src="img/logo.png" class="bg-primary" width="50" height="35" alt="Orçamento pessoal">
         <span class="h5">Orçamento Pessoal</span>
      </a>
      <label class="navbar-toggler collapsed p-1 mr-3" for='check' data-toggle="collapse" data-target="#sidebarMenu" onclick='esconderContainer()'>
        <span class="navbar-toggler-icon"></span>
      </label>  
      <input type="checkbox" id="check" style='display:none'>
    </nav>

       <!--Row-->
       <div class="row" style="height:100%;">

        <!--Sidebar-->
          <div id="sidebarMenu" class="d-md-block col-sm-12 col-md-3 sidebar collapse" style="height:100%;box-shadow: 5px 0 5px -2px rgb(16 42 67 / 10%);">
                <div class="mt-3 sidebar-sticky p-3" style='background-color: #f1f1f1'>
                      <div class='user mb-1 d-none d-md-block'>
                         <div class="row">
                           <div class="col-md-4">
                              <img src="img/<?=$img?>" class="bg-primary img-user">
                           </div>
                           <div class=" col-sm-12 col-md-8 mt-2">
                           <a href="editar_perfil.php" class='name_user text-dark'><strong><?= $_SESSION['nome'] ?></strong></a>
                           </div>
                          
                         </div>
                         
                      </div>
                      <hr class='d-none d-md-block'>
                    
                     <h3 class='pl-2'>Menu</h3>
                     <ul class="nav flex-column" style="width: 100%;">
                       <a class="nav-link text-d link" href="converter.php">Conversor Moeda</a>
                       <a class="nav-link text-d link" href="taxas_juros.php">Taxas de Juros dos Bancos Comercias</a>
                       <a class="nav-link text-d link" href="registar.php">Registar de Despesas</a> 
                       <a class="nav-link text-d link" href="consulta.php">Consultar Despesas</a>
                     </ul>
                  </div>
          </div>
      
          <!--Conteudo-->
          <div class="container col-sm-12 col-md-8 mr-sm-5" id='container'>
                <div class="clearfix p-1 p-md-2" style=" border-bottom: 1px solid #c2c1c1c7;">
                   <a href='editar_perfil.php' class='d-inline-block d-md-none text-dark'> <img src="img/<?=$qtn_img[0]->name_img?>" width="50" height="35"> <strong><?= $_SESSION['nome'] ?></strong> ></a>   <a href="home.php" class='link-home'>Home</a>
                   <a href="php/logoff.php" class="btn btn-outline-primary float-right">Sair</a>
                 </div>
              <!--Card-->
              <div class="card mt-3 mb-4" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header">
                      <h1 class="display-4">Editar Despesa</h1>
                    </div>
                    <!--Card Body-->
                    <div class="card-body card-perfil"> 
                        <div class="row mt-0" style='height:100%'>

                            <div class="col-sm-4 mt-4">
                               <div class='upload_img' id='upload_img'>
                                     <div class="image" id='div_img'>
                                        <img src="" alt="" id='img'>
                                     </div> 
                                     <div class="content">
                                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i> </div>
                                        <div class="text">Click p/selecionar a foto</div>
                                     </div>   
                                     
                                     <div id="cancel-btn"><i class="fas fa-times"></i></div>
                               </div>
                              
                               
                                <form action="php/upload.php" enctype="multipart/form-data" method="post">    
                                    <input class='d-none' type="file" name="image" id='default-btn'>
                                    <input class='form-control btn-sm btn-outline-primary mt-1 mb-3' type="submit" value="Carregar Foto" id='submit'>
                                </form>
                            </div>
                            <div class="col-sm-8" >
                                <form action="php/function.php" method="post" >
                                  <div class="">
                                    <label for=""><strong>Nome:</strong></label>
                                    <input type="text" class="form-control" name="nome" placeholder="Jhon Doe" id="descricao"  value ='<?= $_SESSION['nome']?>'/>
                                  </div>
                                  <div class="">
                                  <label for=""><strong>Email:</strong></label>
                                    <input type="text" class="form-control" name="email" placeholder="exemplo@gmail.com" id="descricao" value ='<?= $_SESSION['email']?>' />
                                  </div>
                                  <div class="">
                                  <label for=""><strong>Senha:</strong></label>
                                    <input type="password" class="form-control" name="senha" placeholder id="senha" />
                                  </div>
                                  <div class="">
                                    <label for=""><strong>Confirmar Senha:</strong></label>
                                    <input type="password" class="form-control" name="conf_senha" placeholder="" id="conf_senha"/>
                                  </div>
                                  <div class="mt-2">
                                    <input type="submit" class="form-control btn-primary" name="salvar" id="salvar" value='Salvar'/>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Card Body Fim-->
               </div>
             <!--Card Fim-->
          </div>
           <!--Conteudo Fim-->
        </div>
        <!--Row Fim-->
    </div>
    <script src="js/function.js"></script>
    <script src="js/responsividade.js"></script>
    <script>
      function esconderContainer() {
       
        var width=window.innerWidth
        var check=document.getElementById('check')
        if (width<=575.98 && !check.checked) {
          document.getElementById('container').style.display='none'
        } else {
          document.getElementById('container').style.display='block'
        }
      }

      var defautBtn = document.querySelector("#default-btn")
      var div_img   = document.querySelector("#div_img")
      var img       = document.querySelector("#img")
      var cancel_btn= document.querySelector("#cancel-btn")

      var upload_img= document.querySelector("#upload_img")
      
      div_img.addEventListener('click', () => {
          defautBtn.click()
      })

      defautBtn.addEventListener('change',(e) => {
              const file = e.target.files[0]
              console.log(file);
              if (file) {
                  const reader = new FileReader()

                  reader.onload = () => {
                      const result = reader.result
                      img.src=result
                      img.style.display='block'
                      upload_img.classList.add('active1')

                     cancel_btn.addEventListener('click', () => {
                      img.style.display='none'
                      upload_img.classList.remove('active1')
                     })
                  }
                  reader.readAsDataURL(file)
              }
      })
    </script>
</body>
</html>