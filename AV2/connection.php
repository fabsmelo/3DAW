<?php

  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "av2daw";

  $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

  if ($conn->connect_error) {
    die("Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error());
  }


?>
