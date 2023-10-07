<?php
session_start();

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]); // Criptografe a senha em MD5

    // Chame a função para inserir um usuário
    inserirUsuario($nome, $email, $senha);
}

// Função responsável por criar uma conexão com o banco de dados
function abrirBanco() {
    $conexao = new mysqli("localhost", "root", "1234", "novoBD");
    if ($conexao->connect_error) {
        die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
    }
    return $conexao;
}

// Função responsável por inserir um usuário no banco de dados
function inserirUsuario($nome, $email, $senha) {
    $banco = abrirBanco();

    // Insira os dados do usuário no banco de dados sem a imagem
    $sql = "INSERT INTO usuarius (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $banco->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $banco->error);
    }
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }

    $stmt->close();
    $banco->close();
}

// ...
?>
