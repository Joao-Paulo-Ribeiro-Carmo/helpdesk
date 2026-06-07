<?php
$con = mysqli_connect("localhost", "root", "", "helpdesk_simples");

if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
