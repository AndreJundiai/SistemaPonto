<?php
session_start();

// Verifica se o usuário está autenticado, redireciona para a página de login caso contrário
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processa o registro de entrada ou saída
    $action = $_POST['action'];
    $userId = $_SESSION['user_id'];
    $timestamp = date('Y-m-d H:i:s');

    // Insira o código para registrar a entrada ou saída no banco de dados
    // ...

    // Exemplo de mensagem de sucesso
    $message = ($action == 'entry') ? 'Entrada registrada com sucesso!' : 'Saída registrada com sucesso!';
}

// Exemplo de mensagem de boas-vindas
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ponto de Horário</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $username; ?>!</h1>

    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

    <form method="post">
        <input type="hidden" name="action" value="entry">
        <button type="submit">Registrar Entrada</button>
    </form>

    <form method="post">
        <input type="hidden" name="action" value="exit">
        <button type="submit">Registrar Saída</button>
    </form>

    <a href="history.php">Histórico de Registros</a>
    
    <a href="logout.php">Sair</a>
</body>
</html>
