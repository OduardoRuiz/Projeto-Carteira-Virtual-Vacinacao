<?php

session_start();

if (isset($_SESSION['usuariolog'])) {
	$_SESSION['a'];
	
}

require_once 'bd.php';

//Consulta para listar meus contatos
$tabela = array();

$lista_sql = 'SELECT id, texto,imagem ,link FROM Post ORDER BY id';

foreach ($objBanco->query($lista_sql) as $registro) {
        $tabela[$registro['id']] = [
        'texto' => $registro['texto'],
        'imagem' => $registro['imagem'],
        'link' => $registro['link']
    ];
}

include "cabecalho.php";

?>
<section id="noticia">


    <?php
            if (count($tabela) > 0) { // Se tiver dado na tabela

                foreach ($tabela as $id => $reg) {

                    echo "	<div id='topo2'>	
                                    <div id='p2'><a href={$reg['link']} target='_blank'><img src='imagens/imagem/{$reg['imagem']}' style='width:8em;height:7em;'></a></div>
                                    <div id='p1'>{$reg['texto']}</div>
                            </div>
                            
										
									";
                }
            } 
            ?>


</section>

<?php

include "rodape.php";
?>