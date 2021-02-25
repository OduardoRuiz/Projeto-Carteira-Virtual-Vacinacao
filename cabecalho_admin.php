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
    <title>Vacina Virtual Admin</title>
</head>

<body>
    <header>
        <div id="menu1">
            <nav>
                <ul>
                    <a href="index.php">
                        <img id="logo" src="imagens/logo_carteira1.png" alt="">
                    </a>
                    <li><a href="post.php">Post</a></li>
                    <li><a href="post1.php">Apagar Post</a></li>
                    <li><a href="imagem_home.php">Imagem Home</a></li>
                </ul>
            </nav>
        </div>
        <div id="menu2">
            <nav>
                <ul>
                    <?php
 if (!isset($_SESSION['adminlog'])) {
	header("Location: admin.php");
    session_destroy();
    echo"<li><a href='admin.php'>Login</a></li>";
}
    echo"<li><a href='sair.php'>Sair</a></li>";
  
?>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>