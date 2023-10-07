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
$query = "SELECT dia, hora_entrada, hora_almoço_entrada, hora_almoço_saida, hora_saida FROM pontoRegistro";
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
                  <th>Dia</th>
                  <th>Hora Entrada</th>
                  <th>Início do Almoço</th>
                  <th>Fim do Almoço</th>
                  <th>Hora da Saída</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = mysqli_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $registro['dia']; ?></td>
                        <td><?php echo $registro['hora_entrada']; ?></td>
                        <td><?php echo $registro['hora_almoço_entrada']; ?></td>
                        <td><?php echo $registro['hora_almoço_saida']; ?></td>
                        <td><?php echo $registro['hora_saida']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="error">Nenhum registro encontrado.</p>
    <?php endif; ?>
</body>
</html>
