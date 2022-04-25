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
    <script defer src="../arquivos_js/all.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="dashboard.css?v1.0" rel="stylesheet">
    <style>
      #card-xs{
        height:58vh;
      }
      
      @media (max-width:321px) {
        #card-xs{
          height: 75vh;
        }
      }
    </style>
</head>
<body>
  <div class="container-full">
      <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top flex-md-nowrap" style="border-bottom: 1px solid #c2c1c1c7;left:0px">
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
                       <a class="nav-link text-d link active" href="taxas_juros.php">Taxas de Juros dos Bancos Comercias</a>
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
              <div class="card mt-3 mt-md-5 mb-5">
              <div class="card-header">
                <h1 class="display-4">Taxas de Juros dos Bancos Comercias</h1>
              </div>
              <!--Corpo Do Card-->
              <div class="card-body" id='container_table'>
                    <div class="row mt-0">
                        <div class="col">
                            <table class="table" >
                                <tbody>
                                 <tr>
                                     <td></td><td><strong>Depósitos&nbsp;a prazo</strong></td>
                                 </tr>
                                 <tr>
                                     <td><strong>BANCOS COMERCIAIS</strong></td>
                                     <td><strong>30 dias</strong></td>
                                     <td><strong>90 dias</strong></td>
                                     <td><strong>360 dias</strong></td>
                                 </tr>
                                 <tr id='ATL'>
                                     <td>Banco Millenium Atlântico – (ATL)</td>
                                     <td>3,50%</td>
                                     <td>5,00%</td>
                                     <td>7,00%</td>
                                 </tr>
                                 <tr id='BAI'>
                                     <td>Banco Angolano de Investimentos – (BAI)</td>
                                     <td>4,50%</td>
                                     <td>7,00%</td>
                                     <td>11,0%</td>
                                 </tr>       
                                 <tr id='BCA'>
                                     <td>Banco Comercial Angolano – (BCA)</td>
                                     <td>2,00%</td>
                                     <td>2,00%</td>
                                     <td>2,50%</td>
                                 </tr>
                                 <tr id='BCI'>
                                     <td>Banco Comércio e Indústria – (BCI)</td>
                                     <td>5,00%</td>
                                     <td>7,00%</td>
                                     <td>9,00%</td>
                                 </tr>
                                 <tr id='BE'>
                                     <td>Banco Económico – (BE)</td>
                                     <td>–</td>
                                     <td>–</td>
                                     <td>15,00%</td>
                                 </tr>
                                 <tr id='BFA'>
                                     <td>Banco de Fomento Angola – (BFA)&nbsp;</td>
                                     <td>5,00%</td>
                                     <td>9,00%</td>
                                     <td>9,00%</td>
                                 </tr>
                                 <tr id='BIC'>
                                     <td>Banco BIC – (BIC)</td>
                                     <td>7,75%</td>
                                     <td>8,75%</td>
                                     <td>–</td>
                                 </tr>
                                 <tr id='BNI'>
                                     <td>Banco de Negócios Internacional – (BNI)</td>
                                     <td>8,72%</td>
                                     <td>8,96%</td>
                                     <td>9,20%</td>
                                 </tr>
                                 <tr id='BPC'>
                                     <td>Banco de Poupança e Crédito – (BPC)</td>
                                     <td>2,50%</td>
                                     <td>4,10%</td>
                                     <td>8,83%</td>
                                 </tr>
                                 <tr id='FNB'>
                                     <td>Finibanco Angola – FNB</td>
                                     <td>2,50%</td>
                                     <td>4,00%</td>
                                     <td>5,00%</td>
                                 </tr>
                                 <tr id='BKEVE'>
                                     <td>Banco Keve – (BKEVE)</td>
                                     <td>5,00%</td>
                                     <td>6,50%</td>
                                     <td>8,00%</td>
                                 </tr>
                                 <tr id='SBA'>
                                     <td>Standard Bank Angola – (SBA)</td>
                                     <td>–</td>
                                     <td>4,00%</td>
                                     <td>4,75%</td>
                                 </tr>
                                 <tr id='BSOL'>
                                     <td>Banco Sol – (BSOL)</td>
                                     <td>0,40%</td>
                                     <td>3,12%</td>
                                     <td>4,30%</td>
                                 </tr>
                             </tbody>
                           </table>
                        </div>
                    </div>
                    </div>
               </div>
             <!--Card Fim-->

             <!--Card-->
             <div class="card mb-3" id='container_calculo'>
             <div class="card-header">
                  <h1 class="display-4">Calculo de Juros dos Bancos Comercias (Deposito a prazo)</h1>
                </div>
                <!--Corpo Do Card-->
                <div class="card-body">
                      <div class="row mt-0">
                          <div class="col">
                            
                             <p>Calcule quanto de juros você vai ganhar. E com base nisso determine o melhor para fazer as suas poupanças. Deposite um valor entre 50.000kz e 5.000.000 kz</p>
                             <div class="row mt-4">
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <input type="number" class="form-control" placeholder="Digite o valor" id="moeda_valor" />
                                </div>
                                <div class="col-md-4 mb-2 mb-md-0">
                                    <select class="form-control" id="dias">
                                        <option value="">Os dias</option>
                                        <option value="0">30 dias</option>
                                        <option value="1">90 dias</option>
                                        <option value="2">360 dias</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" id="banco" onchange='taxaJuros(this.value)'>
                                        <option value="">Selecione um banco</option>
                                        <option value="BPC">Banco de Poupança e Crédito – (BPC)</option>
                                        <option value="BIC">Banco BIC – (BIC)</option>
                                        <option value="BCA">Banco Comercial Angolano – (BCA)</option>
                                        <option value="BAI">Banco Angolano de Investimentos – (BAI)</option>
                                        <option value="BE">Banco Económico – (BE)</option>
                                        <option value="BCI">Banco Comércio e Indústria – (BCI)</option>
                                        <option value="BSOL">Banco Sol – (BSOL)</option>
                                        <option value="BFA">Banco de Fomento Angola – (BFA)</option>
                                        <option value="BNI">Banco de Negócios Internacional – (BNI)</option>
                                        <option value="BKEVE">Banco Keve – (BKEVE)</option>
                                        <option value="FNB">Finibanco Angola – FNB</option>
                                        <option value="ATL">Banco Millenium Atlântico – (ATL)</option>
                                        <option value="SBA">Standard Bank Angola – (SBA)</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-primary mt-2" onclick='fResultado()'>
                                      Calcular
                                    </button>
                                  </div>
                              </div>
                             <div class="row mt-3">
                                <div class="col-md-8" style="height:20vh;">
                                  
                                  <label class="display-4 ml-5" style="font-size: " id='resultado'>0</label>
                                  <span class="display-4" style="font-size: 20px;">Kz</span>
                                </div>
                                
                              </div>

                              
                          </div>
                      </div>
                      
               </div>
  
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

    <script>
      function validarValorMoeda() {
        alert('aqui')
      }
      function esconderContainer() {
       
        var width=window.innerWidth
        var check=document.getElementById('check')
        if (width<=767.98 && !check.checked) {
          document.getElementById('container').style.display='none'
        } else {
          document.getElementById('container').style.display='block'
        }
      }
    </script>
</body>
</html>