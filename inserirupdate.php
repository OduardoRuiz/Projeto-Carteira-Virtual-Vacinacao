<?php


session_start();

require_once "bd.php";


$chavecpf=$_SESSION['a'];


$chave = $objBanco->prepare("SELECT id, senha FROM Cadastro WHERE cpf = '$chavecpf';");
$chave->execute();
$users = $chave->fetch();

$chave1 = $objBanco->prepare("SELECT id  FROM Endereco WHERE idCadastro = '$users[0]';");
$chave1->execute();
$users1 = $chave1->fetch();

$diretorio='imagens/fotos/';
$foto1 = $_FILES['foto']['name'];
$foto2 = $_POST['foto'];
if($foto1==true){
  $foto3=$foto1;
}
else{
  $foto3=$foto2;
}

$objCadastro = $objBanco->prepare("	UPDATE Cadastro SET nome=:nome, cpf=:cpf, senha=:senha, sus=:sus, foto=:foto, mdEscuro=:mdEscuro WHERE id = $users[0] ");


$objCadastro->bindParam(':nome', $_POST['nome']);			
$objCadastro->bindParam(':cpf', $_POST['cpf']);
$objCadastro->bindParam(':senha', $users[1]);
$objCadastro->bindParam(':sus', $_POST['sus']);	
$objCadastro->bindParam(':foto', $foto3);
$objCadastro->bindParam(':mdEscuro', $_POST['mdEscuro']);

if ( $objCadastro->execute() ) {

	$diretorio='imagens/fotos/';
	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$foto1);
	echo 'Contato gravado com sucesso!';

} else {

    echo' :-( deu erro, tente novamente! ';
    var_dump($_POST);
    var_dump(':nome');
}



$objEndereco = $objBanco->prepare("	UPDATE Endereco SET cep=:cep, rua=:rua, numero=:numero, complemento=:complemento, bairro=:bairro, estado=:estado, cidade=:cidade, idCadastro=:idCadastro WHERE idCadastro=$users[0] ");


$objEndereco->bindParam(':cep', $_POST['cep']);		
$objEndereco->bindParam(':rua', $_POST['rua']);
$objEndereco->bindParam(':numero', $_POST['numero']);
$objEndereco->bindParam(':complemento', $_POST['complemento']);	
$objEndereco->bindParam(':bairro', $_POST['bairro']);
$objEndereco->bindParam(':estado', $_POST['estado']);
$objEndereco->bindParam(':cidade', $_POST['cidade']);
$objEndereco->bindParam(':idCadastro', $users[0]);

if ( $objEndereco->execute() ) {
	echo 'Contato gravado com sucesso!';
} else {

	echo' :-( deu erro, tente novamente! ';
}




$objVacina = $objBanco->prepare("UPDATE Vacina SET  bcg=:bcg, hepatiteb=:hepatiteb, pentavalente=:pentavalente, vip=:vip, vorh=:vorh, pneumococica10=:pneumococica10, meningococicac=:meningococicac, pentavalente2=:pentavalente2, vip2=:vip2, vorh2=:vorh2, pneumococica102=:pneumococica102, meningococicac2=:meningococicac2, pentavalente3=:pentavalente3, vip3=:vip3, febreamarela=:febreamarela, pneumococica10reforco=:pneumococica10reforco, src=:src, meningococicareforco=:meningococicareforco, vop1=:vop1, hepatitea=:hepatitea, dtp1=:dtp1, scrv=:scrv, dtp2=:dtp2, vop2=:vop2, varicela=:varicela, febreamarela2=:febreamarela2, hpv=:hpv, hepatiteb3=:hepatiteb3, duplaadulta3=:duplaadulta3, tripliceviral2=:tripliceviral2, febreamarela3=:febreamarela3, hpv2=:hpv2, meningococicacreforco=:meningococicacreforco, hepatiteb4=:hepatiteb4, duplaadulta4=:duplaadulta4, febreamarela4=:febreamarela4, tripliceviral=:tripliceviral, hepatiteb5=:hepatiteb5, duplaadulta5=:duplaadulta5, hepatiteb6=:hepatiteb6, febreamarela5=:febreamarela5, duplaadulta6=:duplaadulta6, tripliceviral3=:tripliceviral3, idEndereco=:idEndereco WHERE idEndereco = $users1[0]");



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
$objVacina->bindParam(':idEndereco', $users1[0]);

if ( $objVacina->execute() ) {
	echo 'Contato gravado com sucesso!';
	
} else {

	echo' :-( deu erro, tente novamente! ';
	
}
$senha= $users[1];
$cpf= $_POST['cpf'];


$statement = $objBanco->prepare("SELECT cpf, senha FROM Cadastro WHERE senha = '$senha' AND cpf = '$cpf';");

$statement-> execute();

$count = $statement->rowCount();


if ($count==0){
    
   
    
  die();
}else{
    $_SESSION['a'] = $cpf;
    $_SESSION['b'] = $_POST['mdEscuro'];
    $_SESSION['usuariolog'] = true;
  header("Location: cadastro1.php");
}

