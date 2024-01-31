<?php

include("cabecalho4.php");


$status = "s";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
}


if ($status == "all") {
    $sql = "SELECT * FROM clientes";
} elseif ($status == 's') {
    $sql = "SELECT * FROM clientes WHERE cli_status = 'n'";
} else {
    $sql = "SELECT * FROM clientes WHERE cli_status = 's'";
}


$retorno = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR DE CLIENTES</title>
    <link rel="stylesheet" type="text/css" href="./css/cli.css">
</head>

<body>
    <div id="background">
    <form action="listacliente.php" method="post">
            <input type="radio" name="status" class="radio" value="s" required onclick="submit()" <?= $status == "s" ? "checked" : "" ?>>INATIVOS
            <br>
            <input type="radio" name="status" class="radio" value="n" required onclick="submit()" <?= $status == "n" ? "checked" : "" ?>>ATIVOS
            <br>
            <input type="radio" name="status" class="radio" value="all" required onclick="submit()" <?= $status == "all"? "checked" : "" ?>>MOSTRAR TODOS
            <br>
        </form>
        <div class="container">
            <table border="1">
                <tr>
                    <th>NOME</th>
                    <th>SALA</th>
                    <th>CURSO</th>
                    <th>ATIVO</th>
                    <th>ALTERAR DADOS</th>
                </tr>
                <?php
                while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                    <tr>
                        
                        <td><?= $tbl[1] ?></td>
                        <td><?= $tbl['cli_sala'] ?></td>
                        <td><?= $tbl['cli_curso'] ?></td>
                        <td><?= $check = ($tbl[7] == "n") ? "NÃO" : "SIM" ?></td>
                        <td><a href="alteraclientes.php?id=<?= $tbl[0] ?>"><input type="button" value="CLIQUE PRA  ALTERAR"> </a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
