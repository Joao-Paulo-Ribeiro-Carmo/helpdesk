<?php
include("conexao.php");

$id = $_GET['id'];

if (isset($_POST['atualizar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    mysqli_query($con, "UPDATE usuarios
    SET nome='$nome', email='$email'
    WHERE id_usuario=$id");

    header("Location: usuarios.php");
}

$sql = "SELECT * FROM usuarios 
	WHERE id_usuario=$id";
$resultado= mysqli_query($con,$sql);

$u = mysqli_fetch_assoc($resultado);
   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Editar Usuário</h1>

    <form method="POST">

        <input type="text" name="nome"
        value="<?php echo $u['nome']; ?>" required>

        <input type="email" name="email"
        value="<?php echo $u['email']; ?>" required>

        <button type="submit" name="atualizar">Atualizar</button>

    </form>
</div>

</body>
</html>
