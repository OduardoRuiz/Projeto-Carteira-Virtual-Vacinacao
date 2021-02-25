<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/logo_carteira1.png" type="image/x-icon">
    <script src="script/script.js"></script>
    <script src="script/jquery.js"></script>
    <script src="script/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Vacina Virtual</title>
</head>

<?php

require_once "bd.php"; 

if (isset($_SESSION['usuariolog'])) {
    $_SESSION['b'];
    
$n3= $_SESSION['b'];



if($n3=="on"){
    echo ("<body onload='modoEscuro1()'>");
}
else{
    echo("<body>");
}
}
?>



<header>
    <div id="menu1">
        <nav>
            <ul>
                <a href="index.php">
                    <img id="logo" src="imagens/logo_carteira1.png" alt="">
                </a>
                <li><a href="index.php">Home</a></li>
                <li><a href="noticia.php">Noticias</a></li>
                <li><a href="sobre.php">Sobre </a></li>
            </ul>
        </nav>
    </div>
    <div id="menu2">
        <nav>
            <ul>
                <?php
 if (isset($_SESSION['usuariolog'])) {
    echo"<li><a href='cadastro1.php'>Cadastro</a></li>";
	
}
else{
    echo"<li><a href='cadastro.php'>Cadastre-se</a></li>";
  }
?>

                <?php
 if (isset($_SESSION['usuariolog'])) {
    echo"<li><a href='sair.php'>Sair</a></li>";
	
}
else{
    echo"<li><a href='login.php'>Login</a></li>";
  }
?>
            </ul>
        </nav>
    </div>
</header>
</body>

</html>