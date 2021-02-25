<?php

require_once "bd.php";


$statement = $objBanco->prepare("SELECT * FROM Cadastro;");
$statement1 = $objBanco->prepare("SELECT * FROM Endereco;");

$statement->execute();
$statement1->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);
$users1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script/script.js"></script>
    <title>Lista de Usuários</title>
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table, th, tr, td {
            padding: 10px;
            font-size: 25px;
            border-collapse: collapse;
        }
        table, th {
            border: 2px solid #FF760C;
        }
        td {
            border-bottom: 1px solid #8395a7;
            border-right: 1px solid #8395a7;
        }
    </style>
</head>
<body onload="myFunction()">


    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nome do Usuário</th>
                <th>cfp</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($users as $user): ?>
                <tr> 
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['nome'] ?></td>
                    <td><?php echo $user['cpf'] ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <br>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>cep</th>
                <th>rua</th>
                <th>idcadastro</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($users1 as $user): ?>
                <tr> 
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['cep'] ?></td>
                    <td><?php echo $user['rua'] ?></td>
                    <td><?php echo $user['idCadastro'] ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</body>
</html> 

