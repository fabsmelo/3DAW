<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "faeterj3daw";
  $conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);

  //Passar o comando sql para ler a tabela
  $query = "SELECT * from alunos";
  $result = $conn->query($query);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      echo "<table border=1>";
      echo "<tr> <th> ID </th>" .
            "<th> Nome </th>" .
            "<th> Email </th>" .
            "<th> Matricula </th>".
            "</tr>";

      while($linha = $result->fetch_assoc()) {
        echo "<tr> <td>" . $linha["id"] . "</td>" .
              "<td>" . $linha["nome"] . "</td>" .
              "<td>" . $linha["email"] . "</td>" .
              "<td>" . $linha["matricula"] . "</td>" .
              "</tr>";
      }
    ?>
  </body>
</html>
