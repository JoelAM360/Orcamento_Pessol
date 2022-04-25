<?php
  require 'php/function.php';
  if (isset($_SESSION['autentico']) && $_SESSION['autentico']) {
    $listar=listar($_SESSION['id_user']);
    require_once 'php/pegar_foto.php';
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
    <link rel="stylesheet" href="css/style.css">
    <link href="dashboard.css?v1.0" rel="stylesheet">
</head>
<body>



  <div class="container-fluid" style="height:90vh;">
    <nav class="navbar navbar-expand-md navbar-light bg-white  sticky-top flex-md-nowrap p-2 " style="border-bottom: 1px solid #c2c1c1c7;left:0px">
      <a class="navbar-brand text-dark" href="#">
         <img src="img/logo.png" class="bg-primary img_logo" width="50" height="35" alt="Orçamento pessoal">
         <span class="h5">Orçamento Pessoal</span>
      </a>
      <label class="navbar-toggler collapsed" for='check' data-toggle="collapse" data-target="#sidebarMenu" onclick='esconderContainer()'>
        <span class="navbar-toggler-icon"></span>
      </label>  
      <input type="checkbox" id="check" style='display:none'>
    </nav>

       <!--Row-->
       <div class="row" style="height:100%;">

        <!--Sidebar-->
          <div id="sidebarMenu" class="d-md-block col-sm-12 col-md-3 sidebar collapse" style="height:100%;box-shadow: 5px 0 5px -2px rgb(16 42 67 / 10%);">
             <div class="sidebar-sticky bg-white mt-3 p-3" style='background-color: #f1f1f1'>
                <div class='user mb-1 d-none d-md-block'>
                   <div class="row">
                      <div class="col-md-4">                                
                        <img src="img/<?=$qtn_img[0]->name_img?>" class="bg-primary img-user">
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
              <div class="card mt-3 mt-md-5 mb-4" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header">
                      <h1 class="display-4">Editar Despesa</h1>
                    </div>
                    <!--Card Body-->
                    <div class="card-body" style='height:259px; overflow:auto'>
                       <!-- Form-->
                       <form action="php/function.php" method="post">
                            <!--Inputs-->
                            <div class="row mb-2">
                              <div class="col-md-4 mb-2 mb-md-0">
                                <select class="form-control" id="tipo" name="tipo" onchange='verificarOutros()'>
                                  <option value=''>Tipo</option>
                                  <option value="Alimentação">Alimentação</option>
                                  <option value="Educação">Educação</option>
                                  <option value="Lazer">Lazer</option>
                                  <option value="Saúde">Saúde</option>
                                  <option value="Transporte">Transporte</option>
                                  <option value="outras" id='outros'>Outras...</option>
                                </select>
                                <input type="text" class="form-control mt-2" name="tipo_outros" id="tipo_outros" placeholder='Especifique sua despesa' style='display:none' onblur="removerInput()">
                              </div>
                             <div class="col-md-6 mb-2 mb-md-0">
                               <input type="text" class="form-control" name="descricao" placeholder="Descrição" id="descricao" value='<?= $_GET['descricao'] ?>'/>
                             </div>
                             <div class="col-md-2">
                               <input type="text" class="form-control" name="valor" placeholder="Valor" id="valor"  value='<?= $_GET['valor'] ?>'/>
                             </div>
                           </div>
                           <input type="hidden" name="id_despesa" value='<?= $_GET['id'] ?>'>
                           <!--Inputs Fim-->
                           <!--Button-->
                           <div class="row mt-3 mb-3">
                             <div class="col-md-2">
                               <button type="submit" class="btn btn-primary" name="editar">
                                 <!--<i class="fas fa-plus"></i>-->
                                 Atualizar
                               </button>
                             </div>
                           </div>
                           <!--Button Fim-->

                        </form>
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
    </script>
</body>
</html>