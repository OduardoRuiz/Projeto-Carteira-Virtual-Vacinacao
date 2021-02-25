<?php

session_start();

require_once "bd.php";

$diretorio='imagens/imagem/';
$imagem1 = $_FILES['imagem']['name'];

$n1=1;


$objPost = $objBanco->prepare('	INSERT INTO Post ( texto, imagem, link, idAdmin )VALUES ( :texto, :imagem, :link,:idAdmin )');


$objPost->bindParam(':texto', $_POST['texto']);				
$objPost->bindParam(':imagem', $imagem1);
$objPost->bindParam(':link', $_POST['link']);
$objPost->bindParam(':idAdmin', $n1);

if ( $objPost->execute() ) {

	$diretorio='imagens/imagem/';
	move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$imagem1);
	$_SESSION['adminlog'] = true;
    header("Location: post1.php");
	

} else {

	echo' :-( deu erro, tente novamente! ';
}





$objimagem = $objBanco->prepare('INSERT INTO Carrousel ( imagem, idAdmin )VALUES (  :imagemhome, :idAdmin )');

$diretorio1='imagens/carrousel/';
$imagem2 = $_FILES['imagemhome']['name'];

var_dump($imagem2);
$n1=1;
				
$objimagem->bindParam(':imagemhome', $imagem2);
$objimagem->bindParam(':idAdmin', $n1);

if ( $objimagem->execute() ) {

	$diretorio1='imagens/carrousel/';
	move_uploaded_file($_FILES['imagemhome']['tmp_name'], $diretorio1.$imagem2);
	$_SESSION['adminlog'] = true;
    header("Location: imagem_home.php");
	

} else {

	echo' :-( deu erro, tente novamente! ';
}


