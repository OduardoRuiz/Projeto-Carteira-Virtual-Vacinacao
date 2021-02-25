<?php

session_start();

require_once "bd.php";

$diretorio='imagens/fotos/';
$foto1 = $_FILES['foto']['name'];

$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

$objCadastro = $objBanco->prepare('	INSERT INTO Cadastro ( nome, cpf,senha,sus,foto,mdEscuro)VALUES ( :nome, :cpf, :senha,:sus,:foto,:mdEscuro)');


$objCadastro->bindParam(':nome', $_POST['nome']);			
$objCadastro->bindParam(':cpf', $_POST['cpf']);
$objCadastro->bindParam(':senha', $senha);
$objCadastro->bindParam(':sus', $_POST['sus']);	
$objCadastro->bindParam(':foto', $foto1);
$objCadastro->bindParam(':mdEscuro', $_POST['mdEscuro']);

if ( $objCadastro->execute() ) {

	$diretorio='imagens/fotos/';
	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$foto1);
	echo 'Contato gravado com sucesso!';

} else {

	echo' :-( deu erro, tente novamente! ';
}
$id = $objBanco->lastInsertId();


$objEndereco = $objBanco->prepare('	INSERT INTO Endereco ( cep, rua,numero,complemento,bairro,estado,cidade,idCadastro)VALUES ( :cep, :rua,:numero,:complemento,:bairro,:estado,:cidade, :idCadastro)');


$objEndereco->bindParam(':cep', $_POST['cep']);		
$objEndereco->bindParam(':rua', $_POST['rua']);
$objEndereco->bindParam(':numero', $_POST['numero']);
$objEndereco->bindParam(':complemento', $_POST['complemento']);	
$objEndereco->bindParam(':bairro', $_POST['bairro']);
$objEndereco->bindParam(':estado', $_POST['estado']);
$objEndereco->bindParam(':cidade', $_POST['cidade']);
$objEndereco->bindParam(':idCadastro', $id);

if ( $objEndereco->execute() ) {
	echo 'Contato gravado com sucesso!';
} else {

	echo' :-( deu erro, tente novamente! ';
}

$id1 = $objBanco->lastInsertId();


$objVacina = $objBanco->prepare(' INSERT INTO Vacina ( bcg, hepatiteb, pentavalente, vip, vorh, pneumococica10, meningococicac, pentavalente2, vip2, vorh2, pneumococica102, meningococicac2, pentavalente3, vip3, febreamarela, pneumococica10reforco, src, meningococicareforco, vop1, hepatitea, dtp1, scrv, dtp2, vop2, varicela, febreamarela2, hpv, hepatiteb3, duplaadulta3, tripliceviral2, febreamarela3, hpv2, meningococicacreforco, hepatiteb4, duplaadulta4, febreamarela4, tripliceviral, hepatiteb5, duplaadulta5, hepatiteb6, febreamarela5, duplaadulta6, tripliceviral3, idEndereco)VALUES (:bcg, :hepatiteb, :pentavalente, :vip, :vorh, :pneumococica10, :meningococicac, :pentavalente2, :vip2, :vorh2, :pneumococica102, :meningococicac2, :pentavalente3, :vip3, :febreamarela, :pneumococica10reforco, :src, :meningococicareforco, :vop1, :hepatitea, :dtp1, :scrv, :dtp2, :vop2, :varicela, :febreamarela2, :hpv, :hepatiteb3, :duplaadulta3, :tripliceviral2, :febreamarela3, :hpv2, :meningococicacreforco, :hepatiteb4, :duplaadulta4, :febreamarela4, :tripliceviral, :hepatiteb5, :duplaadulta5, :hepatiteb6, :febreamarela5, :duplaadulta6, :tripliceviral3, :idEndereco)');



$objVacina->bindParam(':bcg',$_POST['bcg']);
$objVacina->bindParam(':hepatiteb',$_POST['hepatiteb']);
$objVacina->bindParam(':pentavalente',$_POST['pentavalente']);
$objVacina->bindParam(':vip',$_POST['vip']);
$objVacina->bindParam(':vorh',$_POST['vorh']);
$objVacina->bindParam(':pneumococica10',$_POST['pneumococica10']);
$objVacina->bindParam(':meningococicac',$_POST['meningococicac']);
$objVacina->bindParam(':pentavalente2',$_POST['pentavalente2']);
$objVacina->bindParam(':vip2',$_POST['vip2']);
$objVacina->bindParam(':vorh2',$_POST['vorh2']);
$objVacina->bindParam(':pneumococica102',$_POST['pneumococica102']);
$objVacina->bindParam(':meningococicac2',$_POST['meningococicac2']);
$objVacina->bindParam(':pentavalente3',$_POST['pentavalente3']);
$objVacina->bindParam(':vip3',$_POST['vip3']);
$objVacina->bindParam(':febreamarela',$_POST['febreamarela']);
$objVacina->bindParam(':pneumococica10reforco',$_POST['pneumococica10reforco']);
$objVacina->bindParam(':src',$_POST['src']);
$objVacina->bindParam(':meningococicareforco',$_POST['meningococicareforco']);
$objVacina->bindParam(':vop1',$_POST['vop1']);
$objVacina->bindParam(':hepatitea',$_POST['hepatitea']);
$objVacina->bindParam(':dtp1',$_POST['dtp1']);
$objVacina->bindParam(':scrv',$_POST['scrv']);
$objVacina->bindParam(':dtp2',$_POST['dtp2']);
$objVacina->bindParam(':vop2',$_POST['vop2']);
$objVacina->bindParam(':varicela',$_POST['varicela']);
$objVacina->bindParam(':febreamarela2',$_POST['febreamarela2']);
$objVacina->bindParam(':hpv',$_POST['hpv']);
$objVacina->bindParam(':hepatiteb3',$_POST['hepatiteb3']);
$objVacina->bindParam(':duplaadulta3',$_POST['duplaadulta3']);
$objVacina->bindParam(':tripliceviral2',$_POST['tripliceviral2']);
$objVacina->bindParam(':febreamarela3',$_POST['febreamarela3']);
$objVacina->bindParam(':hpv2',$_POST['hpv2']);
$objVacina->bindParam(':meningococicacreforco',$_POST['meningococicacreforco']);
$objVacina->bindParam(':hepatiteb4',$_POST['hepatiteb4']);
$objVacina->bindParam(':duplaadulta4',$_POST['duplaadulta4']);
$objVacina->bindParam(':febreamarela4',$_POST['febreamarela4']);
$objVacina->bindParam(':tripliceviral',$_POST['tripliceviral']);
$objVacina->bindParam(':hepatiteb5',$_POST['hepatiteb5']);
$objVacina->bindParam(':duplaadulta5',$_POST['duplaadulta5']);
$objVacina->bindParam(':hepatiteb6',$_POST['hepatiteb6']);
$objVacina->bindParam(':febreamarela5',$_POST['febreamarela5']);
$objVacina->bindParam(':duplaadulta6',$_POST['duplaadulta6']);
$objVacina->bindParam(':tripliceviral3',$_POST['tripliceviral3']);
$objVacina->bindParam(':idEndereco', $id1);

if ( $objVacina->execute() ) {
	echo 'Contato gravado com sucesso!';
	
} else {

	echo' :-( deu erro, tente novamente! ';
	
}
$senha1= $_POST['senha'];
$cpf= $_POST['cpf'];


if (password_verify( $senha1, $senha)){
	$_SESSION['a'] = $cpf;
	$_SESSION['b'] = $_POST['mdEscuro'];
    $_SESSION['usuariolog'] = true;
   header("Location: cadastro1.php");
    
  die();
}else{
	header("Location: login.php");  
}