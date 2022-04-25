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
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link href="../dashboard.css" rel="stylesheet">
</head>
<body style='overflow:auto'>



  <div class="container-fluid" style="height:90vh;">
    <nav class="navbar navbar-expand-sm navbar-light bg-white flex-md-nowrap p-2 " style="border-bottom: 1px solid #c2c1c1c7;">
      <a class="navbar-brand text-dark" href="#">
         <img src="../img/logo.png" class="bg-primary" width="50" height="35" alt="Orçamento pessoal">
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
          <div id="sidebarMenu" class="d-sm-block col-sm-3 col-md-3 sidebar collapse" style="height:100%;box-shadow: 5px 0 5px -2px rgb(16 42 67 / 10%);">
                  <div class="sidebar-sticky bg-white p-3">
                     <ul class="nav flex-column" style="width: 100%;">
                       <a class="nav-link text-d link" href="converter.php">Conversor Moeda</a>
                       <a class="nav-link text-d link" href="taxas_juros.php">Taxas de Juros dos Bancos Comercias</a>
                       <a class="nav-link text-d link active" href="registar.php">Registar de Despesas</a> 
                       <a class="nav-link text-d link" href="consulta.php">Consultar Despesas</a>
                     </ul>
                  </div>
          </div>
      
          <!--Conteudo-->
          <div class="container col-sm-8 col-md-8 mt-1 mt-md-3 mr-sm-5" id='container'>
                <div class="clearfix p-1 p-md-2" style=" border-bottom: 1px solid #c2c1c1c7;">
                   <span > <strong>Joel Malamba</strong> > <a href="home.php">Home</a></span>
                   <a href="php/logoff.php" class="btn btn-outline-primary float-right">Sair</a>
                 </div>
              <!--Card-->
              <div class="card mt-3 mt-md-5" style="box-shadow: 5px 5px 5px 5px rgb(16 42 67 / 30%);">
                    <div class="card-header">
                      <h1 class="display-4">Registro Despesa</h1>
                    </div>
                    <!--Card Body-->
                    <div class="card-body">
                      <div class="row mt-2 mt-md-4">
                          <div class="col-md-3 mb-2 mb-md-0">
                          <select class="form-control" id="tipo" name="tipo">
                            <option>Tipo</option>
                            <option value="Alimentação">Alimentação</option>
                            <option value="Educação">Educação</option>
                            <option value="Lazer">Lazer</option>
                            <option value="Saúde">Saúde</option>
                            <option value="Transporte">Transporte</option>
                          </select>
                          </div>
                        
                          <div class="col-md-3 mb-2 mb-md-0">
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição" id="descricao" />
                          </div>
                          
                          
                          <div class="col-md-4 mb-2 mb-md-0">
                            <input type="text" class="form-control" name="valor" placeholder="Valor" id="valor" />
                          </div>
                      </div>
      
                      <div class="row mt-2 mt-md-3">
                       <div class="col-12">
                       <button type="submit" class="btn btn-primary" name="submit">
                          Cadastrar
                        </button>
                        </div>
                        <div class="col-12 mt-4 mt-md-4" style='overflow:auto' >
                        <table class="table" >
                          <thead>
                            <th>Tipo De Despesa</th>
                            <th>Descrição</th>
                            <th>Data De Registro</th>
                            <th>Valor Gasto</th>
                            <th>Ação</th>

                          </thead>

                          <tbody>
                          <tr id=''>
                            <td>TEste</td>
                            <td>TEsteTEsteTEsteTEsteTEsteTEsteTEste</td>
                            <td>TEste</td>
                            <td class='text-center'>TEste</td>
                            <td class='text-center' style='cursor:pointer'><i class="fas fa-edit"></i></td>
                          </tr>
                          </tbody>
                        </table>
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