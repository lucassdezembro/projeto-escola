<?php

    include_once "../model/connect.php";
    include_once "../model/message.php";

    function cadastrarProfessor() {

        $nome = $_POST['nome'];
        $email = $_POST['email'];

        date_default_timezone_set("America/Sao_Paulo");

        $salt =  date('Y-m-d H:i:s a', time());

        $senha = $_POST["senha"];
        $confirmaSenha = $_POST['confirmaSenha'];

        if ($senha != $confirmaSenha) {
            return "As senhas não coincidem!";
        }

        $senhaCriptografada = crypt($senha, $salt);

        $connection = getConnection();
        $sql = "INSERT INTO professor (nome, email, senha, salt) VALUES (:nome, :email, :senha, :salt)";
       
        $statement = $connection->prepare($sql);
        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':senha', $senhaCriptografada);
        $statement->bindParam(':salt', $salt);

        $statement->execute();

        $message = new Message();
        $message->sendMessage("Professor cadastrado com sucesso!", "../view/login.php");
    }

    function logarProfessor() {

        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $connection = getConnection();

        $sql = "SELECT * FROM professor WHERE email = :email";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':email', $email);

        $statement->execute();

        $result = $statement->fetchAll();

        if (count($result) <= 0) {
            return "E-mail não cadastrado!";
        }

        $usuario = $result[0];

        $salt = $usuario["salt"];

        $senhaCriptografada = crypt($senha, $salt);

        if ($senhaCriptografada == $usuario["senha"]) {
            session_start();
            $_SESSION["usuario"] = $usuario;
            header("Location: ../view/index.php");
        } else {
            return "Senha incorreta!";
        }
    }
?>