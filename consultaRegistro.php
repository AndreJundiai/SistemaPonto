<?php
// Conexão com o banco de dados (substitua os valores conforme sua configuração)
$host = 'localhost';
$usuario = 'root';
$senha = 1234;
$banco = 'novoBD';
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se a conexão foi estabelecida corretamente
if (mysqli_connect_errno()) {
    echo 'Falha na conexão com o banco de dados: ' . mysqli_connect_error();
    exit;
}

// Consulta os registros da tabela
$query = "SELECT * FROM registros ORDER BY data DESC, hora DESC";
$resultado = mysqli_query($conexao, $query);

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        table th {
            background-color: #f2f2f2;
        }
        
        .success {
            color: green;
        }
        
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Consulta de Registros</h1>
    <?php if (mysqli_num_rows($resultado) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Dia</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $registro['tipo']; ?></td>
                        <td><?php echo $registro['data']; ?></td>
                        <td><?php echo $registro['hora']; ?></td>
                        <td><?php echo $registro['dia']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="error">Nenhum registro encontrado.</p>
    <?php endif; ?>
</body>
</html>
