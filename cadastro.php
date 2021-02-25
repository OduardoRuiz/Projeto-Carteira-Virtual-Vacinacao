<?php
include "cabecalho.php";


session_start();

if (isset($_SESSION['usuariolog'])) {
	header("Location: cadastro1.php");
	
}

?>

<section id="cadastro">

    <form enctype="multipart/form-data" action="inserir.php" method="POST">

        <fieldset>

            <h3>Preencha com suas informações abaixo.</h3>
            <div>
                <label for="">
                    Nome Completo:
                </label>
                <input type="text" name="nome" id="" style="width: 25em" required="required">

                <label for="">
                    Foto:
                </label>
                <input type="file" name="foto" id="">

                <div class="custom-control custom-switch">
                    <input type="checkbox" name="mdEscuro" class="custom-control-input" id="customSwitch1"
                        onclick="modoEscuro()">
                    <label class="custom-control-label" for="customSwitch1" id="md">Modo Normal Ativo</label>
                </div>

            </div>

            <div>
                <label for="">
                    CPF:
                </label>
                <input type="text" name="cpf" id="cpf" onkeypress="soNumero(this.id)" minlength="11" maxlength="14"
                    required="required">
            </div>

            <div>
                <label for="">
                    SUS:
                </label>
                <input type="text" name="sus" id="sus" onkeypress="soNumero(this.id);" required="required">
            </div>

            <div>
                <label for="">
                    Senha:
                </label>
                <input type="text" name="senha" id="senha" minlength="8" maxlength="8" required="required">

                <label for="">
                    Confirmar Senha:
                </label>
                <input type="text" name="senha1" id="senha1" minlength="8" maxlength="8" required="required">
            </div>

        </fieldset>

        <fieldset>

            <h3>Endereço</h3>

            <div>
                <label>
                    Cep:
                </label>
                <input type="text" name="cep" id="cep" onblur="cadastro.cep.pesquisacep(this.value);" value=""
                    maxlength="9" onkeypress="soNumero(this.id)" required="required">
                <span>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd"
                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                </span>
            </div>

            <div>
                <label>
                    Rua:
                </label>
                <input type="text" name="rua" id="rua" style="width: 20em">

                <label>
                    Nº:
                </label>
                <input type="text" name="numero" id="numero" style="width: 5em" required="required">

                <label>
                    Complemento:
                </label>
                <input type="text" name="complemento" id="complemento">
            </div>

            <div>
                <label>
                    Bairro:
                </label>
                <input type="text" name="bairro" id="bairro">

                <label>
                    Estado:
                </label>
                <input type="text" name="estado" id="estado" style="width: 3em">

                <label>
                    Cidade:
                </label>
                <input type="text" name="cidade" id="cidade">
            </div>

        </fieldset>

        <h4 class="centro">Carteira de Vacina</h4>

        <div id="menuEscolha">
            <a class="btn btn-primary" data-toggle="collapse" href="#mostrar" role="button" aria-expanded="false"
                style="width: 8em">
                Criança
            </a>

            <a class="btn btn-primary" data-toggle="collapse" href="#mostrar1" role="button" aria-expanded="false"
                style="width: 8em">
                Adolescente
            </a>

            <a class="btn btn-primary" data-toggle="collapse" href="#mostrar2" role="button" aria-expanded="false"
                style="width: 8em">
                Adulto
            </a>

            <a class="btn btn-primary" data-toggle="collapse" href="#mostrar3" role="button" aria-expanded="false"
                style="width: 8em">
                Gestante
            </a>

            <a class="btn btn-primary" data-toggle="collapse" href="#mostrar4" role="button" aria-expanded="false"
                style="width: 8em">
                Idoso
            </a>

        </div>

        <div class="collapse" id="mostrar">
            <div class="card card-body" id="faixaetaria">
                <h3 class="centro">Criança</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Idade</th>
                            <th>BCG</th>
                            <th>Hepatite B</th>
                            <th>Pentavalente</th>
                            <th>VIP</th>
                            <th>VORH</th>
                            <th>Pneumocócica 10</th>
                            <th>Meningocócica C</th>
                            <th>Febre Amarela</th>
                            <th>SRC</th>
                            <th>VOP</th>
                            <th>Hepatite A</th>
                            <th>DTP</th>
                            <th>SCRV</th>
                            <th>Varicela</th>
                            <th>HPV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Ao Nascer</th>
                            <td><input type="checkbox" name="bcg" id=""></td>
                            <td><input type="checkbox" name="hepatiteb" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2 Meses</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="pentavalente" id=""></td>
                            <td><input type="checkbox" name="vip" id=""></td>
                            <td><input type="checkbox" name="vorh" id=""></td>
                            <td><input type="checkbox" name="pneumococica10" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3 Meses</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="meningococicac" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">4 Meses</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="pentavalente2" id=""></td>
                            <td><input type="checkbox" name="vip2" id=""></td>
                            <td><input type="checkbox" name="vorh2" id=""></td>
                            <td><input type="checkbox" name="pneumococica102" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">5 Meses</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="meningococicac2" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">6 Meses</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="pentavalente3" id=""></td>
                            <td><input type="checkbox" name="vip3" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">9 Meses</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="febreamarela" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">12 Meses</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="pneumococica10reforco" id=""></td>
                            <td><input type="checkbox" name="meningococicareforco" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="src" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">15 Meses</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="vop1" id=""></td>
                            <td><input type="checkbox" name="hepatitea" id=""></td>
                            <td><input type="checkbox" name="dtp1" id=""></td>
                            <td><input type="checkbox" name="scrv" id=""></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">4 Anos</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="febreamarela2" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="vop2" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="dtp2" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="varicela" id=""></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">9 Anos (F)</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="hpv" id=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="collapse" id="mostrar1">
            <div class="card card-body" id="faixaetaria">
                <h3 class="centro">Adolescente</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Idade</th>
                            <th>Hepatite B</th>
                            <th>Meningocócica C</th>
                            <th>Febre Amarela</th>
                            <th>SRC</th>
                            <th>HPV</th>
                            <th>dT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">11 a 19 Anos</th>
                            <td><input type="checkbox" name="hepatiteb3" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="febreamarela3" id=""></td>
                            <td><input type="checkbox" name="tripliceviral2" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="duplaadulta3" id=""></td>
                        </tr>
                        <tr>
                            <th scope="row">11 a 14 Anos (M)</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="hpv2" id=""></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">11 a 14 (F e M)</th>
                            <td></td>
                            <td><input type="checkbox" name="meningococicacreforco" id=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="collapse" id="mostrar2">
            <div class="card card-body" id="faixaetaria">
                <h3 class="centro">Adulto</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Idade</th>
                            <th>Hepatite B</th>
                            <th>Febre Amarela</th>
                            <th>SRC</th>
                            <th>dT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">20 a 59 Anos</th>
                            <td><input type="checkbox" name="hepatiteb4" id=""></td>
                            <td><input type="checkbox" name="febreamarela4" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="duplaadulta4" id=""></td>
                        </tr>
                        <tr>
                            <th scope="row">20 a 49 Anos</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="tripliceviral" id=""></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="collapse" id="mostrar3">
            <div class="card card-body" id="faixaetaria">
                <h3 class="centro">Gestante</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Idade</th>
                            <th>Hepatite B</th>
                            <th>dT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Gestante</th>
                            <td><input type="checkbox" name="hepatiteb5" id=""></td>
                            <td><input type="checkbox" name="duplaadulta5" id=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="collapse" id="mostrar4">
            <div class="card card-body" id="faixaetaria">
                <h3 class="centro">Idoso</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Idade</th>
                            <th>Hepatite B</th>
                            <th>Febre Amarela</th>
                            <th>SRC</th>
                            <th>dT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">20 a 59 Anos</th>
                            <td><input type="checkbox" name="hepatiteb6" id=""></td>
                            <td><input type="checkbox" name="febreamarela5" id=""></td>
                            <td></td>
                            <td><input type="checkbox" name="duplaadulta6" id=""></td>
                        </tr>
                        <tr>
                            <th scope="row">20 a 49 Anos</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="tripliceviral3" id=""></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <fieldset>


        </fieldset>
        <div id="button">
            <button type="submit" class="btn btn-success" onclick="cadastro.senha.confirmacao();">Enviar</button>
        </div>
    </form>
</section>

<?php
include "rodape.php";
?>