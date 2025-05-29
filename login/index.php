<?php
include('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    } elseif (empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade === 1) {
            $usuario = $sql_query->fetch_assoc();

            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit;
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
} else {
    echo "Preencha todos os campos do formulário.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div id="titulo">
    <h1>Faça login</h1>
    </div>
<div>
    <form action="" method= "POST">
    <p>
        <LAbel>E-mail</LAbel>
        <input type="text" name= "email">
    </p>

    <p>
        <LAbel>Senha</LAbel>
        <input type="password" name= "senha">
    </p>
    <p>
        <button type="submit">Entrar</button>
    </p>
    </form>
 </div>
</body>
</html>