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
    <!--
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    Font Awesome 
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>-->

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
           <img src="img/logo.png" class="bg-primary" width="50" height="35" alt="Orçamento pessoal">
           <span class="h5">Orçamento Pessoal</span>
        </a>
        <label class="navbar-toggler collapsed" for='check' data-toggle="collapse" data-target="#sidebarMenu" onclick='esconderContainer()'>
          <span class="navbar-toggler-icon"></span>
        </label>  
        <input type="checkbox" id="check" style='display:none'>
      </nav>
     
  <div class="container-fluid" style="height:90vh;">
    
       <!--Row-->
       <div class="row" style="height:100%;">

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
                       <a class="nav-link text-d link" href="registar.php">Registar de Despesas</a> 
                       <a class="nav-link text-d link active" href="consulta.php">Consultar Despesas</a>
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
              <div class="card mt-3 mb-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header">
                      <h1 class="display-4">Consultar Despesa</h1>
                    </div>
                    <!--Card Body-->
                    <div class="card-body" id='container_table'>
                      <h5>Filtar Dados</h5>
                       <!-- Form-->
                       <form class="row mt-2 mt-md-4" action="php/function.php" method="get">
                          <div class="col-md-4 mb-2 mb-md-0">
                            <select class="form-control" id="mes" name='mes'>
                              <option value="">Mês</option>
                              <option value="01">Janeiro</option>
                              <option value="02">Fevereiro</option>
                              <option value="03">Março</option>
                              <option value="04">Abril</option>
                              <option value="05">Maio</option>
                              <option value="06">Junho</option>
                              <option value="07">Julho</option>
                              <option value="08">Agosto</option>
                              <option value="09">Setembro</option>
                              <option value="10">Outubro</option>
                              <option value="11">Novembro</option>
                              <option value="12">Dezembro</option>
                            </select>
                          </div>
                        
                          <div class="col-md-6 mb-2 mb-md-0">
                            <select class="form-control" id="tipo" name='tipo'>
                              <option value="">Tipo</option>
                              <option value="Alimentação">Alimentação</option>
                              <option value="Educação">Educação</option>
                              <option value="Lazer">Lazer</option>
                              <option value="Saúde">Saúde</option>
                              <option value="Transporte">Transporte</option>
                            </select>
                          </div>
                          
                          
                          <div class="col-md-2 mb-2 mb-md-0 d-flex justify-content-end">
                             <button type="submit" class="btn btn-primary" name='filtrar'>
                               Filtrar
                               <!--<i class="fas fa-search"></i>-->
                             </button>
                          </div>
                        </form>
      
                      <div class="row mt-2 mt-md-3">
                        <div class="col-12 mt-4 mt-md-4">
                          <div class="table-responsive">
                        <table class="table table-striped table-lg">
                          <thead>
                            <th>Tipo De Despesa</th>
                            <th>Descrição</th>
                            <th>Data De Registro</th>
                            <th>Valor Gasto</th>
                            <th>Ação</th>

                          </thead>

                          <tbody>
                            <?php if (isset($_GET['filtrado'])) {?>
                              <?php foreach ($_SESSION['filtrar'] as $value) {?>
                                <tr>
                                  <td><?= $value->tipo_despesa ?></td>
                                  <td><?= $value->descricao ?></td>
                                  <td><?= $value->data_cadastro ?></td>
                                  <td><?= $value->valor_despesa ?></td>
                                  <td>
                                    <a href="" class='btn text-success' data-toggle="modal" data-target="#id_despesa_<?= $value->id_despesa ?>">Feito</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="id_despesa_<?= $value->id_despesa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Feito</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Esta ação excluirá este registro.
                                            <h6>Deseja continuar?</h6>
                                          </div>
                                          <div class="modal-footer">
                                            <a class="btn btn-secondary" data-dismiss="modal">Não</a>
                                            <a href="php/function.php?id_despesa=<?= $value->id_despesa ?>" class="btn btn-danger">Sim</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
                            <?php } else{?>
                              <?php foreach ($listar as $value) {?>
                                <tr>
                                  <td><?= $value->tipo_despesa ?></td>
                                  <td><?= $value->descricao ?></td>
                                  <td><?= $value->data_cadastro ?></td>
                                  <td><?= $value->valor_despesa ?></td>
                                  <td>
                                    <a class='btn text-success' data-toggle="modal" data-target="#id_despesa_<?= $value->id_despesa ?>">Feito</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="id_despesa_<?= $value->id_despesa ?>" tabindex="-1" aria-labelledby="label_<?= $value->id_despesa ?>" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="label_<?= $value->id_despesa ?>">Feito</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Esta ação excluirá este registro.
                                            <h6>Deseja continuar?</h6>
                                          </div>
                                          <div class="modal-footer">
                                            <a class="btn btn-secondary" data-dismiss="modal">Não</a>
                                            <a href="php/function.php?id_despesa=<?= $value->id_despesa ?>" class="btn btn-danger">Sim</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              <?php } ?>
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
    <!--<script src="js/function.js"></script>
    <script src="js/responsividade.js"></script>-->
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