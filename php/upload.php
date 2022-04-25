<?php
     session_start();
     include 'conexao.php';

    $id_user= $_SESSION['id_user'];
    $images = $_FILES['image'];
    echo '<pre>';
        print_r($images);
    echo '</pre>';
    
    //Armazenando os valores um suas variaveis
    $img_name = $images['name'];
    $img_erro = $images['error'];
    $img_size = $images['size'];
    $tmp_name = $images['tmp_name'];
   
    //Verficar se ñ há nenhum erro
    if ($img_erro === 0) {
        //Pegar extensões e guardar:
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

        //Converter para minuscula:
        $img_ex_lc = strtolower($img_ex);
       
        //Array de extensões validas e validar extensões
        $array_exs = array('jpg', 'jpeg', 'png');

        if (in_array($img_ex_lc,$array_exs)) {
            //Renomear Img com a extensão
            $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
           
            //Verificando se já existe uma imagem
            $sql = "SELECT * FROM `tb_img` WHERE id_user=$id_user";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $qtn_img = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            
            if (count($qtn_img)>0) {
                #Remove Img já existente da pasta
                unlink("../img/".$qtn_img[0]->name_img);

                #Atualizando base de dados
                $sql = "UPDATE `tb_img` SET `name_img`='$new_img_name' WHERE id_user=$id_user";
                echo 'Aqui Editar_Upload';

            } else {

                #Inserindo na base de dados
                $sql = "INSERT INTO `tb_img`(id_user,`name_img`) VALUES ('$id_user','$new_img_name')";
                echo 'Aqui Inserir_Upload';
            }
            $stmt= $conexao->prepare($sql);
            $stmt->execute();
            
            //Mover uma pasta no APP:
            move_uploaded_file($tmp_name, '../img/'.$new_img_name);
            header('Location:../editar_perfil.php?sucesso=ok');

        } else {
            header('Location:../editar_perfil.php?falha=erro');
        }
        
    }
    
?>