<?php
 
include("cabecalho4.php");
 
 
$status = "s";
 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
}
 
 
if ($status == "all") {
    $sql = "SELECT * FROM usuarios";
} elseif ($status == 'n') {
    $sql = "SELECT * FROM usuarios WHERE usu_status = 's'";
} else {
    $sql = "SELECT * FROM usuarios WHERE usu_status = 'n'";
}
 
 
$retorno = mysqli_query($link, $sql);
?>
 
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE USUARIOS</title>
    <link rel="stylesheet" type="text/css" href="./css/cli.css">
</head>
 
<body>
    <div id="background">
        <form action="listausuario.php" method="post">
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
                    <th>Login</th>
                     <th>ATIVO</th>
                    <th>ALTERAR DADOS</th>
                   
                </tr>
                <?php
                while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                    <tr>
                       
                        <td><?= $tbl[1] ?></td>
                        <td><?= $check = ($tbl[3] == "n") ? "NÃO" : "SIM" ?></td>
                        <td><a href="alterausuario.php?id=<?= $tbl[0] ?>"><input type="button" value="CLIQUE PRA  ALTERAR"> </a></td>
                       
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>