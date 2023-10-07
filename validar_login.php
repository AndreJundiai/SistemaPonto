<?php
session_start();




// Função responsável por criar uma conexão com o banco de dados
function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "1234", "novoBD");
    if ($conexao->connect_error) {
        die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
    }
    return $conexao;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]); // Criptografar a senha em MD5

    $banco = abrirBanco();

    // Consulta para verificar se o email e a senha correspondem a um usuário
    $sql = "SELECT * FROM usuarius WHERE email = ? AND senha = ?";
    $stmt = $banco->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $banco->error);
    }
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    
    // ...
if ($result->num_rows === 1) {
    // O login foi bem-sucedido, armazene informações do usuário na sessão (incluindo o nome)
    $row = $result->fetch_assoc();
    $_SESSION["id_usuario"] = $row["id"];
    $_SESSION["nome_usuario"] = $row["nome"];

    // Redirecione para a página index4.php após o login bem-sucedido
    header("Location: index4.php");
    exit();
} else {
    // O login falhou, exiba uma mensagem de erro
    echo "Email ou senha incorretos. <a href='login.html'>Tente novamente</a>";
}
// ...

    

    if ($result->num_rows === 1) {
        // O login foi bem-sucedido, armazene informações do usuário na sessão (opcional)
        $row = $result->fetch_assoc();
        $_SESSION["id_usuario"] = $row["id"]; // Você pode armazenar informações adicionais conforme necessário
        $_SESSION["nome_usuario"] = $row["nome"];

        // Redirecione para a página de perfil ou página inicial
        header("Location: index4.php"); // Substitua "perfil.php" pelo destino desejado
        exit();
    } else {
        // O login falhou, exiba uma mensagem de erro
        echo "Email ou senha incorretos. <a href='login.html'>Tente novamente</a>";
    }

    $banco->close();
} else {
    // Se alguém acessar diretamente esta página sem enviar o formulário, redirecione de volta para a página de login
    header("Location: login.php");
    exit();
}
?>
