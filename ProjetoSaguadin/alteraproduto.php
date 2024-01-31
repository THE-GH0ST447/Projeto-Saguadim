<?php
    #INICIA A CONEXÃO COM O BANCO DE DADOS
    include("cabecalho4.php");
 
    if ($_SERVER["REQUEST_METHOD"] == "POST")  {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $desc = $_POST['desc'];
        $preco = $_POST['preco'];
        $custo = $_POST['custo'];
        $quant = $_POST['quant'];
        $status = $_POST['status'];
        $val = $_POST['val'];
        $for_id = $_POST['fornecedor'];
       
 
   
      $sql = "UPDATE produtos SET pro_nome = '$nome', pro_desc = '$desc', pro_quant = '$quant', pro_preco = '$preco', pro_val = '$val', pro_status = '$status' WHERE pro_id = $id";
   
 
       mysqli_query($link, $sql);
 
       echo "<script>window.alert('PRODUTO ALTERADO COM SUCESSO!');</script>";
       echo "<script>window.location.href='listaproduto.php';</script>";
       exit();
    }
 
 
 
 
 
 
    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos WHERE pro_id = '$id'";
    $retorno = mysqli_query($link, $sql);
 
    while ($tbl = mysqli_fetch_array($retorno)) {
        $nome = $tbl[1];
        $desc = $tbl[2];
        $preco = $tbl[3];
        $custo = $tbl[4];
        $quant = $tbl[5];
        $status = $tbl[9];
         
       
    }
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/cli.css">
    <title>altera produto</title>
</head>
<body>
    <div>
        <form action="alteraproduto.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label>NOME:</label>
            <input type="text" name="nome" value="<?= $nome ?>" required>
            <p></p>
            <label>DESCRIÇÃO:</label>
            <input type="text" name="desc" value="<?= $desc ?>" required>
            <p></p>
            <label>PREÇO:</label>
            <input type="number" name="preco" value="<?= $preco ?>" required>
            <p></p>
            <label>CUSTO:</label>
            <input type="number" name="custo" value="<?= $custo ?>" required>
            <p></p>
            <label>QUANTIDADE:</label>
            <input type="text" name="quant" value="<?= $quant ?>" required>
            <p></p>
            <label>STATUS: <?= $check = ($status == 's') ? "ATIVO" : "INATIVO" ?></label>
            <p></p>
            <input type="date" name="val" id="val">
            <input type="radio" name="status" value="s" <?= $status == "s" ? "checked" : "" ?>>ATIVO<br>
            <input type="radio" name="status" value="n" <?= $status == "n" ? "checked" : "" ?>>INATIVO<br>
            <br>
            <select name="fornecedor" id="fornecedor" required>
               
                <br><br><br><br>
                    <?php
   
                    $sql = "SELECT for_id, for_nome FROM fornecedor";
                    $retorno = mysqli_query($link, $sql);
   
                    while($tbl = mysqli_fetch_array($retorno)) {
                       
                       
                   
                    ?>
                    <option value="<?=$tbl[0]?>"><?=$tbl[1]?></option>
                    <?php
                    }
                    ?>
                </select><br>
            <input type="submit" value="SALVAR">
        </form>
    </div>
</body>
</html>