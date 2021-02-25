<?php

session_start();

if (!isset($_SESSION['adminlog'])) {
	header("Location: admin.php");
	session_destroy();
}

require_once 'bd.php';

//Consulta para listar meus contatos
$tabela = array();

$lista_sql = 'SELECT id, imagem  FROM Carrousel ORDER BY id';

foreach ($objBanco->query($lista_sql) as $registro) {
        $tabela[$registro['id']] = [
        'imagem' => $registro['imagem'],
    ];
}


include "cabecalho_admin.php";

?>

<section id="post">

    <form enctype="multipart/form-data" action="inserirpost.php" method="post">

        <fieldset>


            <div>
                <label for="">
                    Foto:
                </label>
                <input type="file" name="imagemhome" id="">
            </div>

        </fieldset>
        <div id="p2">
            <button class="btn btn-primary" type="submit">ENVIAR</button>
        </div>
    </form>
</section>

<section id="post1">

    <div id="topo1">
        <div id='p3'>ID</div>
        <div id='p4'>Imagem</div>
        <div id='p7'>apagar</div>
    </div>
    <?php
            if (count($tabela) > 0) { // Se tiver dado na tabela

                foreach ($tabela as $id1 => $reg) {

                    echo "	<div id='topo'>
										<div id='p3'>$id1</div>
										<div id='p4'>{$reg['imagem']}</div>
										<div id='p7'>
                                            <a href='apagar_post.php?id=$id1'>
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