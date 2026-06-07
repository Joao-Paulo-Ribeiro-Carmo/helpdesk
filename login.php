<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        body{
            font-family: Arial;
            background:#f4f4f4;
        }

        .login{
            width:300px;
            margin:100px auto;
            background:white;
            padding:20px;
            border-radius:5px;
            box-shadow:0 0 10px #ccc;
        }

        input{
            width:100%;
            padding:10px;
            margin-bottom:10px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:10px;
        }

        .erro{
            color:red;
            margin-bottom:10px;
        }
    </style>

</head>
<body>

<div class="login">

    <h2>Login</h2>

    <?php
    if(isset($_GET['erro'])){
        echo "<div class='erro'>CPF ou senha inválidos.</div>";
    }
    ?>

    <form action="validar_login.php" method="POST">

        <input
            type="text"
            name="cpf"
            placeholder="CPF"
            required>

        <input
            type="password"
            name="senha"
            placeholder="Senha"
            required>

        <button type="submit">
            Entrar
        </button>

    </form>

</div>

</body>
</html>