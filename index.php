<?php

require_once 'bd.php';


$tabela = array();

$lista_sql = 'SELECT * FROM Carrousel ORDER BY id';

foreach ($objBanco->query($lista_sql) as $registro) {
        $tabela[$registro['id']] = [
        
        'imagem' => $registro['imagem']
        
    ];
}

session_start();

if (isset($_SESSION['usuariolog'])) {
	$_SESSION['a'];
	
}

include "cabecalho.php";

?>

<section id="home">
    <div id="baner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                 $i = 1;
                 if (count($tabela) > 0) { // Se tiver dado na tabela
                 foreach ($tabela as $id => $reg) {
                    echo "		
                    <li data-target='#carouselExampleIndicators' data-slide-to=$i></li>";
                }
                $i++;
                } 
                ?>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagens/carrousel/inf3.png" width="90%" height="450">
                </div>
                <?php
            if (count($tabela) > 0) { // Se tiver dado na tabela
                foreach ($tabela as $id => $reg) {
                    echo "		
                        <div class='carousel-item '>
                        <img  src='imagens/carrousel/{$reg['imagem']}' width='90%' height='450'></div>   
							";
                }
            } 
            ?>
            </div><a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>





    </div>
    <article>
        <div>
            <a href="noticia.php">
                <img id="img-medico" src="imagens/medicovacinamao.jpg" alt="">
            </a>
        </div>
        <div>
            <a href="cadastro.php">
                <img id="img-medico1" src="imagens/Cadastro.png" alt="">
            </a>
        </div>
        <div id="img_vacinao">
            <a href="sobre.php">
                <img src="imagens/vacinao.png" alt="">
            </a>
        </div>
    </article>
</section>

<?php
include "rodape.php";
?>