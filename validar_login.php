<?php

session_start();

include("conexao.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM administradores
			WHERE cpf='$cpf'
			AND senha='$senha'";

$resultado = mysqli_query($con, $sql);

if(mysqli_num_rows($resultado) > 0){

    $admin = mysqli_fetch_assoc($resultado);

    $_SESSION['cpf'] = $admin['cpf'];
    $_SESSION['nome'] = $admin['nome'];

    header("Location: index.php");

}else{

    header("Location: login.php?erro=1");

}
?>

