<?php

session_start();

if (!isset($_SESSION['usuariolog'])) {
	header("Location: index.php");
	session_destroy();
}

require_once "bd.php"; 

$n1 = $_SESSION['a'];

$statement = $objBanco->prepare("SELECT * FROM Cadastro WHERE cpf = '$n1';");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
$cadastro=$users[0];

$n2 =$cadastro['id'];

$statement1 = $objBanco->prepare("SELECT * FROM Endereco WHERE idCadastro = '$n2';");
$statement1->execute();
$users1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
$endereco=$users1[0];

$n3 =$endereco['id'];

$statement2 = $objBanco->prepare("SELECT * FROM Vacina WHERE idEndereco = '$n3';");
$statement2->execute();
$users2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
$vacina=$users2[0];




include "cabecalho.php";

?>

<section id="cadastro">

    <div id="button">
        <button class="btn btn-success" onclick="liberar()">Liberar Atualização</button>
    </div>

    <fieldset id="fieldset" disabled>
        <form enctype="multipart/form-data" action="inserirupdate.php" method="post">

            <fieldset>

                <h3>Preencha com suas informações abaixo.</h3>
                <div>
                    <label for="">
                        Nome Completo:
                    </label>
                    <input type="text" name="nome" id="" style="width: 25em" required="required"
                        value="<?php echo $cadastro['nome'] ?>">

                    <label for="">
                        Foto:
                    </label>
                    <input type="hidden" name="foto" id="novafoto" value="<?php echo $cadastro['foto'] ?>">
                    <span id="botaonovafoto" onclick="nova()">Nova Foto</span>

                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="mdEscuro" class="custom-control-input" id="customSwitch1"
                            onclick="modoEscuro()" <?php echo $cadastro['mdEscuro']=='on'?"checked":" ";?>>
                        <label class="custom-control-label" for="customSwitch1" id="md">Modo Normal Ativo</label>
                    </div>
                </div>

                <div id="foto">

                    <img src="imagens/fotos/<?php echo $cadastro['foto'] ?>" style="width:8em;height:7em;">

                </div>

                <div>
                    <label for="">
                        CPF:
                    </label>
                    <input type="text" name="cpf" id="cpf" readonly value="<?php echo $cadastro['cpf'] ?>">
                </div>

                <div>
                    <label for="">
                        SUS:
                    </label>
                    <input type="text" name="sus" id="sus" onkeypress="soNumero(this.id);" required="required"
                        value="<?php echo $cadastro['sus'] ?>">
                </div>

            </fieldset>


            <h3>Endereço</h3>

            <div>
                <label>
                    Cep:
                </label>
                <input type="text" name="cep" id="cep" onblur="cadastro.cep.pesquisacep(this.value);"
                    value="<?php echo $endereco['cep'] ?>" maxlength="9" onkeypress="soNumero(this.id)"
                    required="required">
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
                <input type="text" name="rua" id="rua" style="width: 20em" value="<?php echo $endereco['rua'] ?>">

                <label>
                    Nº:
                </label>
                <input type="text" name="numero" id="numero" style="width: 5em" required="required"
                    value="<?php echo $endereco['numero'] ?>">

                <label>
                    Complemento:
                </label>
                <input type="text" name="complemento" id="complemento" value="<?php echo $endereco['complemento'] ?>">
            </div>

            <div>
                <label>
                    Bairro:
                </label>
                <input type="text" name="bairro" id="bairro" value="<?php echo $endereco['bairro'] ?>">

                <label>
                    Estado:
                </label>
                <input type="text" name="estado" id="estado" style="width: 3em"
                    value="<?php echo $endereco['estado'] ?>">

                <label>
                    Cidade:
                </label>
                <input type="text" name="cidade" id="cidade" value="<?php echo $endereco['cidade'] ?>">
            </div>

    </fieldset>
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
    <fieldset id="fieldset" disabled>
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
                            <td><input type="checkbox" name="bcg" id=""
                                    <?php echo $vacina['bcg']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="hepatiteb" id=""
                                    <?php echo $vacina['bcg']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="pentavalente" id=""
                                    <?php echo $vacina['pentavalente']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="vip" id=""
                                    <?php echo $vacina['vip']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="vorh" id=""
                                    <?php echo $vacina['vorh']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="pneumococica10" id=""
                                    <?php echo $vacina['pneumococica10']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="pentavalente2" id=""
                                    <?php echo $vacina['pentavalente2']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="vip2" id=""
                                    <?php echo $vacina['vip2']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="vip2" id=""
                                    <?php echo $vacina['vip2']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="pneumococica102" id=""
                                    <?php echo $vacina['pneumococica102']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="meningococicac2" id=""
                                    <?php echo $vacina['meningococicac2']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="pentavalente3" id=""
                                    <?php echo $vacina['pentavalente3']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="vip3" id=""
                                    <?php echo $vacina['vip3']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="febreamarela" id=""
                                    <?php echo $vacina['febreamarela']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="pneumococica10reforco" id=""
                                    <?php echo $vacina['pneumococica10reforco']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="pneumococica10reforco" id=""
                                    <?php echo $vacina['pneumococica10reforco']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="src" id=""
                                    <?php echo $vacina['src']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="vop1" id=""
                                    <?php echo $vacina['vop1']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="hepatitea" id=""
                                    <?php echo $vacina['hepatitea']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="dtp1" id=""
                                    <?php echo $vacina['dtp1']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="scrv" id=""
                                    <?php echo $vacina['scrv']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="febreamarela2" id=""
                                    <?php echo $vacina['febreamarela2']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="vop2" id=""
                                    <?php echo $vacina['vop2']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="dtp2" id=""
                                    <?php echo $vacina['dtp2']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="varicela" id=""
                                    <?php echo $vacina['varicela']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="hpv" id=""
                                    <?php echo $vacina['hpv']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="hepatiteb3" id=""
                                    <?php echo $vacina['hepatiteb3']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="febreamarela3" id=""
                                    <?php echo $vacina['febreamarela3']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="tripliceviral2" id=""
                                    <?php echo $vacina['tripliceviral2']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="duplaadulta3" id=""
                                    <?php echo $vacina['duplaadulta3']=='on'?"checked":" ";?>></td>
                        </tr>
                        <tr>
                            <th scope="row">11 a 14 Anos (M)</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="hpv2" id=""
                                    <?php echo $vacina['hpv2']=='on'?"checked":" ";?>></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">11 a 14 (F e M)</th>
                            <td></td>
                            <td><input type="checkbox" name="meningococicacreforco" id=""
                                    <?php echo $vacina['meningococicacreforco']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="hepatiteb4" id=""
                                    <?php echo $vacina['hepatiteb4']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="febreamarela4" id=""
                                    <?php echo $vacina['febreamarela4']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="duplaadulta4" id=""
                                    <?php echo $vacina['duplaadulta4']=='on'?"checked":" ";?>></td>
                        </tr>
                        <tr>
                            <th scope="row">20 a 49 Anos</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="tripliceviral" id=""
                                    <?php echo $vacina['tripliceviral']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="hepatiteb5" id=""
                                    <?php echo $vacina['hepatiteb5']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="duplaadulta5" id=""
                                    <?php echo $vacina['duplaadulta5']=='on'?"checked":" ";?>></td>
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
                            <td><input type="checkbox" name="hepatiteb6" id=""
                                    <?php echo $vacina['hepatiteb6']=='on'?"checked":" ";?>></td>
                            <td><input type="checkbox" name="febreamarela5" id=""
                                    <?php echo $vacina['febreamarela5']=='on'?"checked":" ";?>></td>
                            <td></td>
                            <td><input type="checkbox" name="duplaadulta6" id=""
                                    <?php echo $vacina['duplaadulta6']=='on'?"checked":" ";?>></td>
                        </tr>
                        <tr>
                            <th scope="row">20 a 49 Anos</th>
                            <td></td>
                            <td></td>
                            <td><input type="checkbox" name="tripliceviral3" id=""
                                    <?php echo $vacina['tripliceviral3']=='on'?"checked":" ";?>></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div id="button">
            <button type="submit" class="btn btn-success">Atualizar</button>
        </div>

    </fieldset>


    </form>
</section>

<?php
include "rodape.php";
?>