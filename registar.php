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

  <div class="container-full">
    <nav class="navbar navbar-expand-md navbar-light bg-white  sticky-top flex-md-nowrap" style="border-bottom: 1px solid #c2c1c1c7;left:0px">
        <a class="navbar-brand text-dark" href="#">
           <img src="img/logo.png" class="bg-primary img_logo" width="50" height="35" alt="Orçamento pessoal">
           <span class="h5">Orçamento Pessoal</span>
        </a>
        <label class="navbar-toggler collapsed" for='check' data-toggle="collapse" data-target="#sidebarMenu" onclick='esconderContainer()'>
          <span class="navbar-toggler-icon"></span>
        </label>  
        <input type="checkbox" id="check" style='display:none'>
      </nav>
    <div class="container-fluid">
       <!--Row-->
       <div class="row">

        <!--Sidebar-->
          <div id="sidebarMenu" class="d-md-block col-sm-12 col-md-3 sidebar collapse" style="height:100%;box-shadow: 5px 0 5px -2px rgb(16 42 67 / 10%);">
                <div class="mt-3 sidebar-sticky p-3" style='background-color: #f1f1f1'>
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
                    
                     <h3 class='pl-2'>Painel</h3>

                     <ul class="nav flex-column" style="width: 100%;">
                       <a class="nav-link text-d link" href="converter.php">Conversor Moeda</a>
                       <a class="nav-link text-d link" href="taxas_juros.php">Taxas de Juros dos Bancos Comercias</a>
                       <a class="nav-link text-d link active" href="registar.php">Registar de Despesas</a> 
                       <a class="nav-link text-d link" href="consulta.php">Consultar Despesas</a>
                     </ul>
                  </div>
          </div>
      
          <!--Conteudo-->
          <div class="container col-sm-12 col-md-8 mr-sm-5" id='container' >
                <div class="clearfix p-1 p-md-2" style=" border-bottom: 1px solid #c2c1c1c7;">
                <a href='editar_perfil.php' class='d-inline-block d-md-none text-dark'> <img src="img/<?=$qtn_img[0]->name_img?>" width="50" height="35"> <strong><?= $_SESSION['nome'] ?></strong> ></a>   <a href="home.php" class='link-home'>Home</a>
                   <a href="php/logoff.php" class="btn btn-outline-primary float-right">Sair</a>
                 </div>
              <!--Card-->
              <div class="card mt-3 mb-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header">
                      <h1 class="display-4">Registro Despesa</h1>
                    </div>
                <!--Card Body-->
                <div class="card-body" id='container_table'>
                     <!-- Form-->
                  <form action="php/function.php" method="get" id='form'>
                  <?php if (isset($_GET['sucesso']) && isset($_GET['sucesso'])==1) { ?>
                  <div class="row clearfix" id='success'>
                    <h1 class='text-success h5 ml-3 pl-3 mb-3' style='border:1px solid #28a745; width:97%; border-radius:5px;padding:10px'>
                      Cadastro Feito Com Sucesso
                    </h1>
                  </div>
                  <?php  } ?>
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
                        <input type="text" class="form-control" name="descricao" placeholder="Descrição" id="descricao" />
                      </div>
                      <div class="col-md-2 pr-md-0 pl-md-0">
                        <input type="number" class="form-control" name="valor" placeholder="Valor" id="moeda_valor" />
                      </div>
                    </div>
                    <!--Inputs Fim-->
                    <!--Button-->
                    <div class="row mt-3 mb-3">
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" name="submit">
                          <!--<i class="fas fa-plus"></i>-->
                          Cadastrar
                        </button>
                      </div>
                    </div>
                    <!--Button Fim--> 
                  </form>
      
                  <div class="row mt-2 mt-md-3">
                    <div class="col-12 mt-4 mt-md-4">
                    <div class="table-responsive">
                      <table class="table table-striped table-lg" >
                        <thead>
                            <th>Tipo De Despesa</th>
                            <th>Descrição</th>
                            <th>Data De Registro</th>
                            <th>Valor Gasto</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php foreach ($listar as $value) {?>
                            <tr id='tr_<?= $value->id_despesa ?>'>
                              <td><?= $value->tipo_despesa ?></td>
                              <td><?= $value->descricao ?></td>
                              <td><?= $value->data_cadastro ?></td>
                              <td class='text-center'><?= $value->valor_despesa ?></td>
                              <td class='text-center' style='cursor:pointer' onclick='editarRegistro(<?= $value->id_despesa ?>)'><i class="fas fa-edit"></i></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
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
  </div>
    <script src="js/function.js"></script>
    <script src="js/validacoes.js"></script>

</body>
</html>