<?php

include('verifica_sessao.php');

?>


<!DOCTYPE html>
<html>
<head>
    <title>Help Desk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
 Bem vindo <?php echo $_SESSION['nome'];?> <br>
 <a href="logout.php">Sair</a>

</div>
<div class="container">
    <h1>Sistema Help Desk</h1>

    <ul>
        <li><a href="usuarios.php">Gerenciar Usuários</a></li>
        <li><a href="chamados.php">Gerenciar Chamados</a></li>
    </ul>
</div>

</body>
</html>
