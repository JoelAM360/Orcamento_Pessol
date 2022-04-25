<?php
     require 'conexao.php';

     if (!isset($_POST['criar'])) {

        header('Location:../login.php');

     } else { 
         //Redefinição de Senha
         if (!empty($_POST['id'])) {
          $senha=$_POST['senha'];
          $conf_senha=$_POST['conf_senha'];
          $id_user=$_POST['id'];
         
          if ($senha == $conf_senha) {

             $sql="UPDATE `tb_user` SET `senha`='$senha' WHERE id_user='$id_user'";
             $stmt=$conexao->prepare($sql);
             $stmt->execute();
             header('Location:../login.php?recuperado=ok');

          }
          else {

             header('Location:../redefinir_senha.php?recuperado=erro');
             
          }
      } elseif (true) {
             //Validar Email
             $get_email=$_GET["email"];

             $sql="SELECT email FROM `tb_user` WHERE email='$get_email'";
         
             $stmt=$conexao->prepare($sql);
             $stmt->execute();
             $email= $stmt->fetchAll(PDO::FETCH_OBJ);
             //echo $email[0]->email;
             if (!empty($email[0]->email)) {
                echo 'Email já existe';
             } 

         } 
      }
     
     
?>
