<?php
include 'conexao.php';

$mysqli = new mysqli("localhost", "root", "1234", "novoBD");

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$query = mysqli_query($mysqli, "SELECT dia, hora_entrada, hora_almoço_entrada, hora_almoço_saida, hora_saida FROM pontoRegistro");
$contar = mysqli_num_rows($query);

// Criação de uma tabela HTML que se parece com uma planilha Excel
$html = "<table>
<thead>
<tr>
<th>Dia </th>
<th>Hora Entrada </th>
<th> Início do Almoço </th>
<th> Fim do Almoço  </th>
<th>  Hora da Saída  </th>
</tr>
</thead>
<tbody>";

while ($ret = mysqli_fetch_array($query)) {
    $retorno_dia = $ret['dia'];
    $retorno_hora_entrada = $ret['hora_entrada'];
    $retorno_horario_almoco_entrada = $ret['hora_almoço_entrada'];
    $retorno_horario_almoco_saida = $ret['hora_almoço_saida'];
    $retorno_saida = $ret['hora_saida'];

    // Criação de uma linha de tabela para cada registro
    $html .= "<tr>
        <td>$retorno_dia</td>
        <td>$retorno_hora_entrada</td>
        <td>$retorno_horario_almoco_entrada</td>
        <td>$retorno_horario_almoco_saida</td>
        <td>$retorno_saida</td>
    </tr>";
}

$html .= "</tbody></table>";

// Cabeçalhos para forçar o download como um arquivo Excel (.xls)
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=controleJornada.xls");

// Saída do HTML como um arquivo Excel
echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
echo '<head>';
echo '<meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8">';
echo '</head>';
echo '<body>';
echo $html;
echo '</body>';
echo '</html>';

// Agora você pode enviar o mesmo conteúdo por e-mail se desejar
?>
