<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script defer src="../arquivos_js/all.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link href="../dashboard.css" rel="stylesheet">
</head>
<body>



  <div class="container-full" style="height:90vh;">
     <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top flex-md-nowrap" style="border-bottom: 1px solid #c2c1c1c7;z-index:200;left: 0px;">
         <a class="navbar-brand text-dark" href="#">
            <img src="../img/logo.png" class="bg-primary" width="50" height="35" alt="Orçamento pessoal">
            <span class="h5">Orçamento Pessoal</span>
         </a>
         <label class="navbar-toggler collapsed" for='check' data-toggle="collapse" data-target="#sidebarMenu" onclick='esconderContainer()'>
           <span class="navbar-toggler-icon"></span>
         </label>  
         <input type="checkbox" id="check" style='display:none'>
     </nav>
    <div class="container-fluid">
       <!--Row-->
       <div class="row" style="height:100%;">

        <!--Sidebar-->
          <div id="sidebarMenu" class="d-md-block col-sm-3 col-md-3 sidebar collapse" style="height:100%;box-shadow: 5px 0 5px -2px rgb(16 42 67 / 10%);">
                 <div class='mt-3 sidebar-sticky p-3'style='background-color: #f1f1f1'> 
                  <div class='user mb-1'>
                     <div class="row">
                       <div class="col-md-4">
                         <img src="../img/avatar1.png" class="bg-primary img-user">
                       </div>
                       <div class=" col-sm-12 col-md-8 mt-2">
                       <span class='name_user'><strong>Joel Malamba</strong> </span>
                       <br>
                      <a href="#" class='name_user' style='font-size:12px'>Editar perfil</a>
                       </div>
                      
                     </div>
                     
                  </div>
                  <hr>
                  <h3 class='pl-2'>Painel</h3>
                  <ul class="nav flex-column" style="width: 100%;">
                    <a class="nav-link text-d link" href="converter.php">Conversor Moeda</a>
                    <a class="nav-link text-d link" href="taxas_juros.php">Taxas de Juros dos Bancos Comercias</a>
                    <a class="nav-link text-d link" href="registar.php">Registar de Despesas</a> 
                    <a class="nav-link text-d link" href="consulta.php">Consultar Despesas</a>
                    <a class="nav-link text-d link" href="#">Relatório e Estatistica</a>
                  </ul>
                  </div>
          </div>
      
          <!--Conteudo-->
          <div style='' class="container col-sm-8 col-md-8  mr-sm-5 bg-white " id='container' >
            <div class="clearfix p-1 p-md-2" style=" border-bottom: 1px solid #c2c1c1c7;">
               <span style='font-size:20px'> <a href="home.php">Home</a></span>
               <a href="php/logoff.php" class="btn btn-outline-primary float-right">Sair</a>
            </div>

            <div class="d-flex justify-content-md-between flex-column flex-md-row mt-3">
                <!-- Card Valor Do Més -->
                    <div class="card mt-3 mt-md-0 card_item" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header text-center"><strong> Valor Atual</strong></div>
                           <!--Card Body-->
                          <div class="card-body" id='card-form'>
                          </div>
                           <!--Card Body Fim-->
                      </div>
                <!--Card Fim-->

                <!-- Card Valor Do Més -->
                <div class="card mt-3 mt-md-0 card_item" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header text-center"><strong> Valor Atual</strong></div>
                           <!--Card Body-->
                           <div class="card-body">
                                
                          </div>
                           <!--Card Body Fim-->
                      </div>
                <!--Card Fim-->
                <!-- Card Valor Do Més -->
                <div class="card mt-3 mt-md-0 card_item" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header text-center"><strong> Valor Atual</strong></div>
                           <!--Card Body-->
                           <div class="card-body">
                             
                           </div>
                           <!--Card Body Fim-->
                      </div>
                <!--Card Fim-->

           </div>
              <!--Card-->
            <h2 class='mt-5 mb-4'>Historico de Gastos</h2>
            <div class="card mr-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
              <div class="card-header">
                   <ul class="nav nav-tabs card-header-tabs">
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Jan') {echo 'active';}?>" href="#" id='id_active_1'>Jan</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Feb') {echo 'active';}?>" href="#" id='id_active_2' >Fev</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Mar') {echo 'active';}?>" href="#" id='id_active_3' >Mar</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Apr') {echo 'active';}?>" href="#" id='id_active_4' >Abr</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='May') {echo 'active';}?>" href="#mes_5" id='id_active_5' >Mai</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Jun') {echo 'active';}?>" href="#mes_6" id='id_active_6' >Jun</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Jul') {echo 'active';}?>" href="#mes_7" id='id_active_7' >Jul</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Aug') {echo 'active';}?>" href="#mes_8" id='id_active_8' >Ago</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Sep') {echo 'active';}?>" href="#mes_9" id='id_active_9' >Set</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Oct') {echo 'active';}?> " href="#mes_10" id='id_active_10'>Out</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Nov') {echo 'active';}?>" href="#mes_11" id='id_active_11'>Nov</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link <?php if ($mes=='Dec') {echo 'active';}?>" href="#mes_12" id='id_active_12'>Dez</a>
                     </li>
                   </ul>
                 </div>

                    <!--Card Body-->
                <div class="card-body" style="height:45vh; overflow:auto;">
                   <h5 class="card-title">
                       <?php if (empty($_SESSION['filtro_historico'])){ ?>
                            <label for="" style='font-size:15px;'>nenhum Registo Deste Més</label>
                        <?php }?>
                   </h5>
                   
                   <table class="table">
                        <thead>
                           <th>Tipo De Despesa</th>
                           <th>Descrição</th>
                           <th>Data De Registro</th>
                           <th>Valor Gasto</th>
                           <th>Ação</th>
                        </thead>
                        <tbody>
                        <!--<?php if (!empty($_SESSION['filtro_historico'])) {?>

                           <?php foreach ($_SESSION['filtro_historico'] as $value) {?>
                              <tr>
                                <td><?= $value->tipo_despesa ?></td>
                                <td><?= $value->descricao ?></td>
                                <td><?= $value->data_cadastro ?></td>
                                <td><?= $value->valor_despesa ?></td>
                                <td></td>
                              </tr>
                            <?php }?>
                        <?php }?>-->
                          
                        </tbody>
                    </table>
                   
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
    <!--<script src="js/responsividade.js"></script>-->

    <script>
         
      for (let i = 1; i <= 12; i++) {
        document.getElementById('id_active_'+i).addEventListener('click', ()=>{
          if (i<=9) {
            window.location.href='php/function.php?mes=0'+i

          }else{
            window.location.href='../php/function.php?mes='+i
          }
        })
        
      }
     
    function setValorDespesa() {



      //Selecionando Elementos:
      var div_card_form=document.getElementById('card-form')
      
      
      //Criando Elementos HTML:
      var inputValor=document.createElement('input')
      inputValor.type='text'
      inputValor.placeholder="Valor das Despesas"
      inputValor.name='valor_mes'
      inputValor.id="valor_mes"
      inputValor.className='form-control form-control-sm'

      var form=document.createElement('form')
      form.method='post'
      form.action='php/function.php'
     
      var div=document.createElement('div')
      div.classList.add('form-group')

      var button=document.createElement('button')
      button.type='submit'
      button.name='mes_valor'
      button.innerText="Guardar"
      button.className='btn btn-sm btn-primary mb-1'
      

      //Criando Arvore DOM:
      div.appendChild(inputValor)
      form.appendChild(div)
      form.appendChild(button)
      
      div_card_form.appendChild(form)

      if (document.getElementById('plus_p')) {
        document.getElementById('plus_p').remove()
      } else if (document.getElementById('content_valor')) {
        document.getElementById('content_valor').remove()
      } /*else if (document.getElementById('span_2')){
        document.getElementById('span_2').remove()
      } */
     
      //Validando Input do Valor da Moeda para não permitir Letras e nenhem repetir o caracter '.'
      var valor_mes=document.querySelector('#valor_mes')
      
      //Bloquear Letras
      valor_mes.addEventListener('keypress', (e) => {
          var keycode= e.keyCode || e.which
          console.log(valor_mes);
          if (!((keycode > 47 && keycode < 58) || keycode==46 )) {
              e.preventDefault()
          }
      })

      //Não permitir repetir
      valor_mes.addEventListener('keypress', (e)=>{
          var keycode=e.keyCode|| e.which
          var charCode=String.fromCharCode(keycode)
      
          if (valor_mes.value.includes(charCode) && keycode == 46) {
              e.preventDefault()
          }
      })
    }
  
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