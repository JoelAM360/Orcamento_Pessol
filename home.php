<?php
  require 'php/function.php';
  if (isset($_SESSION['autentico']) && $_SESSION['autentico']) {
    $valor_depesas=getValorDepesas($_SESSION['id_user']);
    
    $listarHistorico=listarHistorico($_SESSION['id_user']);

    require_once 'php/pegar_foto.php';
    print_r($listarHistorico);
    if (!empty($listarHistorico)) {
        $qtd_valor=0;
        foreach ($listarHistorico as $value) {
          $qtd_valor=$qtd_valor+$value->valor_despesa;
        }
        $valor_atual=$valor_depesas[0]->valor_mes  - $qtd_valor;
        setValorAtual_Gasto($_SESSION['id_user'],$valor_atual,$qtd_valor);
    }elseif(empty($listarHistorico)){
      $qtd_valor='Nenhum gasto feito';
      $valor_atual=$qtd_valor;
    }

   if (!empty($_SESSION['filtro_historico'])) {
    $mes=date('M',strtotime($_SESSION['filtro_historico'][0]->data_cadastro));
   }
   
  }else {
    header('Location:login.php');
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
    <link href="dashboard.css?v3.0" rel="stylesheet">
</head>
<body onload='AtulizarPag()'>

  <div class="container-full" style="height:90vh;">
    <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top flex-md-nowrap" style="border-bottom: 1px solid #c2c1c1c7;left: 0px;">
      <a class="navbar-brand text-dark" href="#">
         <img src="img/logo.png" class="bg-primary" width="50" height="35" alt="Orçamento pessoal">
         <span class="h5">Orçamento Pessoal</span>
      </a>
      <label class="navbar-toggler collapsed mr-sm-3" for='check' data-toggle="collapse" data-target="#sidebarMenu" onclick='esconderContainer()'>
        <span class="navbar-toggler-icon"></span>
      </label>  
      <input type="checkbox" id="check" style='display:none'>
    </nav>
    <div class="container-fluid">
      
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
                    <a href="editar_perfil.php" class='d-inline-block d-md-none text-dark'> <img src="img/<?=$qtn_img[0]->name_img?>" width="50" height="35"> <strong><?= $_SESSION['nome'] ?></strong>  ></a>  <a href="home.php" class='link-home'>Home</a>
                    <a href="php/logoff.php" class="btn btn-outline-primary float-right">Sair</a>
                 </div>

            <div class="d-flex justify-content-md-between flex-column flex-md-row mt-3" id='conteinar_valores'>
                <!-- Card Valor Do Més -->
                    <div class="card mt-3 mt-md-0 card_item">
                    <div class="card-header text-center"><strong> Valor do Més</strong></div>
                           <!--Card Body-->
                          <div class="card-body" id='card-form'>
                                <?php if (isset($_GET['salvar']) && $_GET['salvar']=='ok' && !($valor_depesas[0]->valor_mes==0)) {?>
                                  <div id='content_valor' class='d-flex justify-content-center'>
                                   <h5 class='text-center d-inline' id='h5' style='font-size:30px; font-weight:340 ;'><?= $valor_depesas[0]->valor_mes?></h5>
                                   <span  style='position:relative;bottom:15px;left:15px;cursor:pointer' onclick='setValorDespesa()'><i class="fas fa-edit"></i></span>
                                  </div>
                                <?php } if (!(isset($_GET['salvar']) && $_GET['salvar']=='ok' && !($valor_depesas[0]->valor_mes==0)) && $valor_depesas[0]->valor_mes!=0) {?>
                                  <div id='content_valor' class='d-flex justify-content-center'>
                                    <h5 class='text-center d-inline' id='h5' style='font-size:30px; font-weight:340 ;'><?= $valor_depesas[0]->valor_mes?></h5>
                                    <span style='position:relative;bottom:15px;left:15px;cursor:pointer' onclick='setValorDespesa()'><i class="fas fa-edit"></i></span>
                                  </div>
                                <?php }elseif ($valor_depesas[0]->valor_mes==0) { ?>
                                   <p class="d-flex justify-content-center align-items-center pt-3 text-primary" id='plus_p' style='cursor:pointer;font-size:22px' onclick='setValorDespesa()'><i class="fas fa-plus"></i></p>
                                <?php } ?>
                          </div>
                           <!--Card Body Fim-->
                      </div>
                <!--Card Fim-->

                <!-- Card Valor Do Atual -->
                <div class="card mt-3 mt-md-0 card_item">
                    <div class="card-header text-center"><strong> Valor Atual</strong></div>
                           <!--Card Body-->
                           <div class="card-body">
                                <div class='d-flex justify-content-center'>
                                    <h5 class='text-center d-inline' style='font-size:30px; font-weight:340 ;'><?=  $valor_atual?></h5>
                                </div>
                             </div>
                           <!--Card Body Fim-->
                      </div>
                <!--Card Fim-->

                <!-- Card Valor Do Gasto -->
                <div class="card mt-3 mt-md-0 card_item">
                    <div class="card-header text-center"><strong> Valor Gasto</strong></div>
                           <!--Card Body-->
                           <div class="card-body">
                                  <div class='d-flex justify-content-center'>
                                    <h5 class='text-center d-inline' style='font-size:30px; font-weight:340 ;'><?= $qtd_valor?></h5>
                                  </div>
                           </div>
                           <!--Card Body Fim-->
                      </div>
                <!--Card Fim-->

           </div>
              <!--Card-->
            <h3 class='mt-5'> Historico de Gastos </h3>
            <div class="card  mb-5">
              <div class="card-header d-flex justify-content-center" id='container_card'>
                   <ul class="nav nav-tabs card-header-tabs" id='container_ul' style='width:100%;overflow-x:visible; overflow-y:hidden;'>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_01'  onclick='pegarHistorico("01")'>Jan</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_02' onclick='pegarHistorico("02")'>Fev</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_03' onclick='pegarHistorico("03")'>Mar</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_04'  onclick='pegarHistorico("04")'>Abr</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_05'  onclick='pegarHistorico("05")'>Mai</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_06'  onclick='pegarHistorico("06")'>Jun</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_07'  onclick='pegarHistorico("07")'>Jul</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_08'  onclick='pegarHistorico("08")'>Ago</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_09'  onclick='pegarHistorico("09")'>Set</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_10' onclick='pegarHistorico("10")'>Out</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_11' onclick='pegarHistorico("11")'>Nov</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link links" href="#container_card" id='mes_12' onclick='pegarHistorico("12")'>Dez</a>
                     </li>
                   </ul>
                 </div>
                <!--Card Body-->        
                <div class="card-body" style='height:359px; overflow:auto'>
                   
                   
                   <div class="table-responsive">
                      <table class="table table-striped table-lg">
                           <thead>
                              <th>Tipo De Despesa</th>
                              <th>Descrição</th>
                              <th>Data De Registro</th>
                              <th>Valor Gasto</th>
                              <th>Ação</th>
                           </thead>
                           <tbody id='tbody'>
                           </tbody>
                       </table>
                       <!--<div>Sem</div>-->
                   </div>
                  
                 </div>
                <div class="card-footer"> <a href='#' class='btn btn-primary'>Ver todos</a>
                   <a href='#' class='btn btn-danger' id='limpar'  style='display:none' data-toggle="modal" data-target="#id_historico">Limpar</a>
                                  
                   <div class="modal fade" id="id_historico" tabindex="-1" aria-labelledby="label" aria-hidden="true">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="label">Excluir Histórico</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                           Este(s) item(s) serão apagados permanentemente
                           <h6>Tens certeza?</h6>
                         </div>
                         <div class="modal-footer">
                           <a class="btn btn-secondary" data-dismiss="modal" id='btn_no'>Não</a>
                           <a href="#container_card" class="btn btn-danger" id='limpar_items'>Sim</a>
                         </div>
                       </div>
                     </div>
                   </div></div>
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
    

    <script>
      
       var array_id_historico= []
       
       function limparHistorico(id_historico,mes) {
        
         
         var tr = document.getElementById(id_historico)
         var inputCheck= tr.querySelector('input')
         var btn = document.getElementById('limpar')
         var btn_yes = document.getElementById('limpar_items')
         var btn_no = document.getElementById('btn_no')

         //Selecionando campos a serem eliminados
         if (inputCheck.checked && !array_id_historico.includes(id_historico)) {
              array_id_historico.push(id_historico)
         } else {

              var index = array_id_historico.indexOf(id_historico)
              array_id_historico.splice(index,1)

         }
         //Mostrar ou Esconder botão para Limpar
         var showButton= document.getElementsByName('historico')
         
         for (let i = 0; i < showButton.length; i++) {
            if (showButton[i].checked) {
              btn.style.display='inline'
              break
            }else{
              btn.style.display='none'
            }
         }
         
         //Fim Seleção
         console.log(array_id_historico );
         btn_yes.addEventListener('click', (e)=>{
          
          var tbody = document.querySelector('#tbody')
          var request_limpar = new XMLHttpRequest()

          request_limpar.open('GET', 'php/function.php?id_historico='+array_id_historico+'&mes_limpar='+mes)

          request_limpar.onreadystatechange = () =>{
              if (request_limpar.readyState == 4 && request_limpar.status == 200) {

                tbody.innerHTML = request_limpar.responseText
                btn_no.click()
                array_id_historico=[]
                mes=''
                for (let i = 0; i < inputCheck.length; i++) {
                  inputCheck[i].checked=false
                 
                }
                btn.style.display='none'
                

              } else if(request_limpar.readyState == 4 && request_limpar.status == 404) {

                console.log(request_limpar.statusText);
              }
         }
          request_limpar.send()
         })
       }

       function pegarHistorico(mes) {
         //Selecionando Tbody(Container)
         var tbody = document.querySelector('#tbody')
         var mes_element = document.querySelector('#mes_'+mes)
         var mes_element_array = document.querySelectorAll('.links')

         for (let i = 0; i < mes_element_array.length; i++) {
           
           if (mes_element_array[i] == mes_element) {
             mes_element_array[i].classList.add('active')
           } else {
            mes_element_array[i].classList.remove('active')
           }
           
         }

         //Requisição para pegar Historico
         var request_pegar = new XMLHttpRequest()

         request_pegar.open('GET', 'php/function.php?mes='+mes)

         request_pegar.onreadystatechange = () =>{
              if (request_pegar.readyState == 4 && request_pegar.status == 200) {

                tbody.innerHTML = request_pegar.responseText


              } else if(request_pegar.readyState == 4 && request_pegar.status == 404) {

                console.log(request_pegar.statusText);
              }
         }
         request_pegar.send()
        
       }
       
      function AtulizarPag(){
        var data = new Date()
        mes = data.getMonth() <= 9 ? '0'+(data.getMonth() +1):(data.getMonth() +1)
        
        pegarHistorico(mes)
       }

    </script>
</body>
</html>