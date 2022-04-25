<?php 

   session_start();

   function registarDespesa($id_user)
   {    require 'conexao.php';
        //Recebendo Valores do Front-End
        $tipo = $_GET['tipo'];
        $descricao = $_GET['descricao'];
        $valor = $_GET['valor'];
        if (empty($tipo) || empty($valor)) {
          header('Location:../registar.php?registar=nao');
        } else {
          //Instrução SQL
          $sql = "INSERT INTO `tb_despesa`(`id_user`, `descricao`, `tipo_despesa`, `valor_despesa`) VALUES ('$id_user','$descricao','$tipo','$valor')";

          $stmt=$conexao->prepare($sql);
    
          $stmt->execute();
          header('Location:../registar.php?sucesso=1');
        } 
        
   }

   function listar($id_user)
   {    require 'conexao.php';
       
        $sql="SELECT * FROM `tb_despesa` WHERE id_user=$id_user ORDER BY `tb_despesa`.`data_cadastro` ASC";
  
        $stmt=$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
   }
   
   function cadastrarUser()
   {    require 'conexao.php';
        
        //Recebendo Valores do Front-End
        $nome  = $_GET['nome'];
        $email = $_GET['email'];
        $senha = $_GET['senha'];
        if (empty($nome) || empty($email) || empty($senha)) {
          header('Location:../cadastro_user.php?cadastro=nao');
        } else {
        $sql = "INSERT INTO `tb_user`(`nome`, `email`, `senha`) VALUES ('$nome','$email','$senha')";

        $stmt=$conexao->prepare($sql);
    
        $stmt->execute();
        //echo 'Aqui 2'.$nome .$senha.$nome;
     }
   }
   function setValorAtual_Gasto($id_user,$valor_atual,$valor_gasto)
   {    require 'conexao.php';
        
        $sql = "UPDATE `tb_user` SET `valor_atual`=$valor_atual,`valor_gasto`=$valor_gasto WHERE id_user=$id_user";
        
        $stmt=$conexao->prepare($sql);
    
        $stmt->execute();
   }
   function setValorDepesas($id_user)
   {    require 'conexao.php';
        
        //Recebendo Valores do Front-End
        $valor_mes = $_POST['valor_mes'];
        if ( empty($valor_mes) || $valor_mes<=0) {
          header('Location:../cadastro_user.php?cadstro=nao');
        } else {
        $sql = "UPDATE `tb_user` SET `valor_mes`=$valor_mes WHERE id_user=$id_user";
        
        $stmt=$conexao->prepare($sql);
    
        $stmt->execute();
        
     }
   }
   function getValorDepesas($id_user)
   {    require 'conexao.php';
       
        $sql="SELECT valor_mes FROM `tb_user` WHERE id_user=$id_user";
  
        $stmt=$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

   function cadastrarSenhaDeRecuperacao($id_user,$senha_recuperacao)
   {    require 'conexao.php';

        $sql = "INSERT INTO `tb_recuperacao`(`id_user`,`senha_recuperacao`) VALUES ('$id_user','$senha_recuperacao')";

        $stmt=$conexao->prepare($sql);
    
        $stmt->execute();
   }

   function cadastrarHistorico()
   {    require 'conexao.php';
        if(!empty($_SESSION['historico'][0])){
      
          $sql = "INSERT INTO `tb_historico`(`id_user`, `descricao`, `tipo_despesa`, `valor_despesa`, `data_cadastro`) VALUES ('{$_SESSION['historico'][0]->id_user}','{$_SESSION['historico'][0]->descricao}','{$_SESSION['historico'][0]->tipo_despesa}','{$_SESSION['historico'][0]->valor_despesa}','{$_SESSION['historico'][0]->data_cadastro}')";
          echo $sql;
          $stmt=$conexao->prepare($sql);
    
          $stmt->execute();
     }
   }
   function listarHistorico($id_user)
   {    require 'conexao.php';
       
        $sql="SELECT * FROM `tb_historico` WHERE id_user=$id_user ORDER BY `tb_historico`.`data_cadastro` ASC";
  
        $stmt=$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
   }
   
   function filtrarHistorico($id_user,$mes)
   {
        require 'conexao.php';
        
        if (!empty($mes) ) {
          
          $sql = "SELECT * FROM `tb_historico` WHERE data_cadastro LIKE '_____$mes-%' AND id_user=$id_user";
     
          $stmt=$conexao->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_OBJ);
     }    
   }
   function recuperarIdUser()
   {
     require 'conexao.php';
     //Recebendo Valores do Front-End
     $email = $_POST['email'];
     if ( empty($_POST['email']) && isset($_POST['recuperar']) ) {
          
          header('Location:../recuperar_senha.php?verifcar=1');

     }else {
         
          $sql = "SELECT * FROM `tb_user` WHERE email='$email'";

          $stmt=$conexao->prepare($sql);
          $stmt->execute();
          
          return $stmt->fetchAll(PDO::FETCH_OBJ);
          
          //echo 'a';
     }
   }
   function getUser()
   {
     require 'conexao.php';

     $id_user = $_SESSION['id_user'];

     $sql = "SELECT * FROM `tb_user` WHERE id_user='$id_user'";

     $stmt=$conexao->prepare($sql);
     $stmt->execute();
          
     return $stmt->fetchAll(PDO::FETCH_OBJ);
          
          
    
   }
   function recuperarUser($id_despesa)
   {
     require 'conexao.php';
     
     $sql="SELECT * FROM `tb_despesa` WHERE id_despesa=$id_despesa";

     $stmt=$conexao->prepare($sql);

     $stmt->execute();

     return $stmt->fetchAll(PDO::FETCH_OBJ);
     
   }
   function codRecupracao($id_user)
   {
     require 'conexao.php';
     
     if (empty($id_user)) {
          
         echo 'Erro!';

     }else {
         
          $sql = "SELECT senha_recuperacao FROM `tb_recuperacao` WHERE id_user='$id_user'";

          $stmt=$conexao->prepare($sql);
          $stmt->execute();
          
          return $stmt->fetchAll(PDO::FETCH_OBJ);
          
     }
    
   }
  
   function login()
   {
     require 'conexao.php';
     //Recebendo Valores do Front-End
    if (isset($_POST['login'])) {
     $email = $_POST['email'];
     $senha = $_POST['senha'];
     //echo 'Aqui LOgin';
    }elseif (isset($_GET['cadastrar'])) {
     $email = $_GET['email'];
     $senha = $_GET['senha'];
     //echo 'Aqui Cadastro';
    }

    if (empty($email) || empty($senha)) {
          
          header('Location:../login.php?erro=1');

     }else {
         
          $sql = "SELECT * FROM `tb_user` WHERE email='$email' AND senha='$senha'";

          $stmt=$conexao->prepare($sql);
          $stmt->execute();
          
          return $stmt->fetchAll(PDO::FETCH_OBJ);
          
     }
     
     
   }

   function filtrar($id_user)
   {
        require 'conexao.php';
        
        if (!empty($_GET['tipo']) && !empty($_GET['mes']) ) {
          //Recebendo Valores do Front-End
          $mes = $_GET['mes'];
          $tipo = $_GET['tipo'];

          $sql = "SELECT * FROM `tb_despesa` WHERE data_cadastro LIKE '_____$mes-%' AND id_user=$id_user AND tb_despesa.tipo_despesa='$tipo'";

        } elseif (!empty($_GET['mes'])) {
           $mes = $_GET['mes'];

           $sql="SELECT * FROM `tb_despesa` WHERE data_cadastro LIKE '_____$mes-%' AND id_user=$id_user";
        } 
        elseif (!empty($_GET['tipo'])) {
          $tipo = $_GET['tipo'];

          $sql="SELECT * FROM `tb_despesa` WHERE id_user=$id_user AND tipo_despesa='$tipo'";
       }else {
          $sql="SELECT * FROM `tb_despesa` WHERE id_user=$id_user";
       }
        
        $stmt=$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
   }
     
   function removerRegistro($id_despesa)
   {
          require 'conexao.php';
          $sql  = "DELETE FROM `tb_despesa` WHERE id_despesa=$id_despesa";

          $stmt = $conexao->prepare($sql);
          $stmt->execute();
          header('Location:../consulta.php');
   }
   function editarRegistro($id_despesa)
   {
          require 'conexao.php';
          //Recebendo dados do Front-end:
          $descricao=$_POST['descricao'];
          $tipo_despesa=$_POST['tipo'];
          $valor_despesa=$_POST['valor'];
          
          if (empty($tipo_despesa) || empty($valor_despesa)) {
               header('Location:../editar_registro.php?erro=não editado&id='.$id_despesa.'&descricao='.$descricao.'&valor='.$valor_despesa);
          } else {
             
          $sql  = "UPDATE `tb_despesa` SET `descricao`= '$descricao', `tipo_despesa`='$tipo_despesa',`valor_despesa`='$valor_despesa' WHERE id_despesa=$id_despesa";
          
          
          $stmt = $conexao->prepare($sql);
          $stmt->execute();
          header('Location:../registar.php?editar=ok');
       }
   }
   function editarUser($id_user)
   {
          require 'conexao.php';
          //Recebendo dados do Front-end:
          $nome=$_POST['nome'];
          $email=$_POST['email'];
          $senha=$_POST['senha'];
          $conf_senha=$_POST['conf_senha'];
          //$sql  = "UPDATE `tb_user` SET `nome`= '$nome', `senha`='$senha',`email`='$email' WHERE id_user=$id_user";
          /* $stmt = $conexao->prepare($sql);
          $stmt->execute();
          header('Location:../registar.php?editar=ok');*/
         
          if ( empty($nome) && empty($senha) && empty($email) ) {
               echo 'Aqui';
          } else {
               if ( !( empty($nome) && empty($senha) )) {
                    $sql  = "UPDATE `tb_user` SET `nome`= '$nome', `senha`='$senha',`email`='$email' WHERE id_user=$id_user";
               } else {
                    # code...
               }
               
          } 
       
   }
   function removerHistorico($id_historico)
   {
          require 'conexao.php';
          
          $sql  = "DELETE FROM `tb_historico` WHERE id_historico=$id_historico";          
          $stmt = $conexao->prepare($sql);
          $stmt->execute();
          //$_SESSION['historico']=listarHistorico($id_user);
          //header('Location:http://localhost/App_Despesas/home.php?mes='.$_SESSION['mes']);
          
   }

   
   if (isset($_GET['submit'])) {
     registarDespesa($_SESSION['id_user']);
   }
   elseif(isset($_POST['login']))
   {
     $dados_user=login();
     //print_r($dados_user);
     $_SESSION['autentico']=count($dados_user)>0 ? true : false;

     if ($_SESSION['autentico']) {

          foreach ($dados_user as $value) {
               $_SESSION['id_user']=$value->id_user;
               $_SESSION['nome']=$value->nome;
               
          }
          header('Location:../home.php');
          
     } else {
          header('Location:../login.php?erro=1');
     }
     
   }elseif (isset($_GET['filtrar'])) 
   {

        $_SESSION['filtrar']=filtrar($_SESSION['id_user']);
        header('Location:../consulta.php?filtrado=1');

   }elseif (isset($_GET['id_despesa']))
    {
        
        $_SESSION['historico']=recuperarUser($_GET['id_despesa']);
        print_r($_SESSION['historico'][0]);
        cadastrarHistorico();
        removerRegistro($_GET['id_despesa']);
          
   }elseif(isset($_GET['cadastrar']))
   {
     cadastrarUser();
     //echo 'Aqui';
     $dados_user=login();

     $qtd_senha_aleatoria=5;
     $arry_senha_aleatoria =[];


     $_SESSION['autentico']=count($dados_user)>0 ? true : false;

     if ($_SESSION['autentico']) {

         foreach ($dados_user as $value) {
               $_SESSION['id_user']=$value->id_user;
               $_SESSION['nome']=$value->nome;
               
          }
          for ($i=0; $i <$qtd_senha_aleatoria ; $i++) { 
               $arry_senha_aleatoria[$i] = rand(10000,99999);
               cadastrarSenhaDeRecuperacao($_SESSION['id_user'] , $arry_senha_aleatoria[$i]);
           }
          header('Location:../home.php');
          
          
     } else {
         header('Location:../cadastro_user.php?erro=1');
         //echo 'Teste1';
     }
     
   }elseif(isset($_POST['recuperar']))
   {
     
     if (count(recuperarIdUser())>0) {
          $id_user=recuperarIdUser()[0]->id_user;
          $pos_aleatoria=rand(0,4);
          $codigoRec=codRecupracao($id_user)[$pos_aleatoria]->senha_recuperacao;
          $_SESSION['codigoRec']=$codigoRec;

          $_SESSION['id_user']=$id_user;
          require "enviar_email/enviar_email.php";
          
     }else {
          echo 'Este email não está cadastrado';
     }
     
   }elseif(isset($_POST['confirmar']))
   {
    
     if ($_SESSION['codigoRec']==$_POST['codigo']) {
          $id_user=$_SESSION['id_user'];
          header("Location:../redefinir_senha.php?id=$id_user");
          
     }else {
          echo 'Erro Neste MOmeto';
     }
     
   }elseif(isset($_POST['editar']))
   {
     //print_r($_POST);
     editarRegistro($_POST['id_despesa']);
     
   }
   elseif(isset($_POST['mes_valor']))
   {

     setValorDepesas($_SESSION['id_user']);
     header('Location:../home.php?salvar=ok');
 
   }elseif ( isset($_GET['mes']) ) 
   {

     $_SESSION['filtro_historico'] = filtrarHistorico($_SESSION['id_user'],$_GET['mes']);
     
     if(count($_SESSION['filtro_historico'])){
        foreach ($_SESSION['filtro_historico'] as $value) {
            echo '<tr id='.$value->id_historico.'>';
                echo '<td>'. $value->tipo_despesa.'</td>'; 
                echo '<td>'. $value->descricao.'</td>'; 
                echo '<td>'. $value->data_cadastro.'</td>';
                echo '<td>'. $value->valor_despesa.' </td>';   
                echo '<td><input type="checkbox" name="historico" onclick="limparHistorico('.$value->id_historico.','.$_GET["mes"].')"></td>';
            echo '</tr>';
        }
     }else {
          echo '<div>Nenhum Registro</div>'; 
     }

   }elseif ( isset($_GET['mes_limpar']) ) 
   {
     
     $array_id=explode(',',$_GET['id_historico']);
     
    $mes = $_GET['mes_limpar']<=9 ? '0'.$_GET['mes_limpar']:$_GET['mes_limpar'];
    
     for ($i=0; $i < count($array_id); $i++) { 
          removerHistorico($array_id[$i]);
     }
     $filtro_historico = filtrarHistorico($_SESSION['id_user'], $mes);

     if (count($filtro_historico)>0) {
          foreach ($filtro_historico as $value) {
               echo '<tr id='.$value->id_historico.'>';
                   echo '<td>'. $value->tipo_despesa.'</td>'; 
                   echo '<td>'. $value->descricao.'</td>'; 
                   echo '<td>'. $value->data_cadastro.'</td>';
                   echo '<td>'. $value->valor_despesa.' </td>';   
                   echo '<td><input type="checkbox" name="historico" onclick="limparHistorico('.$value->id_historico.','.$_GET["mes_limpar"].')"></td>';
               echo '</tr>';
           }
     
     } else {
          echo '<tr>';
          echo '<td>Nenhum Registro</td>'; 
          echo '</tr>';
     }
     
     
   }elseif (isset($_POST['salvar'])) {

     editarUser($_SESSION['id_user']);
   }

   
?>