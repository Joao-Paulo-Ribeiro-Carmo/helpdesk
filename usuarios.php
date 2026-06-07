<?php
include("conexao.php");
include ("verifica_sessao.php");

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    mysqli_query($con, "INSERT INTO usuarios(nome, email)
    VALUES('$nome', '$email')");
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];

    mysqli_query($con, "DELETE FROM usuarios WHERE id_usuario=$id");
	header("Location: usuarios.php?msg=excluido");
}

$usuarios = mysqli_query($con, "SELECT * FROM usuarios");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Cadastro de Usuários</h1>
	
	<?php

if (isset($_GET['msg'])) {

    if ($_GET['msg'] == 'excluido') {

        echo "<div class='mensagem-sucesso'>
                Usuário excluído com sucesso!
              </div>";
    }

}

?>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required>

        <input type="email" name="email" placeholder="Email" required>

        <button type="submit" name="salvar">Salvar</button>
    </form>

    <h2>Lista de Usuários</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>

        <?php while($u = mysqli_fetch_assoc($usuarios)) { ?>

        <tr>
            <td><?php echo $u['id_usuario']; ?></td>
            <td><?php echo $u['nome']; ?></td>
            <td><?php echo $u['email']; ?></td>
            <td>
                <a href="editar_usuario.php?id=<?php echo $u['id_usuario']; ?>">Editar</a>
                |
                <a href="usuarios.php?excluir=<?php echo $u['id_usuario']; ?>"   onclick="return confirm('Deseja excluir?')">   Excluir</a>
            </td>
        </tr>

        <?php } ?>
    </table>

    <br>
    <a href="index.php">Voltar</a>
</div>

</body>
</html>
