<?php
include 'conexao.php';

$id_user= $_SESSION['id_user'];
$sql = "SELECT * FROM `tb_img` WHERE id_user=$id_user";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$qtn_img = $stmt->fetchAll(PDO::FETCH_OBJ);

$img= count($qtn_img)>0 ? $qtn_img[0]->name_img : 'avatar2.png';

?>