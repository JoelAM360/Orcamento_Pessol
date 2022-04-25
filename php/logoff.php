<?php
    session_start();
    
    //Destruindo a sessão
    session_destroy();
    header('Location:../login.php');
    
?>