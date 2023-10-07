<?php
// Inicie a sessão (se ainda não estiver iniciada)
session_start();

// Verifique se o usuário está autenticado (você pode personalizar isso conforme sua implementação)
if (!isset($_SESSION["id_usuario"])) {
    // Se não estiver autenticado, redirecione para a página de login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
    <link rel="stylesheet" type="text/css" href="estilo.css"> <!-- Inclua o arquivo CSS -->
    <!-- Inclua o arquivo JavaScript externo -->
    <script src="script.js"></script>
</head>
<body>
    <header>
        <nav>
            <a href="index.php" class="active">Página Inicial</a> <!-- Altere para .php -->
            <a href="outra-página.php">Outra Página</a> <!-- Altere para .php -->
            <a href="logout.php">Logout</a> <!-- Altere para .php -->
        </nav>
    </header>

    <h1> <b>Auto controle de Jornada</b></h1>

    <!-- Exiba a mensagem de boas-vindas com o nome do usuário -->
    <p>Bem-vindo, <?php echo $_SESSION["nome_usuario"]; ?>!</p>

    <form action="processamento.php" method="post">
        <input type="submit" name="acao" value="Registrar Entrada">
        
        <?php
        // Verifique se a entrada do almoço já foi registrada e, se não, exiba o botão "Registrar Início Almoço"
        if (!$entradaAlmocoRegistrada) {
            echo '<input type="submit" name="acao" value="Registrar Inicio Almoço">';
        }
        ?>

        <input type="submit" name="acao" value="Registrar Fim Almoço">
        <input type="submit" name="acao" value="Registrar Saída">
    </form>

    <!-- Adicione um link para baixar a planilha -->
    <a href="planilha.php">Baixar Planilha</a>

    <!-- Adicione um link de logout -->
    

    <footer>
        Sobre o Projeto do André
        <hr> 
    </footer>
</body>
</html>
