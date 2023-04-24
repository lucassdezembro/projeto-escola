<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Escola Karate-Do - Cadastro</title>
</head>
<body>
    <header>
        <h1>Cadastro</h1>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="#">Cadastrar</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h2>Preencha os campos a seguir para se cadastrar:</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>
            <br>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required>
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            <br>
            <label for="confirmaSenha">Confirme sua senha:</label>
            <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirme sua senha" required>
            <br>
            <input type="submit" name="btnCadastrar" value="Cadastrar">
            <?php
                include_once "../controller/auth_controller.php";

                if (isset($_POST["btnCadastrar"])) {

                    $err = cadastrarProfessor();
                    if ($err != null) {
                        echo "<p style='color: red;'>$err</p>";
                    }
                }
            ?>
        </form>
    </section>
</body>
</html>