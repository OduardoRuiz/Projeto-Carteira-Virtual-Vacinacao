<?php

session_start();

if (!isset($_SESSION['adminlog'])) {
	header("Location: admin.php");
	session_destroy();
}

include "cabecalho_admin.php";

?>

<section id="post">


    <form enctype="multipart/form-data" action="inserirpost.php" method="post">

        <h3>Preencha o post com informações que ira para a pagina Noticias.</h3>

        <fieldset>
            <div id="texto">
                <div>
                    <label for="">
                        Texto:
                    </label>
                </div>
                <div>

                    <textarea type="text" name="texto" id="" cols="70" rows="5"></textarea>
                </div>
            </div>

            <div>
                <label for="">
                    Foto:
                </label>
                <input type="file" name="imagem" id="">
            </div>

            <div>
                <label for="">
                    Link:
                </label>
                <input type="text" name="link" id="" style="width: 25em">
            </div>

        </fieldset>
        <div id="p2">
            <button class="btn btn-primary" type="submit">ENVIAR</button>
        </div>
    </form>
</section>

<?php
include "rodape.php";

?>