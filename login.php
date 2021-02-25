<?php

include "cabecalho.php";

?>


<section id="login">
    <h2>Login</h2>

    <h6>
        <?php
    session_start();
    if (isset($_SESSION['errologin'])) echo $_SESSION['errologin'];
    session_destroy();
    ?>
    </h6>


    <form action="validacao.php" method="post">
        <fieldset>
            <div>
                <label>
                    CPF:
                </label>
                <input type="text" name="cpf" id="cpf" onkeypress="soNumero(this.id)" minlength="11" maxlength="14"
                    required="required">
            </div>

            <div>
                <label>
                    Senha:
                </label>
                <input type="password" name="senha" id="" style="width: 10em" minlength="8" maxlength="8"
                    required="required">
            </div>

            <div>
                <p><a href="cadastro.php">Ainda não tem cadastro ?</a></p>
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