<?php
include("cabecalho4.php");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $login = $_POST['login'];
 
    $key = RAND(100000, 999999);
 
    #INSERIR INSTRUÃ‡Ã•ES NO BANCO
    $sql = "SELECT COUNT(adm_id) FROM admins WHERE adm_email = '$email' OR adm_login = '$login'";
    $resultado = mysqli_query($link, $sql);
    $resultado = mysqli_fetch_array($resultado)[0];
 
 
    #VERIFICA SE EXISTE
    if ($contagem >= 1) {
        echo "<script>window.alert('EMAIL JA CADASTRADO');</script>";
    } else {
        $sql = "INSERT INTO admins(adm_login, adm_senha, adm_status, adm_key, adm_email)
         VALUES ('$login', '$senha', 's', '$key', '$email')";
        mysqli_query($link, $sql);
 
        echo "<script>window.alert('USUARIO CADASTRADO');</script>";
        echo "<script>window.location.href='login.html';</script>";
    }
}