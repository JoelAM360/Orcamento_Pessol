<?php
    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();

    //Configurações do Servidor de e-mail:

    $mail->Host = "smtp.gmail.com";
    $mail->Port ="587";
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth ="true";
    $mail->Username="joeybraen25@gmail.com";
    $mail->Password="joel123AM"; 

    if (isset($_POST['recuperar'])) {
        $email = $_POST['email'];
        $codigo = $_SESSION['codigoRec'];
        
        //Configuração da Mensagem:
        $mail->setFrom($mail->Username,"App Orcamento Pessoal");//Remetente
        $mail->addAddress("$email");//Destinatario
        $mail->Subject = "Codigo de Confirmacao";//Assunto do Email

        $conteudo_email =" <strong>Código de Recuperação:</strong> $codigo";
        

        $mail->IsHTML(true);
        $mail->Body = $conteudo_email;
        if ($mail->send()) {
            header('Location:../codigo_confirmacao.php');
        } else {
            echo "Falha na tentativa de envio de email: ".$mail->ErrorInfo;
        }
        
    }elseif (isset($_POST['cadastrar'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome  = $_POST['nome'];
        
        
        //Configuração da Mensagem:
        $mail->setFrom($mail->Username,"App Orcamento Pessoal");//Remetente
        $mail->addAddress("$email");//Destinatario
        $mail->Subject = "Codigo de Confirmacao";//Assunto do Email

        $confirmar_email ="<a href='http://localhost/App_Despesas/php/function.php?cadastrar=ok&email=$email&senha=$senha&nome=$nome'>Continuar</a>";

        $mail->IsHTML(true);
        $mail->Body = $confirmar_email;

        if ($mail->send()) {
            echo "Confirmação Enviada";
        } else {
            echo "Falha na tentativa de envio de email: ".$mail->ErrorInfo;
        }
    }
    

    
?>
    