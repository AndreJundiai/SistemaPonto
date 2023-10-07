<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form action="registro.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="imagem">Imagem de Perfil:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
