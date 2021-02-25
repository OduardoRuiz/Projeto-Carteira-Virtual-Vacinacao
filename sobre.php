<?php 


session_start();

if (isset($_SESSION['usuariolog'])) {
	$_SESSION['a'];
	
}

include "cabecalho.php"; 
?>

<section id="sobre">
    <h2>Sobre a Vacina Virtual</h2>
    <div id="tudo">
        <div>
            <img src="imagens/vacinao.png" alt="">
        </div>
        <div>

            <p>
                Somos uma instituição sem fins lucrativos que por meio de uma
                rede de voluntários de profissionais de saúde e tecnologia, promove a inclusão social e o acesso a saúde
                para pessoas em situação de vulnerabilidade social que geralmente são assistidas por
                organizações sociais do terceiro setor.
            </p>
            <p>
                Nosso projeto atua principalmente, no controle de vacinas e sendo assim criamos essa Carteira virtual
                para o controle de vacinas dos nossos pacientes. O nosso objetivo é diminuir as lacunas do sistema
                público de saúde oferecendo um atendimento humanizado, a fim de conscientizar a população sobre a
                importância do auto cuidado.
            </p>
        </div>
    </div>
</section>

<?php 
include "rodape.php"; 
?>