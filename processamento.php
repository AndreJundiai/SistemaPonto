<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se a variável 'acao' está definida no POST
    if (isset($_POST['acao'])) {
        $acao = $_POST['acao'];

        // Conexão com o banco de dados (substitua os valores conforme sua configuração)
        $host = 'localhost';
        $usuario = 'root';
        $senha = '1234';
        $banco = 'novoBD';

        // Use a função mysqli para estabelecer a conexão
        $conexao = mysqli_connect($host, $usuario, $senha, $banco);

        // Verifica se a conexão foi estabelecida corretamente
        if (!$conexao) {
            echo 'Falha na conexão com o banco de dados: ' . mysqli_connect_error();
            exit;
        }

        // Obtém a hora atual no formato H:i:s
        $horaAtual = date('H:i:s');

        // Obtém a data atual no formato "DD-MM-AA" (dia, mês, ano)
        $dia = date('d-m-y', strtotime('now'));

        // Use a função mysqli_real_escape_string para escapar dados inseridos no SQL
        $acao = mysqli_real_escape_string($conexao, $acao);

        // Use declarações preparadas para evitar a injeção de SQL
        if ($acao === "Registrar Entrada") {
            $query = "INSERT INTO pontoRegistro (dia, hora_entrada) VALUES (?, ?)";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "ss", $dia, $horaAtual);

            if (mysqli_stmt_execute($stmt)) {
                echo 'Registro de ' . $acao . ' realizado com sucesso!';
            } else {
                echo 'Erro ao realizar o registro de ' . $acao . ': ' . mysqli_error($conexao);
            }
        } elseif ($acao === 'Registrar Inicio Almoço') {
            $query = "UPDATE pontoRegistro SET hora_almoço_entrada = ? WHERE dia = ?";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "ss", $horaAtual, $dia);

            if (mysqli_stmt_execute($stmt)) {
                echo 'Registro de ' . $acao . ' realizado com sucesso!';
            } else {
                echo 'Erro ao realizar o registro de ' . $acao . ': ' . mysqli_error($conexao);
            }
        } elseif ($acao === 'Registrar Saída') {
            $query = "UPDATE pontoRegistro SET hora_saida = ? WHERE dia = ?";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "ss", $horaAtual, $dia);

            if (mysqli_stmt_execute($stmt)) {
                echo 'Registro de ' . $acao . ' realizado com sucesso!';
            } else {
                echo 'Erro ao realizar o registro de ' . $acao . ': ' . mysqli_error($conexao);
            }
        } elseif ($acao === 'Registrar Fim Almoço') {
            $query = "UPDATE pontoRegistro SET hora_almoço_saida = ? WHERE dia = ?";
            $stmt = mysqli_prepare($conexao, $query);
            mysqli_stmt_bind_param($stmt, "ss", $horaAtual, $dia);

            if (mysqli_stmt_execute($stmt)) {
                echo 'Registro de ' . $acao . ' realizado com sucesso!';
            } else {
                echo 'Erro ao realizar o registro de ' . $acao . ': ' . mysqli_error($conexao);
            }
        } else {
            // Ação desconhecida
            echo 'Ação desconhecida!';
        }

        // Feche a declaração preparada
        mysqli_stmt_close($stmt);

        // Feche a conexão com o banco de dados fora do bloco condicional
        mysqli_close($conexao);
    } else {
        // A variável 'acao' não está definida no POST
        echo 'Ação não especificada!';
    }
}
?>
