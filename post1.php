<?php


session_start();

if (!isset($_SESSION['adminlog'])) {
	header("Location: admin.php");
	session_destroy();
}

require_once 'bd.php';


$tabela = array();

$lista_sql = 'SELECT id, texto,imagem ,link FROM Post ORDER BY id';

foreach ($objBanco->query($lista_sql) as $registro) {
        $tabela[$registro['id']] = [
        'texto' => $registro['texto'],
        'imagem' => $registro['imagem'],
        'link' => $registro['link']
    ];
}

include "cabecalho_admin.php";

?>
<section id="post1">

    <div id="topo1">
        <div id='p3'>ID</div>
        <div id='p4'>Imagem</div>
        <div id='p5'>Texto</div>
        <div id='p6'>Link</div>
        <div id='p7'>apagar</div>
    </div>
    <?php
            if (count($tabela) > 0) { // Se tiver dado na tabela

                foreach ($tabela as $id => $reg) {

                    echo "	<div id='topo'>
										<div id='p3'>$id</div>
										<div id='p4'>{$reg['imagem']}</div>
                                        <div id='p5'>{$reg['texto']}</div>
                                        <div id='p6'>{$reg['link']}</div>
										<div id='p7'>
                                            <a href='apagar_post.php?id=$id'>
                                            <img id='apagar' src='imagens/apagar.png' alt='apagar'>
                                            </a> 
										</div>
							</div>";
                }
            } 
            ?>

</section>
<?php

include "rodape.php";
?>