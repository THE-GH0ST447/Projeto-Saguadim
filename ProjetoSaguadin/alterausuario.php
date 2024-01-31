<?php
    #INICIA A CONEXÃO COM O BANCO DE DADOS
    include("cabecalho4.php");
 
    if ($_SERVER["REQUEST_METHOD"] == "POST")  {
        $id = $_POST['id'];
        $login = $_POST['login'];
        $status = $_POST['status'];
       
 
     
       $sql = "UPDATE usuarios SET usu_login = '$login', usu_status = '$status' WHERE usu_id = $id";
 
       mysqli_query($link, $sql);
 
       echo "<script>window.alert('USUARIO ALTERADO COM SUCESSO!');</script>";
       echo "<script>window.location.href='listausuario.php';</script>";
       exit();
    }
 
 
 
 
 
 
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
    $retorno = mysqli_query($link, $sql);
 
    while ($tbl = mysqli_fetch_array($retorno)) {
        $login = $tbl[1];
        $status = $tbl[3];
         
       
    }
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cli.css">
    <title>altera usuario</title>
</head>
<body>
    <div>
        <form action="alterausuario.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label>NOME:</label>
            <input type="text" name="login" value="<?= $login ?>" required>
            <p></p>
            <label>STATUS: <?= $check = ($status == 's') ? "ATIVO" : "INATIVO" ?></label>
            <p></p>
            <input type="radio" name="status" value="s" <?= $status == "s" ? "checked" : "" ?>>ATIVO<br>
            <input type="radio" name="status" value="n" <?= $status == "n" ? "checked" : "" ?>>INATIVO<br>
            <br>
            <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>