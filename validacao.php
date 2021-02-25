<?php 

session_start();

require_once "bd.php";

$senha1= $_POST['senha'];
$cpf= $_POST['cpf'];

$r = $objBanco->query("SELECT senha, mdEscuro FROM Cadastro WHERE cpf = '$cpf'");
$reg = $r->fetch(PDO::FETCH_ASSOC);
$senha = $reg['senha'];



if (password_verify( $senha1, $senha)){
  $_SESSION['a'] = $cpf;
  $_SESSION['usuariolog'] = true;
  $_SESSION['b'] = $reg['mdEscuro'];
 header("Location: cadastro1.php");
  
die();
}else{
$msg_erro_login = 'CPF ou SENHA inválido ou inexistente';
$_SESSION['errologin']=$msg_erro_login;
header("Location: login.php");
}

