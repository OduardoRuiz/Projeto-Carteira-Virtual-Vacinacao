<?php 

session_start();

require_once "bd.php";

$senha= $_POST['senha'];
$cpf= $_POST['cpf'];


$statement = $objBanco->prepare("SELECT cpf, senha FROM Admini WHERE senha = '$senha' AND cpf = '$cpf';");

$statement-> execute();

$count = $statement->rowCount();


if ($count==0){
    
  $msg_erro_login_admin = 'CPF ou SENHA inválido contate o Responsável da área !!!';
  $_SESSION['errologinadmin']=$msg_erro_login_admin;
  header("Location: admin.php");
    
  die();
}else{
    $_SESSION['adminlog'] = true;
    
  header("Location: post.php");
}