<!DOCTYPE html>

<?php include("conexao.php");

    $grupo = selectAllNotebook();
    
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD com PHP e MYSQL - INSERT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<div class="container">
    <body>
     <div class="posicionarCabecalho">
          <h1>Notebooks</h1>
      </div>
      <table border="1" class="table">
          <thead class="thead-light">
              <tr>
                  <th>Nome</th>
                  <th>Modelo</th>
                  <th>Memoria Ram</th>
                  <th>Sistema Operacioal</th>
                  <th>Editar</th>
                  <th>Excluir</th>
              </tr>
          </thead>
          <tbody>
             <?php 
                foreach($grupo as $notebook) { ?>

                   <tr>
                      <th><?=$notebook["nome"]?></th>
                      <th><?=$notebook["modelo"]?></th>
                      <th><?=$notebook["memoriaRam"]?></th>
                      <th><?=$notebook["sistemaOperacional"]?></th>
                      <th>
                          <form name="alterar1" action="alterar.php" method="post">
                              <input type="hidden" name="id" value="<?=$notebook["id"]?>">
                              <input type="submit" name="editar1" value="Editar">
                          </form>
                      </th>
                      <th>
                          <form name="excluir" action="conexao.php" method="post">
                              <input type="hidden" name="id" value="<?=$notebook["id"]?>">
                              <input type="hidden" name="acao" value="excluir1">
                              <input type="submit" name="excluir1" value="Excluir1">
                          </form>
                      </th>
                  </tr>   
                <?php }
              ?>
          </tbody>
     </table>
      <div class="text-center">
           <button type="button" class="btn btn-primary"><a href="inserir2.php">Adicionar notebook</a></button>
      </div>
       <?php
            // Função para formatar a data
            function formatoData($data) {
                $array = explode("-", $data);
                $novaData = $array[2]."/".$array[1]."/".$array[0];
                return $novaData;
            }

        ?>
    </body>
</div>
</html>
