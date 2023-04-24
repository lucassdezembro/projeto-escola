<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Escola Karate-Do - Página Inicial</title>
</head>
<body>
    <header>
        <h1>Bem-vindo!</h1>
        <p>O que deseja fazer?</p>
        <nav>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastro.php">Cadastrar</a></li>
            </ul>
        </nav>
        <?php
        
            session_start();

            echo $_SESSION["usuario"]["nome"];
        ?>
    </header>
</body>
</html>