<?php
include("conexao.php");

$id = $_GET['id'];

if (isset($_POST['atualizar'])) {

    $data = $_POST['data_abertura'];
    $descricao = $_POST['descricao'];
    $id_usuario = $_POST['id_usuario'];

    mysqli_query($con, "UPDATE chamados
    SET
        data_abertura='$data',
        descricao='$descricao',
        id_usuario='$id_usuario'
    WHERE id_chamado=$id");

    header("Location: chamados.php");
}

$usuarios = mysqli_query($con, "SELECT * FROM usuarios");

$chamado = mysqli_fetch_assoc(
    mysqli_query($con, "SELECT * FROM chamados WHERE id_chamado=$id")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Chamado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Editar Chamado</h1>

    <form method="POST">

        <input type="date"
        name="data_abertura"
        value="<?php echo date('Y-m-d', strtotime($chamado['data_abertura'])); ?>"
        required>

        <textarea name="descricao" required><?php echo $chamado['descricao']; ?></textarea>

        <select name="id_usuario">
		<option value="">------</option>

            <?php while($u = mysqli_fetch_assoc($usuarios)) { ?>

            <option
            value="<?php echo $u['id_usuario']; ?>"

            <?php
            if ($u['id_usuario'] == $chamado['id_usuario']) {
                echo "selected";
            }
            ?>
            >
                <?php echo $u['nome']; ?>
            </option>

            <?php } ?>

        </select>

        <button type="submit" name="atualizar">Atualizar</button>

    </form>

</div>

</body>
</html>
