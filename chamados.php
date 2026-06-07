<?php
include("conexao.php");

if (isset($_POST['salvar'])) {
    $data = $_POST['data_abertura'];
    $descricao = $_POST['descricao'];
    $id_usuario = $_POST['id_usuario'];

    mysqli_query($con, "INSERT INTO chamados(data_abertura, descricao, id_usuario)
    VALUES('$data', '$descricao', '$id_usuario')");
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];

    mysqli_query($con, "DELETE FROM chamados WHERE id_chamado=$id");
}

$usuarios = mysqli_query($con, "SELECT * FROM usuarios");
$sql = "SELECT chamados.*, usuarios.nome
FROM chamados
INNER JOIN usuarios
ON chamados.id_usuario = usuarios.id_usuario";


$chamados = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chamados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Abertura de Chamados</h1>

    <form method="POST">

        <label>Data de abertura</label>
        <input type="date" name="data_abertura" required>

        <label>Descrição</label>
        <textarea name="descricao" required></textarea>

        <label>Usuário</label>
        <select name="id_usuario" required>
			<option value="">------</option>

            <?php while($u = mysqli_fetch_assoc($usuarios)) { ?>

            <option value="<?php echo $u['id_usuario']; ?>">
                <?php echo $u['nome']; ?>
            </option>

            <?php } ?>

        </select>

        <button type="submit" name="salvar">Salvar</button>

    </form>

    <h2>Lista de Chamados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Descrição</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>

        <?php while($c = mysqli_fetch_assoc($chamados)) { ?>

        <tr>
            <td><?php echo $c['id_chamado']; ?></td>
            <td><?php echo $c['data_abertura']; ?></td>
            <td><?php echo $c['descricao']; ?></td>
            <td><?php echo $c['nome']; ?></td>

            <td>
                <a href="editar_chamado.php?id=<?php echo $c['id_chamado']; ?>">Editar</a>
                |
                <a href="chamados.php?excluir=<?php echo $c['id_chamado']; ?>">Excluir</a>
            </td>
        </tr>

        <?php } ?>

    </table>

    <br>
    <a href="index.php">Voltar</a>

</div>

</body>
</html>
