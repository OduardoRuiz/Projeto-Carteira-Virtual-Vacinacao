<?php

include "cabecalho.php";

?>


<section id="login">
    <h2>Login Admin</h2>

    <h6>
        <?php
    session_start();
    if (isset($_SESSION['errologinadmin'])) echo $_SESSION['errologinadmin'];
    session_destroy();
    ?>
    </h6>

    <form action="validacao1.php" method="post">
        <fieldset>
            <div>
                <label>
                    CPF:
                </label>
                <input type="text" name="cpf" id="" style="width: 11em" required="required">
            </div>

            <div>
                <label>
                    Senha:
                </label>
                <input type="password" name="senha" id="" style="width: 10em" required="required">
            </div>

        </fieldset>

        <div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    </form>

</section>



<?php

include "rodape.php";

?>